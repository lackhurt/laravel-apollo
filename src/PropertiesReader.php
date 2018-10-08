<?php

namespace Lackhurt\Apollo;


class PropertiesReader
{

    private $properties = [];

    public function __construct($saveDir, $namespace)
    {
        if (!isset($namespace)) {
            $namespace = 'application';
        }

        $this->properties = self::extractConfig($saveDir, $namespace);
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public function get($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        } else {
            throw new \Exception("$key is not exists!");
        }
    }

    private static function extractConfig($dir, $namespace) {

        $dir = rtrim($dir, '/');

        if (!file_exists($dir)) {
            throw new \Exception("$dir is not exists!");
        }

        if (!file_exists($dir . '/apolloConfig.' . $namespace . '.php')) {
            throw new \Exception("$namespace is not exists!");
        }

        try {
            $config = include $dir . '/apolloConfig.' . $namespace . '.php';
            if (isset($config['configurations'])) {
                return $config['configurations'];
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }


    /**
     * @param $key string
     * @return bool
     */
    public function contains($key) {
        return isset($this->properties[$key]);
    }
}