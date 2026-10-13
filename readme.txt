=== Hide Image Title on Hover ===
Tags: images, title, tooltip, accessibility
Tested up to: 7.1
Stable tag: 1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Remove image title tooltips while preserving accessibility text, decorative images, form-field titles, and existing mouse handlers.

== Description ==

Hide Image Title on Hover removes title attributes from images on the public WordPress frontend. It also handles dynamically inserted images and title attributes added or restored by other scripts.

Existing alt, aria-label, and aria-labelledby attributes are preserved. An empty alt on a decorative image stays empty. A non-empty title is retained as an accessibility label only when the image has no authored text alternative and is not explicitly hidden or presentational.

The plugin leaves form-field titles, image-input titles, and titles on surrounding links or containers unchanged. It changes only the browser DOM and does not modify saved content or media-library records.

There are no settings, additional dependencies, tracking, or external requests.

The release was verified with WordPress 7.1.2, PHP 8.4.25, and Chrome. Earlier WordPress and PHP versions have not been verified.

Source, issues, and releases: https://github.com/carlosrudriguez/hide-image-title-on-hover

Created by Carlos Rodríguez: https://carlosrodriguez.mx/

== Installation ==

1. Download hide-image-title-on-hover-1.2.zip from the GitHub release.
2. Open Plugins > Add New Plugin > Upload Plugin in WordPress.
3. Select the ZIP and click Install Now.
4. Activate Hide Image Title on Hover.

For manual installation, extract the unversioned hide-image-title-on-hover directory into wp-content/plugins/ and activate the plugin.

== Frequently Asked Questions ==

= Are there settings? =

No. Activate the plugin to use it.

= Does it change image alternative text? =

No. Existing alt and ARIA attributes remain unchanged, including an empty alt for decorative images. If a title is the only authored text alternative, its non-empty value is retained as an accessibility label before the title attribute is removed.

= Does it remove every tooltip? =

Only title attributes on img elements in the main document are processed. Titles on form fields, image inputs, links, and other containers remain unchanged. Separate iframes and shadow roots are outside the observed document subtree.

= What does it need to run? =

JavaScript, a browser with MutationObserver support, a theme that calls wp_footer(), and a Content Security Policy that permits the plugin's inline footer script.

= How do I update it? =

Upload the newer ZIP from GitHub and choose to replace the installed plugin when WordPress prompts you. Automatic WordPress updates from GitHub are not included.

== Changelog ==

= 1.2 =

* First public GitHub release under GPLv2 or later.
* Preserve authored accessibility text and decorative-image semantics.
* Handle inserted images and added or restored title attributes with MutationObserver.
* Preserve existing hover handlers and form-field titles.
* Add installation, compatibility, contribution, and release documentation.

== Upgrade Notice ==

= 1.2 =

Preserves accessibility text and existing hover handlers while handling dynamically inserted images and restored titles.
