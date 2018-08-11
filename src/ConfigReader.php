<?php

namespace Lackhurt\Apollo;


class ConfigReader
{


    protected $namespaces = [];
    protected $dir;


    public function __construct($dir)
    {
        $this->dir = $dir;
    }


    public function connect($namespace = 'application') {
        if (!isset($this->namespaces[$namespace])) {
            $this->namespaces[$namespace] = new PropertiesReader($this->dir, $namespace);
        }
        return $this->namespaces[$namespace];
    }


    /**
     * Dynamically pass methods to the default connection.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->connect()->$method(...$parameters);
    }
}