<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.03.2018
 * Time: 18:33
 */
class Article
{
    public $table ="articles";
    public  function getArticle(){
        $articles = $this->all($this->table);
        return $articles;

    }

}