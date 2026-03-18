<?php
/**
 * Navigator — Auto-Index Renderer
 * v20260317a
 * ------------------------------------------------------------
 * Generates a namespace index on start pages using DokuWiki’s
 * page index, with sorting options and filesystem sanity checks.
 *
 * Purpose
 * -------
 * • Provide an automatic list of pages within the same namespace.
 * • Support multiple sort orders (latest, oldest, alphabetical).
 * • Avoid stale index entries by verifying pages exist on disk.
 * • Respect the opt-in marker (~~AUTOINDEX~~ or configured value).
 *
 * This script is intentionally self-contained and theme-agnostic.
 */
/** 
 * License: MIT (see LICENSE.txt)
 * 
 * Maintainers are encouraged to document significant changes in
 * the theme’s README to preserve clarity and continuity.
 */


if (!defined('DOKU_INC')) die();
global $INFO;

/* -------------------------------------------------------------
 * Title normalization helper for alphabetical sorting
 * Removes leading articles (EN/PT) and strips accents.
 * ----------------------------------------------------------- */

function navigator_normalize_title($title) {
    // Load article list from plugin configuration
    $nav = plugin_load('helper', 'navigatorlabels');
    $articleList = $nav ? $nav->getConf('articles') : '';

    // Soft max length guard (prevents accidental pasting of large text)
    if (strlen($articleList) > 500) {
        $articleList = substr($articleList, 0, 500);
    }

    // Normalize and split into individual articles
    $articles = array_filter(array_map('trim', explode(',', mb_strtolower($articleList))));

    // Normalize title for comparison
    $lower = mb_strtolower($title, 'UTF-8');

    // Remove leading whitespace (including NBSP)
    $lower = preg_replace('/^\s+/u', '', $lower);
    $title = preg_replace('/^\s+/u', '', $title);

    // Remove leading articles (Unicode-aware)
    foreach ($articles as $article) {
        if ($article === '') continue;

        // French elision support: l’, d’, qu’, etc.
        if (preg_match('/[\'’]$/u', $article)) {
            // Match article + ANY letter (elision)
            $pattern = '/^' . preg_quote($article, '/') . '\p{L}/u';
            if (preg_match($pattern, $lower)) {
                $title = mb_substr($title, mb_strlen($article), null, 'UTF-8');
                break;
            }
        }

        // Normal article: match article + whitespace or punctuation
        $pattern = '/^' . preg_quote($article, '/') . '[\s\p{P}]/u';
        if (preg_match($pattern, $lower)) {
            $title = mb_substr($title, mb_strlen($article) + 1, null, 'UTF-8');
            break;
        }
    }

    // Transliterate accents for natural sorting
    $normalized = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $title);
    return ($normalized !== false) ? $normalized : $title;
}



/* -------------------------------------------------------------
 * Only run on namespace start pages
 * ----------------------------------------------------------- */
$cleanID = $INFO['id'];
if (!preg_match('/\:start$/', $cleanID)) return;

/* -------------------------------------------------------------
 * Load page content and detect opt-in marker
 * ----------------------------------------------------------- */
$pageContent = rawWiki($cleanID);
$trimmed = trim($pageContent);

// Load marker from helper plugin (Navigator Labels)
$nav = plugin_load('helper', 'navigatorlabels');
$marker = $nav ? $nav->getConf('marker_autoindex') : '~~AUTOINDEX~~';
$hasAutoIndexMarker = (strpos($pageContent, $marker) !== false);

// Placeholder detection (//)
$isPlaceholder = ($trimmed === '//');

// Determine whether to show auto-index
$shouldShowAutoIndex =
    ($trimmed === '') ||
    $isPlaceholder ||
    ($trimmed !== '' && $hasAutoIndexMarker);

if (!$shouldShowAutoIndex) return;

/* -------------------------------------------------------------
 * Determine namespace
 * ----------------------------------------------------------- */
$ns = getNS($cleanID);

/* -------------------------------------------------------------
 * Sort order detection (from query string)
 * ----------------------------------------------------------- */
$query = html_entity_decode($_SERVER['QUERY_STRING'] ?? '');
$order = 'latest';

if (preg_match('/(?:^|&)order=oldest(?:&|$)/', $query)) {
    $order = 'oldest';
} elseif (preg_match('/(?:^|&)order=alpha(?:&|$)/', $query)) {
    $order = 'alpha';
}

/* -------------------------------------------------------------
 * Collect pages using DokuWiki’s index
 * ----------------------------------------------------------- */
$allPages = idx_getIndex('page', '');
$entries = [];

foreach ($allPages as $id) {
    $id = trim($id);

    // Same namespace, but not the start page itself
    if (getNS($id) === $ns && noNS($id) !== noNS($cleanID)) {

        // Filesystem mtime for robust date sorting
        $mtime = @filemtime(wikiFN($id));

        // Title for alphabetical sorting
        $title = p_get_first_heading($id);
        if (!$title) $title = noNS($id);

        $entries[] = [
            'id'    => $id,
            'mtime' => $mtime,
            'title' => $title
        ];
    }
}

/* -------------------------------------------------------------
 * Filesystem sanity filter
 * -------------------------------------------------------------
 * DokuWiki’s index may contain stale entries for deleted pages.
 * We ensure only pages that physically exist on disk are listed.
 * ----------------------------------------------------------- */
$entries = array_filter($entries, function($entry) {
    return file_exists(wikiFN($entry['id']));
});

/* -------------------------------------------------------------
 * Sorting logic
 * ----------------------------------------------------------- */
if ($order === 'latest') {
    usort($entries, function($a, $b) {
        return $b['mtime'] <=> $a['mtime']; // newest first
    });
} elseif ($order === 'oldest') {
    usort($entries, function($a, $b) {
        return $a['mtime'] <=> $b['mtime']; // oldest first
    });
} elseif ($order === 'alpha') {
    usort($entries, function($a, $b) {
        $ta = navigator_normalize_title($a['title']);
        $tb = navigator_normalize_title($b['title']);
        return strnatcasecmp($ta, $tb);
    });
}

/* -------------------------------------------------------------
 * Render list
 * ----------------------------------------------------------- */
echo '<ul class="navigator-autolist-list">';

foreach ($entries as $entry) {
    $id = $entry['id'];
    $title = $entry['title'];
    $url = wl($id);

    echo '<li class="navigator-autolist-item">';
    echo '<a href="' . $url . '">' . hsc($title) . '</a>';
    echo '</li>';
}

echo '</ul>';
?>
