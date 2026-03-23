## Changelog

### 2026‑03‑23
- Added new Template Style variables for:
  - Topic article lists: font family, text color, and background color
  - Logo: font family and color
- Updated `styles_navigator.css` to apply the new customization options

### 2026‑03‑18
- Added Custom Link entry to the Topics panel for mobile and desktop
- Introduced dedicated styling block for `.topics-customlink` with spacing, divider, and accent color
- Improved visual alignment of Custom Link with topic items inside the panel
- Added support for custom color variables in `style.ini` for top‑bar and panel elements
- Documented and clarified how template style labels map to `lang/en/settings.php`
- Prepared groundwork for friendly, human‑readable labels for custom style placeholders

### 2026‑03‑17
- Added optional Custom Link button to the top bar (label, URL, and new‑tab behavior configurable via NavigatorLabels)
- Improved top‑bar spacing rhythm and optical alignment
- Refined baseline alignment for monospace elements (Sort group and Custom Link)
- Softened Custom Link visual hierarchy to maintain Topics as the primary anchor
- Unified underline behavior across Topics, Sort, and Custom Link
- Updated integration with NavigatorLabels to support new configuration keys

### 2026‑03‑16
- Added multilingual sorting engine
- Added French elision support
- Improved Unicode and NBSP handling
- Added theme-scoped customization via `tempstyle.css`
- Updated top bar integration with NavigatorLabels
- Refined autolist behavior and normalization logic

### 2026‑02‑10
- Initial release of the modern Navigator theme
- Added topic-based top bar
- Added AUTOINDEX support
- Added clean, editorial layout