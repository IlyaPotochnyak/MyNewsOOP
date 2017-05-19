<?php
/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 11.05.2017
 * Time: 15:12
 */


require __DIR__ . '/news.php';

if (!empty($_POST)) {
    $newItem = new News;

    if (!empty($_POST['title'])) {
        $newItem->title = $_POST['title'];
    }
    if (!empty($_POST['newText'])) {
        $newItem->newText = $_POST['newText'];
    }
    $date = date("c");

    $newItem->date = date("c");
//    var_dump($newItem);

    $newItem->addOne($newItem);

    header('Location: /../index.php');

}