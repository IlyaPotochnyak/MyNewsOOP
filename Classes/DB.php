<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 16:11
 */
class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
//        mysql_connect('localhost', 'root', '');
//        mysql_select_db('news');
//        echo'111';die;
        $this->dbh = new PDO('mysql:dbname=news;host=localhost', 'root', '');
        if (!$this->dbh){

            throw new ModelException('Не удалось соединиться с БД');
        }
    }

    public function setClassName ($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
       $sth = $this->dbh->prepare($sql);
       $sth->execute($params);
       return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);

    }



    public function execute($sql, $params=[])
    {
//var_dump($params);die;
        $sth = $this->dbh->prepare($sql);
        //var_dump($sth);die;
        return $sth->execute($params);

    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }



}