# Navigator Theme for DokuWiki

**Live Demo:** https://icontemp.com/wiki/navigator/

Navigator is a clean, modern, and intentionally minimal theme for DokuWiki.  
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

1. **Download** the latest release ZIP from the GitHub **Releases** page. 
Use navigator.zip for installation. The auto‑generated source archives are not installable theme packages. 
2. **Unzip** navigator.zip once it's in your system or server.  
3. **Upload** the internal `navigator/` folder to your DokuWiki installation in :

   `<your_wiki>/lib/tpl/     <navigator>`

4. In DokuWiki’s Configuration Manager, set the template to: **navigator**

5. **Included plugin**: `NavigatorLabels`

For your convenience, the **NavigatorLabels** plugin is included inside the theme. You must move it to `<your_wiki>/lib/plugins/` to activate it.

Alternatively, you can upload it via the extension manager from your local system Navigator copy.

This plugin is a must for the top bar to work as intended. It helps keep the theme adaptable across languages and contexts.

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




