<?php
use Helpers\Config;

/**
 * Load Composers auto loader
 * ----------------------------------------------------------
 */
require __DIR__ . '/vendor/autoload.php';


/**
 * Set path configs
 * ----------------------------------------------------------
 */
$config = [
    'debug'          => false,
    'app_path'       => __DIR__ . '/app',
    'public_path'    => __DIR__ . '/public',
    'templates.path' => __DIR__ . '/app/templates',
    'conf_global'    => __DIR__ . '/app/config.global.php',
    'conf_env'       => __DIR__ . '/app/config.env.php',
];

/**
 * Load helper files
 * ----------------------------------------------------------
 */
include __DIR__ . '/helpers/core.php';
include __DIR__ . '/helpers/misc.php';

/**
 * Create Slim instance
 * ----------------------------------------------------------
 */
// Register app as singleton
di()->singleton('Idefix\App', function() {
    return new Idefix\App;
});

// Get app from container
slim()->config($config);



/**
 * Load global and environment app config
 * ----------------------------------------------------------
 */
// Global config file
if (is_file(slim()->config('conf_global'))) {
    foreach(include slim()->config('conf_global') as $key => $value) {
        slim()->config($key, $value);
    }
}

// Environment specific config file
if (is_file(slim()->config('conf_env'))) {
    foreach(include slim()->config('conf_env') as $key => $value) {
        slim()->config($key, $value);
    }
}

if (is_file(slim()->config('app_path') . '/start.php')) {
    include slim()->config('app_path') . '/start.php';
}


include slim()->config('app_path') . '/routes.php';

slim()->run();