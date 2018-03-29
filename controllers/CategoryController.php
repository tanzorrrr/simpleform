<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.03.2018
 * Time: 9:08
 */
class CategoryController extends AdminBaseController
{
        public function index(){
            $category =new Category();
//            $categories =$category->getCat();
          // $category->getTreeCat();
            include_once "views/categories/index.php";
        }

    public function insert(){
        $category = new Category();
        self::checkAdmin();
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $parent_id = $_POST['parent_id'];
            if(isset($_FILES['file'])){
                $file = $_FILES['file'];
                $img = $file['name'];
                $category->moveFile($file);
            }

            if(isset($title)||!empty($title)){
                $category->addCat($title,$img,$description ,$parent_id);
                header("Location:/dashboard/categories");
            }


        }

        include_once "views/categories/addcat.php";
        return false;
    }
    
    public function show($id)
    {
        $category = new Category();

            $cate =$category->getSingleCat($id);

        include_once "views/categories/single.php";
    }
    
    
    public function edit($id){
        $category = new Category();
        $cate =$category->getSingleCat($id);
        
        include_once "views/categories/editcat.php";


        }

    public function  update($id){
        self::checkAdmin();
        $category = new Category();
        if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $parent_id = $_POST['parent_id'];
            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                $img = $file['name'];
                $category->moveFile($file);
            }

            $category->updateCat($id, $title, $img, $description, $parent_id);

        }
        header("Location:/dashboard/categories");
    }

    public  function delete($id){
        $category = new Category();
        self::checkAdmin();
        $category->deleteCat($id);
        header("Location:/dashboard/categories");

    }

}