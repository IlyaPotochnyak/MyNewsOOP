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
            else {
                throw new ModelException('Не введен заголовок');
            }

            if (!empty($_GET['newText'])) {
                $newItem->newText = $_GET['newText'];
            }
            else {
                throw new ModelException('Не введен текст записи');
            }

            $date = date("c");

            $newItem->date = date("c");
            $newItem->insert($newItem);

//            var_dump($newItem->title);die;


            $mail = new PHPMailer();
//            $mail->isSMTP();
            $mail->Host = 'smtp.ukr.net';
            $mail->SMTPAuth = true;
            $mail->Username = 'i.potochnyak@ukr.net';
            $mail->Password = 'iluha1985';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->isHTML(true);

            $mail->setFrom('i.potochnyak@ukr.net');
            $mail->addAddress('iluha.diego@gmail.com');
            $mail->addReplyTo('i.potochnyak@ukr.net');

            $mail->Subject = 'New item added to the DB';
            $mail->Body = 'New item named ' . $newItem->title;
            $mail->AltBody = 'New item named ' . $newItem->title;

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
//                die;
            } else {
//                echo 'Message has been sent';
                header('Location: /../index.php');
//                die;
            }




        }
        else {
                throw new ModelException('Неверно введены данные');
        }

    }

    public function actionFind()
    {
        if (!empty($_GET['column']) && !empty($_GET['value'])) {
            $column = $_GET['column'];
            $value = $_GET['value'];


        } else {
            throw new ModelException('Неверные параметры поиска');
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