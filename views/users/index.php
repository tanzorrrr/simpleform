<?php
$title = "Dashboard";
?>
<?php include_once(ROOT.'/views/layauts/header.php');?>
    <h1><?php echo $title?></h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php include_once ROOT.'/views/layauts/asade.php';?>
            </div>
            <div class="col-md-10">

                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php foreach ($items as $item):?>
                        <tr>
                            <td><?php echo $item["id"];?></td>
                            <td><?php echo $item["username"];?></td>
                            <td><a href="/user/delete/<?php echo $item["id"];?>"class="btn btn-danger">Delite</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>


<?php include_once ROOT.'/views/layauts/footer.php';?>