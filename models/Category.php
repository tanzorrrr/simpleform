<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.03.2018
 * Time: 9:08
 */
class Category extends Model
{
    public $table="category";
    public  function getCat(){
        $catgories = $this->all($this->table);
        return $catgories;

    }

}