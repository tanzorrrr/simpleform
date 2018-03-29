<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.03.2018
 * Time: 9:43
 */
class Model
{
    public function all($table){
        $conn = Db::connect();
        $sql ="SELECT * FROM $table";
        $res = $conn->prepare($sql);
        $res->execute();
        $result = $res->fetchAll();
        //var_dump($result);
        return $result;
        return false;
    }

    public function  get($table,$id){
        $conn =Db::connect();
        $sql = "SELECT * FROM $table WHERE id = $id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();
        $admin = $result->fetch();
        //var_dump($admin);
        return $admin;

    }

    public function destroy($table,$id)
    {
        $conn = Db::connect();
        // sql to delete a record
        $sql = "DELETE FROM $table WHERE id=$id";

        // use exec() because no results are returned
        $conn->exec($sql);
        //echo "Record deleted successfully";
        $conn=null;

    }

    public function moveFile($file){
        $target_dir = ROOT."/views/img/";
        $target_file = $target_dir . basename($file["name"]);
        //var_dump($file);
        if($file['size']>50000000){
            echo "too big size";
        }


        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";

        }

        move_uploaded_file($file["tmp_name"], $target_file);

        }



}