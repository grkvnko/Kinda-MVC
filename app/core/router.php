<?php

class Router
{
    private $routes;

    function __construct()
    {
        $this->routes = [
            ''          => 'DefaultController/mainPage',
            '404'       => 'DefaultController/mainPage/error404',
            'page'      => 'DefaultController/selectPage',
            'post'      => 'PostController/showPost',
            'search'    => 'SearchController/action',
            'about'     => 'AboutController/action'
        ];
    }

    private function getArrayFromURI()
    {
        $dummy_server_path = htmlspecialchars($_SERVER['PHP_SELF']);
        $dummy_server_path = str_replace("index.php", "", $dummy_server_path);

        $CUT_REQUEST_URI = mb_substr($_SERVER['REQUEST_URI'], 0, 120);

        $m_request_uri = htmlspecialchars($CUT_REQUEST_URI);
        $m_request_uri = str_replace($dummy_server_path, "", $m_request_uri); // unset local dir

        return explode('/', $m_request_uri, 5);
    }

    public function run()
    {
        $routes_arr = $this->getArrayFromURI();
        $route_way = array_shift($routes_arr);

        if (array_key_exists($route_way, $this->routes)) {
            $route_control = $this->routes[$route_way];
        } else {
            $route_control = $this->routes['404'];
        }

        $controllerAction = explode('/', $route_control);
        $ch_controller = array_shift($controllerAction);
        $ch_controller = new $ch_controller;
        $ch_controller->$controllerAction[0]($routes_arr, $controllerAction[1]);
    }
}