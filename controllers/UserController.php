<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.03.2018
 * Time: 12:21
 */
class UserController extends AdminBaseController
{

        public  function register(){
            $user = new User();
            if(isset($_POST['submit'])){
                $user->register($_POST['name'],$_POST['password']
                    ,$_POST['password2'] ,$_POST['photo'] );
            }

            require_once 'views/register.php';
        }

    public  function login(){
        $user = new User();
        if(isset($_POST['submit'])){
            $user->login($_POST['name'],$_POST['password']
                 );
        }

        require_once 'views/login.php';
    }

    public function logout(){
        $user = new User();
        $user->logout();

    }

    public function getusers()
    {
        $users = new User();
        $items =$users->getUsers();
       
        require_once 'views/users/index.php';
    }

    public  function delete($id){
        $users = new User();

       self::checkAdmin();

        $users->deleteUser($id);

        header("Location:/users");
    }


}