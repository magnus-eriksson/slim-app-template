<?php
/**
 * This is the environemnt specific config
 * ----------------------------------------------------------
 * To make sure that different developers can have different
 * configs depending on their system, this file is .gitignore'd
 */
return  [
    'debug' => true,
    'mode'  => 'develop',
    
    // Logging
    'log.enable' => true,
    'log.level'  => \Slim\Log::DEBUG,
];
