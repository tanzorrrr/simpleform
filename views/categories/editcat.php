<?php
$title = "Edit Cat";
?>
<?php include_once(ROOT.'/views/layauts/header.php');?>
    <h1><?php echo $title?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include_once (ROOT.'/views/layauts/asade.php');?>
            </div>
            <div class="col-md-9">
                <form action="/categories/update/<?php echo $cate['id'];?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $cate['title']; ?>" id="email">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <img src=""<?php echo $cate['title']; ?>" alt="">
                        <input type="file"  name="file" class="form-control" id="file">
                    </div>
                    <div class="form-group">
                        <label for="pwd">description</label>
                        <textarea name="description" id="" cols="30" rows="10"><?php echo $cate['description'] ?></textarea>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            Parent Category
                            <?php $category->getCat2();?>
                        </label>
                    </div>
                    <input name="submit" value="update" type="submit" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
    </div>


<?php include_once ROOT.'/views/layauts/footer.php';?>