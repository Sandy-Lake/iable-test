<?php

class Registry
{
    private static $instance;
    private $db;
    private $router;

    private function __construct () { }


    private function __clone () {}
    public function __wakeup () {}

    public function setRouter($router)
    {
        $this->router = $router;
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function setDB($db)
    {
        $this->db = $db;
    }

    public function getDB()
    {
        return $this->db;
    }

    public static function getInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        }

        self::$instance = new self;

        return self::$instance;
    }
}