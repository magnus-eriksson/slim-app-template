<?php namespace App\Controllers;

class HomeController extends Controller
{
    public function showHome()
    {
        $this->view('home');
    }
}