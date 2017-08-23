<?php
session_start();

define('ROOT', dirname(dirname(__FILE__)));


spl_autoload_register(function ($class) {

    $pathMain = ROOT . '/' . $class . '.php';
    $pathClasses = ROOT . '/classes/' . $class . '.php';
    $configClasses = ROOT . '/config/' . $class . '.php';


    if (file_exists($pathMain)) {
        require_once $pathMain;
    }

    else if (file_exists($pathClasses)) {
        require_once $pathClasses;
    }

    else if (file_exists($configClasses)) {
        require_once $configClasses;
    }

});


?>