<?php
// Set up ACF json for plugin
// https://snippets.khromov.se/store-advanced-custom-field-local-json-in-a-plugin/

// Change ACF Local JSON save location to /acf folder inside this plugin
add_filter('acf/settings/save_json', function() {
    return dirname(__DIR__, 1) . '/acf';
});

// Include the /acf folder in the places to look for ACF Local JSON files
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = dirname(__DIR__, 1) . '/acf';
    return $paths;
});
