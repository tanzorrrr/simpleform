<?php
return array(
    'index'=>'index/index',
    'register'=>'user/register',
    'login'=>'user/login',
    'logout'=>'user/logout',
    'dashboard/mein'=>'index/dashboard',
    'dashboard/users'=>'user/getusers',
    'dashboard/categories'=>'category/index',
    //'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'user/delete/([0-9]+)'=>'user/delete/$1',

);