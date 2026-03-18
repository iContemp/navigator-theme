2026-03-18
  * Added Custom Link entry to the Topics panel for mobile and desktop
  * Introduced dedicated styling block for `.topics-customlink` with spacing, divider, and accent color
  * Improved visual alignment of Custom Link with topic items inside the panel
  * Added support for custom color variables in `style.ini` for top-bar and panel elements
  * Documented how template style labels map to `lang/en/settings.php`
  * Prepared groundwork for friendly, human-readable labels for custom style placeholders

2026-03-17
  * Added new configuration key `customlink_url` for admin-editable Custom Link destination
  * Added new configuration key `customlink_newtab` to allow opening the Custom Link in a new tab
  * Added helper method `flag()` for boolean configuration values
  * Updated helper plugin to support raw value retrieval via `value()`
  * Improved integration with Navigator top bar (Custom Link label, URL, and behavior now fully configurable)

2026-03-16
  * Added multilingual default article list (Portuguese, English, Spanish, French)
  * Added support for French elisions (l’, d’, qu’, etc.)
  * Improved Unicode-aware matching for article stripping
  * Added NBSP and punctuation-safe prefix detection
  * Switched Admin field to multiline for better visibility
  * Added max-length guard to prevent accidental long input
  * Refined normalization logic for AUTOINDEX integration
  * Updated plugin.info.txt with clearer description and tags

2026-02-10
  * Initial integration with Navigator theme
  * Added customizable top-bar labels
  * Added basic article-stripping for sorting
  * Added helper functions for autolist behavior
