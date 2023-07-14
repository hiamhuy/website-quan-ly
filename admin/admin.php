<?php
class Admin
{
    private $__controller, $__action, $__params, $__route;
    function __construct()
    {
        global $router;
        $this->__route = new Route();
        if (!empty($router['default_controller'])) {
            $this->__controller = $router['default_controller'];
        }

        $this->__action = 'index';
        $this->__params = [];
        $this->handerUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }
    public function handerUrl()
    {
        $url = $this->getUrl();
        $urlArray = array_filter(explode("/", $url));
        $urlArray = array_values($urlArray);

        if (!empty($urlArray[0])) {
            $this->__controller = substr($urlArray[0], 4);
            $this->__controller = ucfirst($this->__controller);
            $this->__controller = $this->__controller . 'Controller';

        } else {
            $this->__controller = $this->__controller . 'Controller';
        }

        if (file_exists('admin/Controllers/' . $this->__controller . '.php')) {
            require_once 'Controllers/' . $this->__controller . '.php';
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller;
            } else {
                $this->errorUrl();
            }
            unset($urlArray[0]);
        } else {
            $this->errorUrl();
        }

        if (!empty($urlArray[1])) {
            $this->__action = $urlArray[1];
            unset($urlArray[1]);
        }

        $this->__params = array_values($urlArray);
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);

        } else {
            $this->errorUrl();
        }

    }
    function errorUrl($err = 404)
    {
        require_once 'Views/shared/error/' . $err . '.php';
    }
}


?>