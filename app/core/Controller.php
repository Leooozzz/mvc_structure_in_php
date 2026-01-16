<?php

class Controller
{
    protected function view($view, $view_data = [])
    {
        extract($view_data);

        $view_file = __DIR__ . '/../views' . $view . '.php';
        if (!file_exists($view_file)) {
            throw new Exception("File not found");
        }
        require_once $view_file;
    }
}
