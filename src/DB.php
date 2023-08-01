<?php
abstract class DB
{
    public static function getDB(array $config)
    {
        if ($config['driver'] == 'mysql') {
            return Mysql::setInstance($config);
        }
    }
}