<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 15:18
 */
require_once __DIR__ . '/../models/News.php';

class NewsController
{
//    public $actionAll = '111';



    public function actionAll() {

        $items = News::getAll();
//        var_dump($items);die;
        include __DIR__ . '/../views/index.php';



    }

    public function actionOne($id) {

        $items = News::getOne($id);
//        var_dump($items);die;

        include __DIR__ . '/../views/index.php';



    }

}