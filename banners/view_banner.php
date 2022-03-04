<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';

$select_banner_content = "SELECT * FROM banner_contents";
$select_banner_content_result = mysqli_query($db_connection, $select_banner_content);


$select_banner_image = "SELECT * FROM banner_images";
$select_banner_image_result = mysqli_query($db_connection, $select_banner_image);

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Banner Content List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Sub Title</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_banner_content_result as $key => $banner_content) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $banner_content['sub_title'] ?></td>
                                            <td><?= $banner_content['title'] ?></td>
                                            <td><?= $banner_content['desp'] ?></td>
                                            <td>
                                                <!-- Process 1 -->
                                                <!-- <?php if ($banner_content['status'] == 1) { ?>
                                                    <a href="#" class="btn btn-success">Active</a>
                                                <?php } else { ?>
                                                    <a href="#" class="btn btn-secondary">Deactive</a>
                                                <?php } ?> -->


                                                <!-- Process 2 -->
                                                <a href="banner_content_status.php?id=<?= $banner_content['id'] ?>" class="btn btn-<?= ($banner_content['status'] == 1 ? 'success' : 'secondary') ?>"><?= ($banner_content['status'] == 1 ? 'Active' : 'Deactive') ?></a>



                                            </td>
                                            <td>
                                                <a href="banner_content_delete.php?id=<?= $banner_content['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Banner Image List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_banner_image_result as $key => $banner_image) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <img width="100" src="../uploads/banners/<?= $banner_image['banner_image'] ?>" alt="">
                                            </td>
                                            <td>
                                                <!-- Process 2 -->
                                                <a href="banner_image_status.php?id=<?= $banner_image['id'] ?>" class="btn btn-<?= ($banner_image['status'] == 1 ? 'success' : 'secondary') ?>"><?= ($banner_image['status'] == 1 ? 'Active' : 'Deactive') ?></a>
                                            </td>
                                            <td>
                                                <a href="banner_image_delete.php?id=<?= $banner_image['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
require '../dashboard_parts/footer.php';
?>