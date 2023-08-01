<?php

class App
{
    private static $instance;
    protected function __construct() { }

    public static function run()
    {
        $registry = \Registry::getInstance();
        $Config = require 'Config/dbconfig.php';
        $db = DB::getDB($Config);
        $registry->setDB($db);

        \Asset::setCss(['style1.css', 'style2.css']);

        $router = new Router;
        $registry->setRouter($router);
        $router->match(Request::getInstance()->getUri());
    }

    public static function getInstance(): App
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
