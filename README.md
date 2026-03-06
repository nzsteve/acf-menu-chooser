# Advanced Custom Fields: Menu Chooser

List WordPress Menus in a select ACF field and return the ID of the selected menu.

-----------------------

### Features

* Simple dropdown select of all registered WordPress menus
* ACF 6: "Allow Null?" setting to optionally require a selection
* ACF 6: Safe HTML output support via `escaping_html`
* XSS protection with proper output escaping

### Compatibility

This ACF field type is compatible with:
* ACF 5
* ACF 6 (including ACF PRO 6.x)

The plugin automatically loads the correct version based on your installed ACF version.

### Installation

1. Copy the `acf-menu-chooser` folder into your `wp-content/plugins` folder
2. Activate the Menu Chooser plugin via the plugins admin page
3. Create a new field via ACF and select the Menu Chooser type
4. Please refer to the description for more info regarding the field type settings

### Changelog

#### 1.2.0
* Added ACF 6 compatibility with separate v6 field type file
* Added "Allow Null?" field setting for ACF 6
* Added safe HTML output support (`escaping_html`) for ACF 6.2.5+
* Fixed XSS vulnerabilities with proper output escaping in all versions
* Added direct access protection to all PHP files

#### 1.0.0
* Initial Release.
