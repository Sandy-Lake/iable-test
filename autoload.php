<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($className) {
    $basePath = __DIR__ . '/src/';
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = $basePath . $fileName. '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
