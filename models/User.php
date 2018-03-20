<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.03.2018
 * Time: 11:36
 */
class User extends Model
{
    private $login;
    private $password;
    public $password2;
    public $photo;
    public $users;
    public $table='user';
    public $errors = array();


    public function checkUser()
    {
        $conn = Db::connect();

        $sql = 'SELECT * FROM user WHERE username = :uname';

        $result = $conn->prepare($sql);
        $result->bindParam(':uname', $this->login, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn()){
            return true;
            return false;
        }
    }




    public function register($login, $password, $password2, $photo)
    {

        $this->login = $login;
        $this->password = $password;
        $this->password2 = $password2;
        $this->photo = $photo;


        if ($password2 != $password) {
            $this->errors[] = "Paswords not equal";
        }
        if($this->checkUser()){
            $this->errors[] ="User olredy exists";
        }

        if (!$this->errors) {

            $conn =Db::connect();
            $sql = "INSERT INTO user(username, password, photo)
    VALUES (:name,:pass,:photo)";
            // use exec() because no results are returned
            $res = $conn->prepare($sql);
            $res->bindParam(':name', $this->login, PDO::PARAM_STR);
            $res->bindParam(':pass', $this->password, PDO::PARAM_STR);
            $res->bindParam(':photo', $this->photo, PDO::PARAM_STR);
            $res->execute();
           //

            $_SESSION['user']=$this->login;

           header("Location: /dashboard");




        }else{
            echo $this->errors[0];
        }

    }

    public function login($login,$password)
    {
        $this->login = $login;
        $this->password = $password;

        $conn =Db::connect();

        $sql = 'SELECT * FROM user WHERE username = :uname AND password=:pass';


        $result = $conn->prepare($sql);
        $result->bindParam(':uname', $this->login, PDO::PARAM_STR);
        $result->bindParam(':pass', $this->password, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();
        $user = $result->fetch();
       // var_dump($user);
        if($user!=null){
            $_SESSION['user']=$this->login;
            $_SESSION['user_id']=$user['id'];
           // var_dump($_SESSION);
            header("Location: /dashboard");

            return true;
            return false;
        }
        if(!$user){
           echo $this->errors[]="logim or pass invalid";
            return $this->errors[0];
        }


    }

    public function logout(){
        session_destroy();

        header('Location:index');
    }

    public function getUsers()
    {
      $users = $this->users=$this->all($this->table);
        return $users;
        return false;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
    public  function getUser($id){
        $user =$this->get($this->table, $id);
        //var_dump($user);
        return $user;
    }

    public function deleteUser($id){
       
        $this->destroy($this->table, $id);
        
    }



}