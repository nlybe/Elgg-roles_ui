Roles UI
========
![Elgg 3.0](https://img.shields.io/badge/Elgg-3.0-orange.svg?style=flat-square)

Updated version for Elgg v3.x.

Admin interface for managing roles. This is an add-on for ArckInteractive's Roles framework: https://github.com/arckinteractive/Roles

## Screenshots ##

![alt text](https://raw.github.com/hypeJunction/roles_ui/master/screenshots/roles_ui.png "Admin Interface")
![alt text](https://raw.github.com/hypeJunction/roles_ui/master/screenshots/user_hover.png "User Hover Menu Popup")

## Features

 * User-friendly interface for creating roles and managing role permissions
 * Autocomplete inputs for registered actions, events, hooks, menus and views
 * For you reference, the configuration array for each role is displayed on the permissions page - you can copy paste those into another roles config hook

## Notes

 * Once enabled, configuration arrays for roles (defined in other plugins) will be completely ignored.
 * The plugin uses autocomplete inputs, which accept custom values. This allows to define custom rules for items that could not be identified from configured hook and event handlers
 * Due to the complexity of the Elgg menu API, not all menu items will be available in the autocomplete. Feel free to add custom values
 * Extend rules for menus can not be configured using this plugin

