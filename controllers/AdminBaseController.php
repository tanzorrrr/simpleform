<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.03.2018
 * Time: 12:23
 */
abstract class  AdminBaseController
{
    public  static  function checkAdmin(){
        $admin = new User();

        $admin =$admin->getUser($_SESSION['user_id']);


        if ($admin['role'] === '1') {
            return true;
      }else{
            die("You hewe no permission for this action");
        }



    }
    
}