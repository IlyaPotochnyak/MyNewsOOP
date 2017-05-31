<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 15:18
 */
//require_once __DIR__ . '/../models/News.php';

class NewsController
{
//    public $actionAll = '111';


    public function actionAll()
    {

        $news = NewsModel::findAll();
//        var_dump($news);die;

        $view = new View();

        $view->items = $news;
//        include __DIR__ . '/../views/index.php';
//        var_dump($view->items);

        $view->display('/all.php');


    }

    public function actionOne($id)
    {

        $news = NewsModel::findOne($id);
//        var_dump($news);die;

//        include __DIR__ . '/../views/index.php';


        $view = new View();



        $view->items = $news;
//        include __DIR__ . '/../views/index.php';
//        var_dump($view->items);

        $view->display('/one.php');

    }
}