<?php

class Request
{
    private static $instance;
    private $request = [];
    private $uri;

    private function __construct () { }

    private function __clone () { }
    public function __wakeup () { }

    public static function setInstance($request, $uri)
    {
        $instance = self::getInstance();
        $instance->request = $request;
        $instance->uri = $uri;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get($key)
    {
        if (isset($this->request[$key])) {
            return $this->request[$key];
        }
        return null;
    }

    public function set($key, $value)
    {
        $this->request[$key] = $value;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }
}
