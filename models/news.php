<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 15:26
 */

require __DIR__ . '/../Classes/AbstractModel.php';
require_once __DIR__ . '/../Classes/DB.php';

class News extends AbstractModel
{


    public $id;
    public $date;
    public $title;
    public $newText;

    protected static $table = 'news';
    protected static $class = 'News';



}



