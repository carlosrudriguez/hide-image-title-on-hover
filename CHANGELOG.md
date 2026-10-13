# Changelog

## 1.2 — 2026-10-12

First public GitHub release.

- Preserve existing image alternative text, ARIA labels, and decorative-image semantics.
- Retain title-only accessibility text without overwriting authored text alternatives.
- Use `MutationObserver` to handle inserted images and added or restored image titles.
- Preserve existing hover handlers, form-field titles, and non-image titles.
- Keep JavaScript helpers private and support initialization before the document body exists.
- Publish under GPL-2.0-or-later with installation, compatibility, contribution, and release documentation.

Verified with WordPress 7.1.2, PHP 8.4.25, and Chrome: PHP and JavaScript syntax checks, 22 activated-frontend checks, and a real pointer-hover check passed without console errors.
