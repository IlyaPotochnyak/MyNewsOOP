<?php
/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 19.05.2017
 * Time: 14:26
 */


function __autoload($class) {

    if (file_exists(__DIR__ . '/Classes/' . $class . '.php')) {
        require __DIR__ . '/Classes/' . $class . '.php';
    }
    else if (file_exists(__DIR__ . '/controllers/' . $class . '.php')) {
        require __DIR__ . '/controllers/' . $class . '.php';
    }
    else if (file_exists(__DIR__ . '/models/' . $class . '.php')) {
        require __DIR__ . '/models/' . $class . '.php';
    }
    else if (file_exists(__DIR__ . '/../models/' . $class . '.php')) {
        require __DIR__ . '/../models/' . $class . '.php';
    }
//    else if (file_exists(__DIR__ . '/' . $class . '.php')) {
//        require __DIR__ . '/' . $class . '.php';
//    }

}