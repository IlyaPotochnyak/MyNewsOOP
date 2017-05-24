<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 15:59
 */
abstract class AbstractModel
    implements I_Model
{

    protected static $class;
//    public function __construct()
//    {
//        mysql_connect('localhost', 'root', '');
//        mysql_select_db('news');
//        echo'111';die;
//    }

    public  static function getAll() {



        $sql = 'SELECT * FROM news ORDER BY date DESC';

        $db = new DB();

        return $db->queryAll($sql,static::$class);



    }
    public  static function getOne($id) {




        $sql = 'SELECT * FROM news WHERE id=' . $id;


        $db = new DB();

        return $db->queryOne($sql, static::$class);



    }

    public static function addOne($newItem)
    {

        $sql = "INSERT INTO news (date, title, newText)
                VALUES ('".$newItem->date."', '".$newItem->title."', '".$newItem->newText."')";
        $db = new DB;

        $db->addItem($sql);

    }

}