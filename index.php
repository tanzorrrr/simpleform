<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.03.2018
 * Time: 11:22
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
// Подключение файлов системы
define('ROOT', dirname(__FILE__));
include_once "config/config.php";
//models
include_once "models/Model.php";
include_once "models/Db.php";
include_once "models/Category.php";
include_once "models/User.php";
include_once "models/Article.php";
//controlers
include_once "controllers/AdminBaseController.php";
include_once "controllers/UserController.php";
include_once "controllers/CategoryController.php";
include_once "controllers/ArticleController.php";

include_once "Route.php";


$app = new Route();
$app->run();









