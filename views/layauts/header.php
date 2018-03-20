<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title><?php echo $title;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="/index">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <?php
        //echo $_SESSION['user'];
        if(!$_SESSION){?>
        <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <?php }else{?>
        <li class="nav-item">
            <a class="nav-link" href="/logout">logout</a>
        </li>
            <li>
                <a href="" class="nav-link">Hello:<?php echo $_SESSION['user']?><?php echo $_SESSION['user_id']?></a>
            </li>
        <?};?>
    </ul>

</nav>
<!---->

