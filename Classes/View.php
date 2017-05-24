<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 24.05.2017
 * Time: 16:06
 */
class View
{
    protected $data = [];


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        $this->data = $name;
    }


    public function display($template) {

//        $items = $this->data;

//        var_dump($this->data); die;

        foreach ($this->data as $key => $val) {
            $$key = $val;
//
        }


        include __DIR__ . '/../views' . $template;

    }


}