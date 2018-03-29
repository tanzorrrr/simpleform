<?php
$title = "singlecategory";
?>
<?php include_once(ROOT.'/views/layauts/header.php');?>

    <div class="container">


        <h3><?php echo $title?></h3>
            <h1><?php echo $cate['title']; ?></h1>
            <img src="<?php echo ROOT;?>/views/img/<?php echo $cate['img'] ?>" alt="">
            <p><?php echo $cate['description'] ?></p>

            

    </div>


<?php include_once ROOT.'/views/layauts/footer.php';?>