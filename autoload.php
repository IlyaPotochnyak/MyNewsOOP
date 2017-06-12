<?php
/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 19.05.2017
 * Time: 14:26
 */

//require __DIR__ . '/vendor/autoload.php';
//echo 111;die;


function __autoload($class) {
    var_dump($class);die;


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
    else if (file_exists(__DIR__ . '/../Classes/' . $class . '.php')) {
        require __DIR__ . '/../Classes/' . $class . '.php';
    }

}