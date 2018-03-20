<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.03.2018
 * Time: 13:12
 */
class IndexController
{
    public function index(){
        require_once "views/index.php";
    }

    public function dashboard(){
        $users = new User();
        $items =$users->getUsers();
        require_once "views/dashboard.php";
    }

}