<?php
return array(

    'index'=>'index/index',
    'register'=>'user/register',
    'login'=>'user/login',
    'logout'=>'user/logout',
    'dashboard/main'=>'index/dashboard',
    'dashboard/users'=>'user/getusers',
    'dashboard/categories'=>'category/index',
    'category/add'=>'category/insert',
    'user/delete/([0-9]+)'=>'user/delete/$1',
    'category/delete/([0-9])'=>'category/delete/$1'

);