<?php

namespace Mvc\Models;

class ProCate extends AbstractModel
{
    protected static $table = 'pro_cate';
    private $id;
    private $pro_id;
    public $cate_id;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->pro_id = $item['pro_id'];
        $this->cate_id = $item['cate_id'];
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
    public function getCateId()
    {
        return $this->cate_id;
    }

    public function store(){
        $db = self::getInstance();
        $req = $db->prepare("INSERT INTO " . static::$table . "(pro_id,cate_id) VALUES (:pro_id,:cate_id)");
        $req->execute([
            'pro_id' => $this->pro_id,
            'cate_id' => $this->cate_id,
        ]);
    }

}
