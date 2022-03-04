<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';

$select_feedbacks = "SELECT * FROM feedbacks";
$select_feedbacks_result = mysqli_query($db_connection, $select_feedbacks);

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
                            <h3>About Feedback List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_feedbacks_result as $key => $feedback) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $feedback['name'] ?></td>
                                            <td><?= $feedback['designation'] ?></td>
                                            <td><?= $feedback['desp'] ?></td>
                                            <td><img width="100" src="../uploads/feed/<?= $feedback['image'] ?>" alt=""></td>

                                            <td>
                                                <a href="" class="btn btn-danger">Delete</a>
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