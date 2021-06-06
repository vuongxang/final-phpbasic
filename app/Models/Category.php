<?php

namespace Mvc\Models;

class Category extends AbstractModel
{
    protected static $table = 'categories';
    private $id;
    private $name;
    public $description;
    private $parent;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->description = $item['description'];
        $this->parent = $item['parent'];
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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return mixed
     */
}
