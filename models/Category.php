<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20.03.2018
 * Time: 9:08
 */
class Category extends Model
{
    public $table = "category";

    public function getCat()
    {
        $catgories = $this->all($this->table);
        return $catgories;

    }
    
    public function updateCat($id,$title,$img,$description,$parent_id){
        $conn = Db::connect();

        $sql = "UPDATE category
            SET 
                title = :title, 
                img = :img, 
                description = :descriotion,
                parent_id =:parent_id
            WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        $result->bindParam(':descriotion', $description, PDO::PARAM_STR);
        $result->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
        
        return $result->execute();

    }

    public function getTreeCat()
    {
        function CategoryTree(&$output = null, $parent = 0, $indent = null)
        {
            // conection to the database
            $db = Db::connect();
            // select the categories that have on the parent column the value from $parent
            $r = $db->prepare("SELECT id, title FROM category WHERE parent_id=:parentid");
            $r->execute(array(
                'parentid' => $parent
            ));
            // show the categories one by one
            while ($c = $r->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<tr><td>" . $c['id'] . "</td>
                <td>" . $indent . $c['title'] . "</td>
                <td><a href='/categories/edit/".$c['id']."'  class='btn btn-success'>Edit</a><a href='/categories/show/".$c['id']."' class='btn btn-info'>Info</a><a href='/category/delete/".$c['id']."' class='btn btn-danger'>Delt</a></td>";
                if ($c['id'] != $parent) {
                    // in case the current category's id is different that $parent
                    // we call our function again with new parameters
                    CategoryTree($output, $c['id'], $indent . "--");
                }
            }
            // return the list of categories
            return $output;
        }

        // show the categories on the web page
      echo CategoryTree();

    }
    
    public function getSingleCat($id){
        $category =$this->get($this->table, $id);
        return $category;
        
    }

    public  function getCat2($selected=0,$title="Select cagory"){
        function CategoryTree2(&$output=null, $parent=0, $indent=null){
            // conection to the database
           $conn=Db::connect();
            $r = $conn->prepare("SELECT id, title FROM category WHERE parent_id=:parentid");
            $r->execute(array(
                'parentid' 	=> $parent
            ));
            // show the categories one by one
            while($c = $r->fetch(PDO::FETCH_ASSOC)){
                $output .= '<option value=' . $c['id'] . '>' . $indent . $c['title'] . "</option>";
                if($c['id'] != $parent){
                    // in case the current category's id is different that $parent
                    // we call our function again with new parameters
                    CategoryTree2($output, $c['id'], $indent . "&nbsp;&nbsp;");
                }
            }
            // return the list of categories
            return $output;
        }
// show the categories on the web page
        echo "<select name='parent_id'>
<option value='".$selected."'>".$title."</option>" .
            CategoryTree2() .
            "</select>";
    }

    public function addCat($title,$file,$description,$parent_id){
        $conn = Db::connect();

        $sql ="INSERT INTO category(title,img,description,parent_id)VALUES(:title,:img,:description,:parent_id)";
        $result= $conn->prepare($sql);
        $result->bindParam(':title',$title,PDO::PARAM_STR);
        $result->bindParam(':img',$file,PDO::PARAM_STR);
        $result->bindParam(':description',$description,PDO::PARAM_STR);
        $result->bindParam(':parent_id',$parent_id,PDO::PARAM_INT);
        return $result->execute();

        

    }

    public function deleteCat($id){
        $this->destroy($this->table,$id);
    }


}