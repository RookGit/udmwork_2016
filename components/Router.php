<?php
class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include_once(ROOT . '/config/routes.php');
    }

    private function stop()
    {
        header('Location: /404');
        exit;
    }


    public function run()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        $controller_search_array = explode("/", $uri);


        $routes = $this->routes;
        $routes = $routes[$controller = $controller_search_array[0]];
        $error = true;

        if (isset($routes)) {

            $controllerName = ucfirst(explode("/", $routes)[0]) . "Controller";
            $actionName = "action" . ucfirst(explode("/", $routes)[1]);

            $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                include_once($controllerFile);
                $fullName = $controllerName;
                $controllerObject = new $fullName();
                unset($controller_search_array[0]);
                if ($result = call_user_func_array([$controllerObject, $actionName], $controller_search_array))
                    $error = false;
            }
        }

        if ($error) $this->stop();
        return true;
    }
}