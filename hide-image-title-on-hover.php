<?php
/**
 * Removes image title tooltips on the public WordPress frontend.
 * Uses the WordPress footer hook and browser DOM APIs without dependencies.
 *
 * Plugin Name: Hide Image Title on Hover
 * Plugin URI: https://github.com/carlosrudriguez/hide-image-title-on-hover
 * Description: Hides image title tooltips, preserving accessibility text and form field titles.
 * Author: Carlos Rodríguez
 * Author URI: https://carlosrodriguez.mx/
 * Version: 1.2
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://github.com/carlosrudriguez/hide-image-title-on-hover
 *
 * Copyright (C) 2026 Carlos Rodríguez.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_footer', function () {
  ?>
  <script id="hide-title-attributes">
    (function () {
      'use strict';

      function hideImageTitle(image) {
        if (image.tagName !== 'IMG' || !image.hasAttribute('title')) {
          return;
        }

        var title = image.getAttribute('title');
        var role = image.getAttribute('role');

        // Keep title-only accessible text without replacing authored alternatives.
        if (title.trim() &&
            !image.hasAttribute('alt') &&
            !image.hasAttribute('aria-label') &&
            !image.hasAttribute('aria-labelledby') &&
            image.getAttribute('aria-hidden') !== 'true' &&
            role !== 'presentation' && role !== 'none') {
          image.setAttribute('aria-label', title);
        }

        image.removeAttribute('title');
      }

      function hideImageTitles(root) {
        if (root.nodeType !== 1) {
          return;
        }

        // Include an appended image itself as well as images inside a new container.
        hideImageTitle(root);
        var images = root.querySelectorAll('img[title]');
        for (var index = 0; index < images.length; index += 1) {
          hideImageTitle(images[index]);
        }
      }

      function initialize() {
        hideImageTitles(document.body);

        var observer = new MutationObserver(function (mutations) {
          for (var index = 0; index < mutations.length; index += 1) {
            var mutation = mutations[index];

            if (mutation.type === 'attributes') {
              hideImageTitle(mutation.target);
              continue;
            }

            for (var nodeIndex = 0; nodeIndex < mutation.addedNodes.length; nodeIndex += 1) {
              hideImageTitles(mutation.addedNodes[nodeIndex]);
            }
          }
        });

        observer.observe(document.body, {
          childList: true,
          subtree: true,
          attributes: true,
          attributeFilter: ['title']
        });
      }

      if (document.body) {
        initialize();
      } else {
        document.addEventListener('DOMContentLoaded', initialize, { once: true });
      }
    }());
  </script>
  <?php
}, 999999 );
