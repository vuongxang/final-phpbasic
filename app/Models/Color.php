<?php

namespace Mvc\Models;

class Color extends AbstractModel
{
    protected static $table = 'colors';
    private $id;
    private $name;
    public $color;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->color = $item['color'];
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
    public function getColor()
    {
        return $this->color;
    }
}
