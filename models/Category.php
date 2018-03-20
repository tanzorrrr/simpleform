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
                <td><a class='btn btn-success'>action</a></td>";
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


}