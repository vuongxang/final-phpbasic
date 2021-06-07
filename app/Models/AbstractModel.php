<?php

namespace Mvc\Models;

abstract class AbstractModel
{
    protected static $table = '';

    private static $instance = null;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
                self::$instance->exec("SET NAMES 'utf8'");
            } catch (\PDOException $ex) {
                die($ex->getMessage());
            }
        }
        return self::$instance;
    }

    public static function all()
    {
        $list = [];
        $db = self::getInstance();
        $req = $db->query("SELECT * FROM " . static::$table);

        foreach ($req->fetchAll() as $item) {
            $list[] = new static($item);
        }

        return $list;
    }

    public static function paginator()
    {
        $list = [];
        $db = self::getInstance();
        $req = $db->query("SELECT * FROM " . static::$table." LIMIT 5,9");

        foreach ($req->fetchAll() as $item) {
            $list[] = new static($item);
        }

        return $list;
    }

    public static function delete($id){
        $db = self::getInstance();
        $req = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $req->execute(['id' => $id]);
    }

    public static function where($fillname,$comp,$val){
        $list =[];
        $db = self::getInstance();
        $req = $db->prepare("SELECT * FROM " . static::$table. " WHERE ".$fillname." ".$comp." '$val'");
        // var_dump($req); die;
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new static($item);
        }

        return $list;
    }

    public static function getById($id)
    {
        $db = self::getInstance();
        $req = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $req->execute(['id' => $id]);

        $item = $req->fetch();

        if (isset($item['id'])) {
            return new static($item);
        }

        return null;
    }

    public static function search($keyword = "pro")
    {
        $list = [];
        $db = self::getInstance();
        $req = $db->prepare("SELECT * FROM " . static::$table. " WHERE name LIKE '%$keyword%'");
        
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new static($item);
        }
        return $list;
    }


}
