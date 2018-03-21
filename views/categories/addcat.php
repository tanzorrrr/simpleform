<?php
$title = "Dashboard";
?>
<?php include_once(ROOT.'/views/layauts/header.php');?>
    <h1><?php echo $title?></h1>
    <div class="container">
        <div class="row">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">title</label>
                    <input type="text" name="title" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                       Parent Category
                        <?php $category->getCat2();?>
                    </label>
                </div>
                <input name="submit" type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>


<?php include_once ROOT.'/views/layauts/footer.php';?>