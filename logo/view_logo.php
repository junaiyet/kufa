<?php
session_start();
require '../dashboard_parts/header.php';

require '../db.php';
$select_logo = "SELECT * FROM logos";
$select_logo_result = mysqli_query($db_connection, $select_logo);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Add Service</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Logo list</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($select_logo_result as $key => $logo) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><img width="100" src="../uploads/logo/<?= $logo['logo'] ?>" alt=""></td>
                                    <td>
                                        <a href="logo_status.php?id=<?= $logo['id']?>" class="btn <?= ($logo['status'] == 1 ? 'btn-success' : 'btn-secondary') ?>"><?= ($logo['status'] == 1 ? 'active' : 'deactive') ?></a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require '../dashboard_parts/footer.php';
?>