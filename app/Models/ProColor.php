<?php

namespace Mvc\Models;

class ProColor extends AbstractModel
{
    protected static $table = 'pro_color';
    private $id;
    private $pro_id;
    public $color_id;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->pro_id = $item['pro_id'];
        $this->color_id = $item['color_id'];
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
    public function getProId()
    {
        return $this->pro_id;
    }

    /**
     * @return mixed
     */
    public function getColorId()
    {
        return $this->color_id;
    }

    public function store(){
        $db = self::getInstance();
        $req = $db->prepare("INSERT INTO " . static::$table . "(pro_id,color_id) VALUES (:pro_id,:color_id)");
        $req->execute([
            'pro_id' => $this->pro_id,
            'color_id' => $this->color_id,
        ]);
    }

}
