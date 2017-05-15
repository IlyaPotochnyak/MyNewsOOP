<?php
/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 11.05.2017
 * Time: 11:51
 */

/*function sql_connect()
{
    mysql_connect('localhost', 'root', '');
    mysql_select_db('news');

}

function news_add($newItem) {
    sql_connect();

//    $sql = "INSERT INTO news ('date', 'title', 'newText')
//            VALUES ('".$newItem['date']."', '".$newItem['title']."', '".$newItem['newText']."')";
$sql = "INSERT INTO news (date, title, newText)
            VALUES ('".$newItem['date']."',
             '".$newItem['title']."', '".$newItem['newText']."')";

    mysql_query($sql);
}*/
require __DIR__ . '/News.php';
class Sql {
//    public $db_name;
//    public $server;
//    public $db_user;
//    public $db_password;

    public function __construct($server, $db_user, $db_password, $db_name)
    {
        mysql_connect($server, $db_user, $db_password);
        mysql_select_db($db_name);

    }

    public function news_getAll() {

        $sql = 'SELECT * FROM news ORDER BY date DESC';


        $res = mysql_query($sql);

//        var_dump($res); die;

        $ret = [];

        while (false !== $row = mysql_fetch_assoc($res)) {
            $news_item = new News();
                $news_item->id = $row['id'];
                $news_item->date = $row['date'];
                $news_item->title = $row['title'];
                $news_item->newText = $row['newText'];

//            var_dump($news_item);die;
            $ret[] = $news_item;
        }
//   var_dump($ret); die;
        return $ret;
    }

    public function news_add($newItem) {


//    $sql = "INSERT INTO news ('date', 'title', 'newText')
//            VALUES ('".$newItem['date']."', '".$newItem['title']."', '".$newItem['newText']."')";
        $sql = "INSERT INTO news (date, title, newText)
            VALUES ('".$newItem['date']."',
             '".$newItem['title']."', '".$newItem['newText']."')";

        mysql_query($sql);
    }

    public function news_getOne($title) {

    $sql = "SELECT * FROM news WHERE title='".$title."'";


    $res = mysql_query($sql);

    $ret = [];

    while (false !== $row = mysql_fetch_assoc($res)) {

        $news_item = new News();
        $news_item->id = $row['id'];
        $news_item->date = $row['date'];
        $news_item->title = $row['title'];
        $news_item->newText = $row['newText'];


        $ret[] = $news_item;
    }
//   var_dump($ret);die;
    return $ret;
}

}