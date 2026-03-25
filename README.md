# Navigator Theme for DokuWiki

**Live Demo:** https://icontemp.com/wiki/navigator/

Navigator is a clean, modern, and intentionally minimal theme for DokuWiki based on the current default unit.  
It focuses on clarity, readability, and a calm visual rhythm—where content feels at home and navigation stays out of the way.

The theme includes the **NavigatorLabels** plugin, providing a lightweight vocabulary layer that lets administrators rename UI elements without modifying core files.

---

## Features

- **Calm layout:** Designed for long-form reading without visual noise  
- **Accessible typography:** Balanced spacing and legible fonts  
- **Responsive design:** Works on phones, tablets, and desktops  
- **Modular structure:** Easy to customize and extend  
- **Bundled plugin:** Built-in support for the NavigatorLabels plugin  
- **Clear separation:** Theme assets, configuration, and language files are neatly organized  
- **Mixed licensing:** MIT-licensed original work with bundled GPL components where required  

---

## Installation

### Method 1. Manual installation (unzip + upload)

Use this method if you prefer to install extensions manually.

1. Download the latest release ZIP from GitHub:  
(https://github.com/iContemp/navigator-theme/releases)

2. Unzip the file on your system.

3. Upload the internal `navigator/` folder to:

    <your_wiki>/lib/tpl/

4. In DokuWiki’s Configuration Manager, set the template to:

    `navigator` 
5. The bundled NavigatorLabels plugin will be installed automatically <br>
when you install Navigator theme via the Extension Manager.<br>
If you are installing the theme manually, move the included plugin folder to:
    `<your_wiki>/lib/plugins/`

### Method 2. Install via Extension Manager (Recommended)

This is the simplest and cleanest method.

1. Go to Admin → Extension Manager → Manual Install 
2. Copy the direct URL of the release ZIP from GitHub
3. Paste it into the Install from URL field
4. Click Install

DokuWiki will automatically install:
- the Navigator theme
- the NavigatorLabels plugin

No manual steps are required.

### Activate the theme
- Go to **Admin → Configuration → Template**
- Select: `navigator`
- Save the configuration.

### (Optional) Rebuild the index after copying content

If you imported pages from another wiki, rebuild the index:<br>
`php bin/indexer.php -c`<br>
This ensures autolists and sorting work correctly.

### About the NavigatorLabels Plugin

The NavigatorLabels plugin is bundled with the theme <br>
and installed automatically when using the Extension Manager.

It provides:

- multilingual sorting rules
- customizable vocabulary for the top bar
- helper functions used by the theme

The authoritative version will also be available as a standalone plugin on DokuWiki.org  once published.

## Folder structure

navigator/
  css/              Theme stylesheets
  conf/             Configuration defaults
  fonts/            Bundled typefaces
  images/           Theme images and icons
  lang/             Language files
  navigatorlabels/  Included plugin. Move it to the plugins folder.
  LICENSE.txt       MIT license for original work
  COPYING           GPL license for inherited components

## Licensing

Navigator is released under the MIT License for all original work.
Some bundled components are licensed under the GNU General Public License (GPL) as required by DokuWiki’s inheritance model.

See the included `LICENSE.txt` and `COPYING` files for full details.

## Contributing

Navigator is shaped by a single hand for now, to preserve its clarity and voice.  
Suggestions are welcome, and the project is open for anyone to fork and build upon.


## Releases

Stable versions are available on the GitHub Releases page, each with a ready‑to‑install ZIP package.

The `NavigatorLabels` plugin is bundled with the theme but it will be published independently as well.  
The theme and plugin releases submissions to DokuWiki.org will follow later this week.




