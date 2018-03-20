<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.03.2018
 * Time: 9:45
 */
class Db
{
    public static function connect()
    {
        $servername = DBHOST;
        $username = DBUSER;
        $password = DBPASS;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=".DB, $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }

}