<?php

class Asset
{
    private static $css = [];
    protected static $baseDirCss = '/css/';

    public static function setCss($array)
    {
        foreach ($array as $row) {
            self::$css[] = $row;
        }
    }

    public static function getCss()
    {
        foreach (self::$css as $row) {
            $path = '';
            $path .= '<link rel="stylesheet" href="' . self::$baseDirCss . $row . '"> ';
            echo $path;
        }
    }
}