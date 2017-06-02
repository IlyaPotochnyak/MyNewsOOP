<?php


//require __DIR__ . '/models/news.php';
//
//
//include __DIR__ . '/views/index.php';
//include __DIR__ . '/views/add.php';

//require_once __DIR__ . '/controllers/NewsController.php';
require_once __DIR__ . '/autoload.php';



$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$id = $_GET['id'];


try {$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;
$method = 'action' . $act;

//var_dump($controller);
$controller->$method($id);}
catch (Exception $e) {
    $view = new  View();
    $view->error = $e->getMessage();
    $view->display('/error.php');
}




include __DIR__ . '/views/add.php';
include __DIR__ . '/views/search.php';
