<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.03.2018
 * Time: 17:49
 */
class ArticlController extends AdminBaseController
{
   public function index(){
       $articl= new Article();
       $articles=$articl->getArticle();
       include_once "views/articles/index.php";
   }

}