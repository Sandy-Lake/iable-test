<?php
namespace Controllers;
abstract class Controller
{
    public function render(array $params, string $path = null)
    {
        extract($params);
        if (file_exists(dirname(__DIR__) . '/view/' . $path)) {
            require dirname(__DIR__) . '/view/' . $path;
        }
    }
}