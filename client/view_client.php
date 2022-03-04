<?php
session_start();
require '../dashboard_parts/header.php';

require '../db.php';
$select_client = "SELECT * FROM clients";
$select_client_result = mysqli_query($db_connection, $select_client);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Client list</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Client logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($select_client_result as $key => $client) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><img width="100" src="../uploads/client/<?= $client['client'] ?>" alt=""></td>
                                    <td>
                                        <a href="client_status.php?id=<?= $client['id'] ?>" class="btn <?= ($client['status'] == 1 ? 'btn-success' : 'btn-secondary') ?>"><?= ($client['status'] == 1 ? 'active' : 'deactive') ?></a>
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