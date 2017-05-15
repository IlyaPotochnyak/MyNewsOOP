<?php
/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 11.05.2017
 * Time: 12:05
 */




//function news_getAll() {
//    sql_connect();
//    $sql = 'SELECT * FROM news ORDER BY date DESC';
//
//
//    $res = mysql_query($sql);
//
//    $ret = [];
//
//   while (false !== $row = mysql_fetch_assoc($res)) {
//       $ret[] = $row;
//   }
////   var_dump($ret);
//    return $ret;
//}
//
//function news_getOne($title) {
//    sql_connect();
//    $sql = "SELECT * FROM news WHERE title='".$title."'";
//
//
//    $res = mysql_query($sql);
//
//    $ret = [];
//
//    while (false !== $row = mysql_fetch_assoc($res)) {
//        $ret[] = $row;
//    }
////   var_dump($ret);
//    return $ret;
//}


require __DIR__ . '/../Classes/Sql.php';

$news = new Sql('localhost', 'root', '', 'news');
$news->db_name = 'news';
$items = $news->news_getAll();