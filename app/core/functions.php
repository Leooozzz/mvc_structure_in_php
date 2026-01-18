<?php



function dd($var)
{

    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
    
}
function config ($key, $default = null ){
    $config = require_once __DIR__ . '/../config/config.php';
    return $config[$key] ?? $default;

}