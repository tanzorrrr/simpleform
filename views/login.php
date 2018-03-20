<?php
$title = "Login";
?>
<?php include_once 'layauts/header.php';?>
<div class="container">

<h2 class="title"><?php echo $title?></h2>
        <hr>



<form action="" method="post">
    <div class="form-group">
        <label for="">:name</label>
        <input type="text" name="name">
    </div>

    <div class="form-group">
        <label for="">password:</label>
        <input type="text" name="password"></div>

    
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success">
    </div>
</form>
    
</div>
<?php include_once 'layauts/footer.php';?>

