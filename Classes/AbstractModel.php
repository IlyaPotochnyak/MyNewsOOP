<?php

/**
 * Created by PhpStorm.
 * User: potoc
 * Date: 17.05.2017
 * Time: 15:59
 */

require __DIR__ . '/DB.php';

abstract class AbstractModel

{

    static protected $table;
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public  static function findAll() {

        $class = get_called_class();

//        var_dump($class); die;

        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';

        $db = new DB();
        $db->setClassName($class);

        return $db->query($sql);



    }
    public  static function findOne($id) {

        $class = get_called_class();


        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';


        $db = new DB();
        $db->setClassName($class);

       return $db->query($sql, [':id'=>$id])[0];



    }

    public  function insert($newItem)
    {
       $cols = array_keys($this->data);


        $data = [];
        foreach ($cols as $col) {

            $data[':' . $col] = $this->data[$col];
        }
//        var_dump($data);die;

        $sql = 'INSERT INTO ' .  static::$table . ' 
        (' . implode(', ', $cols) .') 
        VALUES
        (' . implode(', ', array_keys($data)) .')';
//        echo $sql; die;
        $db = new DB;

        $db->execute($sql, $data);

    }

}