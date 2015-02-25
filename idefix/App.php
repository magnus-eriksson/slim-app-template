<?php namespace Idefix;

use Closure;
use Exception;
use Slim\Slim;

class App
{
    protected $slim;
    protected $controllers = [];

    public function __construct()
    {
        $this->slim = new Slim;
    }

    public function slim()
    {
        return $this->slim;
    }

    public function controller($class)
    {
        $namespace = $this->slim()->config('controllers.ns');
        $class     = rtrim($namespace, '\\') . '\\' . $class;

        if (!array_key_exists($class, $this->controllers)) {
            $this->controllers[$class] = di()->make($class);
        }

        return $this->controllers[$class];
    }
}