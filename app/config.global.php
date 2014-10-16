<?php
/**
 * This is the global config file, or the "default" file.
 * ----------------------------------------------------------
 * To change some files depending on the environment, use
 * should make those in the config.env.php file instead.
 */
return  [
    'debug' => false,
    'mode'  => 'production',

    // Logging
    'log.enable' => true,
    'log.level'  => \Slim\Log::ERROR,
];
