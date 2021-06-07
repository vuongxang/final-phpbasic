<?php

namespace Mvc\Models;

class Product extends AbstractModel
{
    protected static $table = 'products';
    public $id;
    public $name;
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


    public function save()
    {
        $db = self::getInstance();
        $req = $db->prepare("INSERT INTO " . static::$table . "(name,image,description,price) VALUES (:name,:image,:description,:price)");
        $req->execute([
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'description' => $this->description
        ]);
    }

    public static function findProductByCateId($cate_id){
        $list =[];
        $db = self::getInstance();
        $req = $db->prepare("SELECT * FROM products INNER JOIN pro_cate ON pro_cate.pro_id = products.id WHERE pro_cate.cate_id=$cate_id");
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new static($item);
        }

        return $list;
    }

    public static function filterByColor($colors){
        $list =[];
        $db = self::getInstance();
        $sql = "SELECT * FROM products INNER JOIN pro_color ON products.id = pro_color.pro_id WHERE pro_color.color_id IN (";
        foreach($colors as $color_id){
            $sql.=$color_id.",";
        }
        $sql.="0)";
        // var_dump($sql); die;
        $req = $db->prepare($sql);
        $req->execute();
        foreach ($req->fetchAll() as $item) {
            $list[] = new static($item);
        }

        return $list;
    }

}
