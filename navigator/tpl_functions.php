<?php
/**
 * Navigator Template Functions
 * Helper functions used by the Navigator theme.
 *
 * Author: Tony de Araujo
 * License: MIT (see LICENSE.txt in the Navigator theme)
 * Since: 2026-02-01
 *
 * Notes:
 * - Provides template-level helpers for navigation and layout
 * - Supports the top bar, topic menu, and AUTOINDEX integration
 * - Restores classic _tpl_*tools() functions for compatibility
 * - Loaded by main.php to keep template logic modular and maintainable
 * v20260317b
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();



/* -------------------------------------------------------------------------
   NAVIGATOR TOP BAR
   ------------------------------------------------------------------------- */
function navigator_topbar() {
    // global $ID;
    global $ID, $nav;

    // Load customizable labels
    $nav = plugin_load('helper', 'navigatorlabels');  


    $label_topics = $nav ? $nav->label('topics') : 'Topics';
    $label_latest = $nav ? $nav->label('latest') : 'Latest';
    $label_oldest = $nav ? $nav->label('oldest') : 'Oldest';
    $label_az     = $nav ? $nav->label('az')     : 'A–Z';

    // add custom button see details down the page ----------------------------------------------------
    /**
     * Custom Link Button (optional)
     * -----------------------------
     * Admins may rename this label and point it to any internal or external
     * destination. On the demo site, it links to a page explaining how to
     * customize this slot.
     */

    $customlink_label = 'Custom Link'; 
    $customlink_url   = wl('wiki:custom_link_demo'); 

    // end of custom button ---------------------------------------------------


    // Detect sort order
    $query = html_entity_decode($_SERVER['QUERY_STRING'] ?? '');
    $order = 'latest';

    if (preg_match('/(?:^|&)order=oldest(?:&|$)/', $query)) {
        $order = 'oldest';
    } elseif (preg_match('/(?:^|&)order=alpha(?:&|$)/', $query)) {
        $order = 'alpha';
    }

    // Build URLs
    $latest_url = wl($ID, ['order' => 'latest']);
    $oldest_url = wl($ID, ['order' => 'oldest']);
    $alpha_url  = wl($ID, ['order' => 'alpha']);

    // New entry URL
    $ns = getNS($ID);
    $new_id = $ns ? $ns . ':*' : '*';
    $new_url = wl($new_id, ['do' => 'edit']);

    echo '<div class="nav-inner">';

    // Topics toggle
    echo '<span class="nav-item nav-topics" id="navigator__topics-toggle">';
    echo hsc($label_topics) . ' <span class="mono">▼</span>';
    echo '</span>';

    // Sort selector
    echo '<span class="nav-item nav-sort-group">';

    echo ($order === 'latest')
        ? '<span class="nav-sort-current">' . hsc($label_latest) . '</span>'
        : '<a class="nav-sort-link" href="' . hsc($latest_url) . '">' . hsc($label_latest) . '</a>';

    echo '<span class="nav-sort-sep">•</span>';

    echo ($order === 'oldest')
        ? '<span class="nav-sort-current">' . hsc($label_oldest) . '</span>'
        : '<a class="nav-sort-link" href="' . hsc($oldest_url) . '">' . hsc($label_oldest) . '</a>';

    echo '<span class="nav-sort-sep">•</span>';

    echo ($order === 'alpha')
        ? '<span class="nav-sort-current">' . hsc($label_az) . '</span>'
        : '<a class="nav-sort-link" href="' . hsc($alpha_url) . '">' . hsc($label_az) . '</a>';

    echo '</span>';

  // Custom button link details --------------------------------------------------------

 
    $data = $nav ? $nav->customLinkData() : null;

    if ($data) {
        echo '<span class="nav-sort-sep">•</span>';
        echo '<span class="nav-item nav-customlink">';
        echo '<a href="' . hsc($data['url']) . '"' . $data['newtab'] . '>' . hsc($data['label']) . '</a>';
        echo '</span>';
    }

// End of custom button ----------------------------------------------------- 


    echo '<span class="nav-spacer"></span>';

    echo '</div>';
}


/* -------------------------------------------------------------------------
   NAVIGATOR TOPICS LIST
   ------------------------------------------------------------------------- */
function navigator_topics_list() {
    global $conf, $nav;

    $pages_dir = rtrim($conf['datadir'], '/') . '/';
    if (!is_dir($pages_dir)) return;

    $namespaces = [];

    $dir = opendir($pages_dir);
    if ($dir === false) return;

    while (($entry = readdir($dir)) !== false) {
        if ($entry === '.' || $entry === '..') continue;

        $ns_path = $pages_dir . $entry;
        if (!is_dir($ns_path)) continue;

        if (!is_file($ns_path . '/start.txt')) continue;

        $display = ucwords(str_replace('_', ' ', $entry));
        $namespaces[$entry] = $display;
    }

    closedir($dir);

    if (empty($namespaces)) return;

    asort($namespaces, SORT_NATURAL | SORT_FLAG_CASE);

    echo '<ul class="navigator-topics-list">';
    foreach ($namespaces as $ns => $display) {
        $url = wl($ns . ':start');
        echo '<li class="topic-item"><a href="' . hsc($url) . '">' . hsc($display) . '</a></li>';
    }
    echo '</ul>';

    // Insert Custom Link inside Topics panel (mobile-friendly)
    if ($nav && ($data = $nav->customLinkData())) {
        echo '<div class="topics-customlink">';
        echo '<a href="' . hsc($data['url']) . '"' . $data['newtab'] . '>';
        echo hsc($data['label']);
        echo '</a>';
        echo '</div>';
    }
}



