<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.03.2018
 * Time: 9:08
 */
class CategoryController
{
        public function index(){
            $category =new Category();
//            $categories =$category->getCat();
          // $category->getTreeCat();
            include_once "views/categories/index.php";
        }

}