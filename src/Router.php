<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

class Router
{
    public function match($url)
    {
        if (strlen($url) > 1) {
            $url = ltrim($url, '/');
            $url = ucfirst($url);
            $segments = explode('/', $url);
            $exceptionclass = '\\Exceptions\\' . 'NotfoundExceptions';

            try {
                // if '/courses'
                if (count($segments) == 1) {
                    $classController = '\\Controllers\\' . array_shift($segments) . 'Controller';
                    if (class_exists($classController)) {
                        $controller = new $classController;
                        $action = 'index';
                        if (method_exists($controller, $action)) {
                            $controller->$action();
                        } else {
                            throw new $exceptionclass("Method not found");
                        }
                    } else {
                        throw new $exceptionclass("Class not found");
                    }

                    // in case of '/controller/action/param1/param2'
                } else {
                    $classController = '\\Controllers\\' . array_shift($segments) . 'Controller';
                    if (class_exists($classController)) {
                        $controller = new $classController;
                        $action = array_shift($segments);
                        if (method_exists($controller, $action)) {
                            call_user_func_array(array($controller, $action), $segments);
                        } // throw new Exception("Method not found");
                        else {
                            array_unshift($segments, $action);
                            $action = 'index';
                            call_user_func_array(array($controller, $action), $segments);
                        }
                    } else {
                        throw new $exceptionclass("Class not found");
                    }
                }
            } catch (\Exceptions\NotfoundExceptions $e) {
                $classController = '\\Controller\\Error404';
                $notfound = new $classController;
                $action = 'index';
                $notfound->$action();
            }
            // in case of '/'
        } elseif ($url = "/") {
            $classController = '\\Controllers\\' . 'IndexController';
            if (class_exists($classController)) {
                $controller = new $classController;
                $action = 'index';
                if (method_exists($controller, $action)) {
                    $controller->$action();
                }
            }
        }
    }

    public function call($controller, $action = 'index', $params = null)
    {
        if (strlen($controller) > 1) {
            $controller = ltrim($controller, '/');
            $controller = ucfirst($controller);
            $segments = explode('/', $controller);
        }

        $classController = '\\Controllers\\' . ucfirst($controller) . 'Controller';
        $defaultAction = 'index';
        if (class_exists($classController)) {
            $classInstance = new $classController;
            if (method_exists($classInstance, $action)) {
                $classInstance->$action($params);
            } elseif (method_exists($classInstance, $defaultAction)) {
                $classInstance->$defaultAction($params);
            }
        } else {
            $classController = '\\Controllers\\' . 'IndexController';
            if (class_exists($classController)) {
                $controller = new $classController;
                $action = 'index';
                if (method_exists($controller, $action)) {
                    $controller->$action($params);
                }
            }
        }
    }
}