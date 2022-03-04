<?php
session_start();
require '../dashboard_parts/header.php';
require '../db.php';

$select_skill = "SELECT * FROM skills";
$select_skill_result = mysqli_query($db_connection, $select_skill);

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
                            <h3>Skill List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Topic</th>
                                        <th>Description</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($select_skill_result as $key => $skill) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $skill['topic'] ?></td>
                                            <td><?= $skill['desp'] ?></td>
                                            <td><?= $skill['percentage'] ?></td>
                                            <td>
                                                <a href="skill_status.php?id=<?= $skill['id'] ?>" class="btn btn-<?= ($skill['status'] == 1 ? 'success' : 'secondary') ?>"><?= ($skill['status'] == 1 ? 'Active' : 'Deactive') ?></a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger">Delete</a>
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
<?php if (isset($_SESSION['limit'])) { ?>
    <script>
        Swal.fire(
            'Oops',
            '<?= $_SESSION['limit'] ?>',
            'error'
        )
    </script>
<?php }
unset($_SESSION['limit']) ?>