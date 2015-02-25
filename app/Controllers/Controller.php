<?php namespace App\Controllers;

class Controller
{
    public function view($view, $args = [])
    {
        $view .= !pathinfo($view, PATHINFO_EXTENSION)? '.php' : null;
        return slim()->render($view, $args);
    }
}