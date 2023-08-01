<?php
class Mysql extends DB
{
    private static $instance;
    private $pdo;

    private function __construct() { }

    public static function setInstance($config)
    {
        $instance = self::getInstance();
        $instance->pdo = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['pass'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_EMULATE_PREPARES, false,
                PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
            ]
        );
        return $instance;
    }
    public function getPDO()
    {
        return $this->pdo;
    }


    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        }

        return new self;
    }
}