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

    public function actionAll()
    {

        $news = NewsModel::findAll();


        $view = new View();

        $view->items = $news;


        $view->display('/all.php');


    }

    public function actionOne($id)
    {
        $news = NewsModel::findOne($id);

        $view = new View();
        $view->items = $news;
        $view->display('/one.php');

    }

    public function actionAdd()
    {
        if (!empty($_GET)) {

            $newItem = new NewsModel();

            if (!empty($_GET['title'])) {
                $newItem->title = $_GET['title'];
            }
            if (!empty($_GET['newText'])) {
                $newItem->newText = $_GET['newText'];
            }
            $date = date("c");

            $newItem->date = date("c");
            $newItem->insert($newItem);

            header('Location: /../index.php');
            exit;
        }

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

        $view = new View();
        $view->items = $news;
        $view->display('/one.php');
    }

    public function actionEdit()
    {
        if (!empty($_GET['id']) && !empty($_GET['title']) && !empty($_GET['newText']) ) {
            $id = $_GET['id'];
            $itemData['title'] = $_GET['title'];
            $itemData['newText'] = $_GET['newText'];
        }
        else {
            header('Location: /../index.php');
            exit;
        }
        $newItem = NewsModel::updateOne($id, $itemData) ;

        header('Location: /../index.php');
        exit;
    }

    public function actionDelete($id)
    {
        $itemDelete = NewsModel::deleteOne($id);
        header('Location: /../index.php');
        exit;
    }

}