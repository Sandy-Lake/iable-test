<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

require '../autoload.php';

Request::setInstance($_REQUEST, $_SERVER['REQUEST_URI']);

App::run();