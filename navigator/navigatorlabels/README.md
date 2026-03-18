<!-- Folder structure finalized on 2026‑03‑18 -->

# NavigatorLabels Plugin
*A helper plugin providing multilingual sorting, AUTOINDEX support, and customizable UI vocabulary for the Navigator theme.*

## Overview
NavigatorLabels extends the **Navigator** theme with helper functions and configuration options that keep navigation calm, predictable, and multilingual‑friendly.

The plugin provides:

- **Multilingual article‑stripping** for natural alphabetical sorting  
- **AUTOINDEX integration** for Navigator’s autolist behavior  
- **Customizable UI labels** for the theme’s top bar and navigation vocabulary  
- **Unicode‑aware normalization** for consistent sorting across languages  

NavigatorLabels is designed specifically for the **DokuWiki** engine and integrates seamlessly with the Navigator theme.

---

## Features

### Multilingual Sorting Engine
NavigatorLabels removes leading articles and elisions before sorting page titles.  
This produces natural alphabetical order across multiple languages.

Supported out of the box:

- **Portuguese:** a, as, o, os, um, uma, uns, umas  
- **English:** the, an  
- **Spanish:** el, la, los, las, un, una, unos, unas  
- **French elisions:** l’, d’, qu’  

The list is fully configurable in the Admin panel.

### AUTOINDEX Handling
NavigatorLabels provides internal helper functions used by the Navigator theme to:

- detect the `~~AUTOINDEX~~` marker  
- normalize titles  
- generate calm, predictable autolists  

When combined with the **Navigator** theme, the marker remains invisible to readers while still being detected by Navigator.

### Customizable UI Vocabulary
Administrators can define the labels used in the Navigator top bar via the Admin Configuration Settings, allowing:

- multilingual wikis  
- custom terminology  
- simplified or domain‑specific navigation  

### Unicode‑Aware Normalization
The plugin handles:

- punctuation  
- hyphens  
- apostrophes  
- NBSP and thin spaces  
- French elisions  
- accented characters  

This ensures consistent behavior even when titles come from Word, PDFs, macOS, or multilingual sources.

---

## Installation

1. Place the plugin folder in:  
   `<your_wiki>/lib/plugins/navigatorlabels/`

2. Ensure `plugin.info.txt` is present and correctly configured.

3. Visit:  
   **Admin → Configuration Settings → NavigatorLabels**  
   to customize:

   - articles to ignore when sorting  
   - top‑bar labels  
   - other Navigator‑specific vocabulary  

No additional configuration is required for basic operation.

---

## Configuration

### Articles to Ignore When Sorting
A multiline field allows administrators to define a comma‑separated list of articles and elisions.

**Default example:**

a, as, o, os, um, uma, uns, umas,
the, an,
el, la, los, las, un, una, unos, unas,
l’, d’, qu’


The plugin is Unicode‑aware and accepts both `'` and `’`.

### Top Bar Labels
NavigatorLabels exposes several UI vocabulary fields used by the Navigator theme.  
These can be customized to match your wiki’s language or tone.

---

## Sorting Behavior

NavigatorLabels normalizes titles before sorting by removing leading articles and elisions defined in the configuration.

Examples:

| Original Title                     | Normalized | Sorted Under |
|-----------------------------------|------------|--------------|
| A Casa                            | Casa       | C            |
| The Journey                       | Journey    | J            |
| El Camino                         | Camino     | C            |
| L’Été                             | Été        | É            |
| D’Amour                           | Amour      | A            |
| Navigator is cool (if configured) | is cool    | I            |

Normalization is:

- Unicode‑aware  
- punctuation‑aware  
- NBSP‑safe  
- multilingual  

---

## Compatibility

- **DokuWiki:** Greebo → current  
- **PHP:** 7.4+ and 8.x  
- **Themes:** Designed for the Navigator theme; safe alongside others  
- **Languages:** Fully multilingual  

---

## Changelog

The complete development history is kept in  
**[CHANGELOG.txt](CHANGELOG.txt)**  
to ensure a single, consistent source of truth.

This README focuses on usage and configuration.

---
