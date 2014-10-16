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
    'log_path'       => __DIR__ . '/app/logs',
    'public_path'    => __DIR__ . '/public',
    'templates.path' => __DIR__ . '/app/templates',
    'conf_global'    => __DIR__ . '/app/config.global.php',
    'conf_env'       => __DIR__ . '/app/config.env.php',
];

/**
 * Load helper files
 * ----------------------------------------------------------
 */
include __DIR__ . '/helpers/misc.php';

/**
 * Create Slim instance
 * ----------------------------------------------------------
 */
$app = new Slim\Slim($config);

/**
 * Load global and environment app config
 * ----------------------------------------------------------
 */
// Global config file
if (is_file($app->config('conf_global'))) {
    foreach(include $app->config('conf_global') as $key => $value) {
        $app->config($key, $value);
    }
}

// Environment specific config file
if (is_file($app->config('conf_env'))) {
    foreach(include $app->config('conf_env') as $key => $value) {
        $app->config($key, $value);
    }
}

if (is_file($app->config('app_path') . '/start.php')) {
    include $app->config('app_path') . '/start.php';
}

/**
 * Logging
 * ----------------------------------------------------------
 */
$logPath = $app->config('log_path');
$logFile = 'slim_log.log';
if (is_dir($logPath) && is_writable($logPath)) {
    $app->environment['slim.errors'] = $logPath . '/' . $logFile;
}

include $app->config('app_path') . '/routes.php';

$app->run();