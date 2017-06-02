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

    public function __isset($k)
    {
        isset($this->data[$k]);
    }

    public  static function findAll() {

        $class = get_called_class();

//        var_dump($this->data); die;

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

        $res = $db->execute($sql, $data);

        if (!$res){
            throw new ModelException('Не удалось добавить запись в БД');
        }

        $this->id = $db->lastInsertId();

    }

    public static function findByColumn ($column, $value)
    {

        $class = get_called_class();
//        var_dump($class);die;


        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
//echo $sql; die;

        $db = new DB();
        $db->setClassName($class);

        $res = $db->query($sql, [':value'=>$value])[0];

        if (!$res){
            throw new ModelException('Не удалось найти запись в БД');
        }
        return $res;


    }

    public static function updateOne($id, $itemData)
    {

        $itemKeys = [];
        foreach ($itemData as $k=>$v){
            $itemKeys[$k] = $k;
        }

        $sql = 'UPDATE ' . static::$table . ' 
        SET ' .
            $itemKeys['title'] . "='" . $itemData['title'] .
            "', " . $itemKeys['newText'] . "='" . $itemData['newText'] . "'
            WHERE id=" . $id;

        ;
//        echo $sql; die;
        $db = new DB;

        $res =  $db->execute($sql);

        if (!$res){
            throw new ModelException('Не удалось добавить запись в БД');
        }
        return $res;
    }



    public static function deleteOne($id)
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
//        echo $sql;die;
        $db = new DB;
        $res = $db->execute($sql, [':id' => $id]);

        if (!$res){
            throw new ModelException('Не удалось удалить запись из БД');
        }

    }

}