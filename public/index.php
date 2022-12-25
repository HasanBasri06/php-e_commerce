<?php 

ini_set("display_errors", 1);

$path = require __DIR__ . "/../controllers/router.php";

spl_autoload_register(function($class){
    include __DIR__  . "/../controllers/".$class.".php";
});

if(array_key_exists($_SERVER["REQUEST_URI"], $path)){
    $expPath = explode('@', $path[$_SERVER["REQUEST_URI"]]);
    $addClass = $expPath[0] . "Controller";
    $methodName = $expPath[1];
    (new $addClass)->$methodName();
}