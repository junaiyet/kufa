<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';

$select_works_content = "SELECT * FROM works";
$select_works_content_result = mysqli_query($db_connection, $select_works_content);

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
                                        <th>Added</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_works_content_result as $key => $work) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <?php 
                                                    $user_id = $work['user_id'];
                                                    $user = "SELECT * FROM users WHERE id=$user_id";
                                                    $select_result = mysqli_query($db_connection, $user);
                                                    $after_assoc =  mysqli_fetch_assoc($select_result);
                                                    echo $after_assoc['name'];
                                                ?>
                                            </td>
                                            <td><?= $work['title'] ?></td>
                                            <td><?= $work['category'] ?></td>
                                            <td><?= $work['desp'] ?></td>
                                            <td><img width="100" src="../uploads/works/<?= $work['image'] ?>" alt=""></td>

                                            <td>
                                                <a href="banner_content_delete.php?id=<?= $work['id'] ?>" class="btn btn-danger">Delete</a>
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