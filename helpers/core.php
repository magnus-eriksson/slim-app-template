<?php

use Illuminate\Container\Container;
/**
 * Core functionr wrappers
 * ----------------------------------------------------------
 * Wraooers for the core classes and functions
 */

if (!function_exists('di')) {
    /**
     * Get the app instance
     * @return Illuminate\Container
     */
    function di()
    {
        static $di;
        if (is_null($di)) {
            $di = new Container;
        }
        return $di;
    }
}

if (!function_exists('app')) {
    /**
     * Get the app instance
     * @return Idefix\App
     */
    function app()
    {
        return di()->make('Idefix\App');
    }
}

if (!function_exists('slim')) {
    /**
     * Get the slim instance
     * @return Slim\Slim
     */
    function slim()
    {
        return di()->make('Idefix\App')->slim();
    }
}

if (!function_exists('controller')) {
    /**
     * Get a singleton instance of a controller
     * @return Class
     */
    function controller($class)
    {
        return app()->controller($class);
    }
}
