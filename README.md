# Hide Image Title on Hover

A small WordPress plugin that removes image title tooltips while keeping existing accessibility text and form-field titles intact.

Activate it and it works. There are no settings, build steps, or additional dependencies.

## What it does

- Removes `title` attributes from images already on the page.
- Processes images added later, including images inside newly inserted containers.
- Removes image titles when another script adds or restores them.
- Preserves existing `alt`, `aria-label`, and `aria-labelledby` attributes, including an empty `alt` on decorative images.
- Retains a non-empty image title as an accessibility label only when the image has no authored text alternative and is not explicitly hidden or presentational.
- Leaves form-field titles, image-input titles, surrounding-link titles, and other mouse handlers intact.

The plugin runs on the public frontend. It changes the browser DOM, without changing media-library records or saved content. It adds no tracking, external requests, database tables, or options.

## Installation

1. Download `hide-image-title-on-hover-1.2.zip` from the [latest release](https://github.com/carlosrudriguez/hide-image-title-on-hover/releases/latest).
2. In WordPress, open **Plugins → Add New Plugin → Upload Plugin**.
3. Select the ZIP and click **Install Now**.
4. Activate **Hide Image Title on Hover**.

For a manual installation, extract the ZIP into `wp-content/plugins/`. The resulting directory must be named `hide-image-title-on-hover`.

To update, upload the newer release ZIP and choose to replace the installed version when WordPress prompts you. GitHub releases do not provide automatic WordPress updates for this plugin.

## Compatibility

The release was verified with WordPress **7.1.2**, PHP **8.4.25**, and Chrome. PHP and JavaScript syntax checks, 22 checks on the activated WordPress frontend, and a real pointer-hover check passed without console errors. Earlier WordPress and PHP versions have not been verified.

The plugin needs JavaScript, a browser with `MutationObserver`, and a theme that calls `wp_footer()`. Its inline footer script must be permitted by the site's Content Security Policy.

Only `img[title]` elements in the main document are processed. Titles on surrounding links or containers remain unchanged. Images inside separate iframes or shadow roots are outside the observed document subtree.

## Development and contributions

The runtime is contained in `hide-image-title-on-hover.php`. Edit that file directly; there are no generated assets or build dependencies.

Run the PHP syntax check:

```sh
php -l hide-image-title-on-hover.php
```

For browser verification, check initial images, newly added images, restored titles, existing text alternatives, decorative images, form-field titles, and existing mouse handlers. Confirm that the browser console has no plugin errors.

Use [GitHub issues](https://github.com/carlosrudriguez/hide-image-title-on-hover/issues) for bug reports. Include the WordPress and PHP versions, browser, theme, steps to reproduce, and relevant console errors. Pull requests are welcome; keep changes focused and describe how they were verified.

## Releases

See [CHANGELOG.md](CHANGELOG.md) for the release history. Installation ZIPs use an unversioned `hide-image-title-on-hover/` directory and exclude Git configuration files.

## Author and license

Created by [Carlos Rodríguez](https://carlosrodriguez.mx/).

Copyright (C) 2026 Carlos Rodríguez. Licensed under the GNU General Public License, version 2 or any later version (`GPL-2.0-or-later`). See [LICENSE](LICENSE).
