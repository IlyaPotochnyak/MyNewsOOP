<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 16:11
 */
class DB
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('news');
//        echo'111';die;

    }

    public function queryAll($sql, $class)
    {
        $res = mysql_query($sql);

//        var_dump($res); die;

        $ret = [];

        while (false !== $row = mysql_fetch_object($res, $class)) {
//            $news_item = new News();
//            $news_item->id = $row['id'];
//            $news_item->date = $row['date'];
//            $news_item->title = $row['title'];
//            $news_item->newText = $row['newText'];

//            var_dump($news_item);die;
            $ret[] = $row;
        }
//   var_dump($ret); die;
        return $ret;
    }

    public function queryOne($sql, $class)
    {
        $res = mysql_query($sql);

//        var_dump($res); die;

        $ret = [];

        while (false !== $row = mysql_fetch_object($res, $class)) {
//            $news_item = new News();
//            $news_item->id = $row['id'];
//            $news_item->date = $row['date'];
//            $news_item->title = $row['title'];
//            $news_item->newText = $row['newText'];

//            var_dump($news_item);die;
            $ret[] = $row;
        }
//   var_dump($ret); die;
        return $ret;
    }

}