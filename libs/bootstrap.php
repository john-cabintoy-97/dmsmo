<?php

class Boostrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/404.php';
            $controller = new Page404();
            return false;
        }

        $controller = new $url[0];
        $methodExists = true; 

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                require 'controllers/404.php';
                $controller = new Page404();
                $methodExists = false;
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    if ($methodExists) { 
                        require 'controllers/404.php';
                        $controller = new Page404();
                        // $controller->index();
                        exit(); 
                    }
                }
            } else {
                $controller->index();
            }
        }
    }
}
