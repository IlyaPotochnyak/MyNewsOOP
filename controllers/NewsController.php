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

    public function actionFind()
    {
        if (!empty($_GET['column']) && !empty($_GET['value'])) {
            $column = $_GET['column'];
            $value = $_GET['value'];


        } else {
            header('Location: /../index.php');
            exit;
        }

        $news = NewsModel::findByColumn($column, $value);
//        var_dump($news);

        $view = new View();


        $view->items = $news;
//        include __DIR__ . '/../views/index.php';
//        var_dump($view->items);

        $view->display('/one.php');
    }

    public function actionEdit()
    {
//        echo $_GET['id']; die;
        if (!empty($_GET['id']) && !empty($_GET['title']) && !empty($_GET['newText']) ) {
            $id = $_GET['id'];
            $itemData['title'] = $_GET['title'];
            $itemData['newText'] = $_GET['newText'];

//            var_dump($data);die;


        } else {
            header('Location: /../index.php');
            exit;
        }
        $newItem = NewsModel::updateOne($id, $itemData) ;
        $view = self::actionAll();
    }

}