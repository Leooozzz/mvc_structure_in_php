<?php
namespace App\Core;

use App\Controller\Homecontroller;
use App\Controllers\Erros\HttpErrorController;



class Router
{
    public function dispatch($url)
    {
        $url = trim($url, '/');

        $parts = $url ? explode('/', $url) : [];

        $controller_name = $parts[0] ?? 'Home';

        $controller_name = 'App\Controllers\\' . ucfirst($controller_name) . 'Controller';

        if (!class_exists($controller_name)) {
            $controller = new HttpErrorController();
            $controller->notFound();
            return;
        };

        $controller = new $controller_name();

        $action_name = $parts[1] ?? 'index';
       


        if (!method_exists($controller_name, $action_name)) {
            $controller = new HttpErrorController();
            $controller->notFound();
            return;
        }

        $params = array_slice($parts, 2);

        call_user_func_array([$controller, $action_name], $params);
    }
}
