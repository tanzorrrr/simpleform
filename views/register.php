<?php
$title = "Login";
?>
<?php include_once 'layauts/header.php';?>
<div class="container">

<h1><?php echo $title?></h1>

<form action="" method="post">
    <p>
        name:<input type="text" name="name">
    </p>

    <p>pass1:<input type="text" name="password"></p>
    <p>pass2:<input type="text"name="password2"></p>
    <p>photo<input type="text" name="photo"></p>
    <p><input type="submit" name="submit" class="btn btn-success"></p>
</form>

</div>
<?php include_once 'layauts/footer.php';?>

