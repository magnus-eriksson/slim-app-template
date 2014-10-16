<?php
/**
 * Helper functions
 * ----------------------------------------------------------
 * Just some nice to have functions to make some 
 * of the development nicer.
 */

if (!function_exists('array_get')) {
    /**
     * Get an array element using dot-notation for nested arrays.
     * Heavily inspired by Laravels function with the same name.
     * Thanks Taylor! :)
     * @param  array    $array
     * @param  string   $key
     * @param  mixed    $default    Retrurned if key is not found
     * @return mixed
     */
    function array_get($array, $key, $default = null)
    {
        if (is_null($key) || !is_array($array)) {
            return $default;
        }

        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        foreach(explode('.', $key) as $k) {
            if (!is_array($array) || !array_key_exists($k, $array)) {
                return $default;
            }

            $array = $array[$k];
        }

        return $array;
    }
}

if (!function_exists('property_get')) {
    /**
     * Get an object property using dot-notation for nested object.
     * Heavily inspired by Laravels function array_get.
     * @param  object   $object
     * @param  string   $key
     * @param  mixed    $default    Retrurned if key is not found
     * @return mixed
     */
    function property_get($object, $key, $default = null)
    {
        if (is_null($key) || !is_object($object)) {
            return $default;
        }

        if (property_exists($object, $key)) {
            return $object->{$key};
        }

        $check = $object;

        foreach(explode('.', $key) as $k) {
            if (!is_object($check) || !property_exists($check, $k)) {
                return $default;
            }

            $check = $check->{$k};
        }

        return $check;
    }
}

if (!function_exists('get_value')) {
    /**
     * Get a value from an object, array or variable.
     * If the second parameter ($key) is sent in, it will use array_get
     * or property_get to return the value depending on the type
     * @param  mixed    $item
     * @param  string   $key        Dot notation for nested arrays/objects. Ignored if $item is another type
     * @param  mixed    $default    Retrurned if key is not found (only used if $key is set)
     * @return mixed
     */
    function get_value($item, $key = null, $default = null)
    {
        if ($item instanceof Closure) {
            $item = $item();
        }

        if (is_null($key) || (!is_array($item) && !is_object($item))) {
            return $item;
        }

        if (is_array($item)) {
            return array_get($item, $key, $default);
        }

        if (is_object($item)) {
            return property_get($item, $key, $default);
        }

        return $default; // Should never happen

    }
}

if (!function_exists('dd')) {
    /**
     * Dump contents of a variable to screen and stop script execution
     * @param  mixed    $variable
     * @param  boolean  $pre        Should we print <pre> before dumping contents to screen?
     * @return void
     */
    function dd($variable, $pre = false)
    {
        if ($pre) {
            echo "<pre>";
        }
        var_dump($variable);
        die();
    }
}