<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';

$select_about_content = "SELECT * FROM about_contents";
$select_about_content_result = mysqli_query($db_connection, $select_about_content);

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
                            <h3>About Content List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Sub Title</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_about_content_result as $key => $about_content) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $about_content['sub_title'] ?></td>
                                            <td><?= $about_content['title'] ?></td>
                                            <td><?= $about_content['desp'] ?></td>
                                            <td><img width="100" src="../uploads/about/<?= $about_content['image'] ?>" alt=""></td>

                                            <td>
                                                <a href="banner_content_delete.php?id=<?= $banner_content['id'] ?>" class="btn btn-danger">Delete</a>
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