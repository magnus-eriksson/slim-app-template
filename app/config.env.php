<?php
/**
 * Environment Specific Config
 * ----------------------------------------------------------
 * Override the global config. You should .gitignore this file
 */
return  [
    'debug' => true,
    'mode'  => 'develop',

    // Logging
    'log.enable' => true,
    'log.level'  => \Slim\Log::DEBUG,
];
