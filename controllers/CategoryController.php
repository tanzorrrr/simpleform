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

    public function insert(){
        $category = new Category();
        //var_dump($_POST);
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $parent_id = $_POST['parent_id'];
            if(isset($title)||!empty($title)){
                $category->addCat($title,$description ,$parent_id );
                header("Location:/dashboard/categories");
            }


        }

        include_once "views/categories/addcat.php";
        return false;
    }

}