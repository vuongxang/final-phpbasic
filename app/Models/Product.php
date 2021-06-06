<?php

namespace Mvc\Models;

class Product extends AbstractModel
{
    protected static $table = 'products';
    private $id;
    private $name;
    public $description;
    public $image;
    public $price;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->description = $item['description'];
        $this->image = $item['image'];
        $this->price = $item['price'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


    public function create()
    {
        $db = self::getInstance();
        $req = $db->prepare("INSERT INTO " . static::$table . "(name,image,description) VALUES (:name,:image,:description)");
        $req->execute([
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'description' => $this->description
        ]);
    }
}
