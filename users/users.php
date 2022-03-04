<?php
session_start();
require '../session_check.php';
require '../db.php';

$select = "SELECT * FROM users WHERE status=0";
$select_result = mysqli_query($db_connection, $select);

$select_trash_user = "SELECT * FROM users WHERE status=1";
$select_trashed_result = mysqli_query($db_connection, $select_trash_user);

?>
<?php require '../dashboard_parts/header.php'; ?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    <div class="sl-pagebody">
        <?php if ($after_assoc_info['role'] != 4) { ?>
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Users Informations</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <?php if ($after_assoc_info['role'] == 1 || $after_assoc_info['role'] == 2) { ?>
                                        <th>Action</th>

                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($select_result as $key => $user) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $user['name'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td>
                                            <img width="50" src="../uploads/users/<?= $user['profile_photo'] ?>" alt="">
                                        </td>
                                        <?php if ($after_assoc_info['role'] == 1 || $after_assoc_info['role'] == 2) { ?>
                                            <td>
                                                <a href="user_edit.php?id=<?= $user['id'] ?>" class="btn btn-info">Edit</a>
                                                <?php if ($after_assoc_info['role'] == 1) { ?>
                                                    <button name="user_status.php?id=<?= $user['id'] ?>" type="button" class="btn btn-danger status">Delete</button>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <?php if (mysqli_num_rows($select_result) == 0) { ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Data Found</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>


                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Trashed Users Informations</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php foreach ($select_trashed_result as $key => $user) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td>
                                        <img width="50" src="uploads/users/<?= $user['profile_photo'] ?>" alt="">
                                    </td>
                                    <td>
                                        <a href="user_status.php?id=<?= $user['id'] ?>" class="btn btn-success">Restore</a>
                                        <button name="delete.php?id=<?= $user['id'] ?>" type="button" class="btn btn-danger del">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if (mysqli_num_rows($select_trashed_result) == 0) { ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Data Found</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <?php } else { ?>

            <div class="alert alert-warning py-3 px-1">
                <h3>Apni Gorib, Ai page dekhar samrtho nai!!!</h3>
            </div>
        <?php } ?>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_parts/footer.php'; ?>

<script>
    $('.status').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        })
    });
</script>


<script>
    $('.del').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        })
    });
</script>

<?php if (isset($_SESSION['delete'])) { ?>
    <script>
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    </script>
<?php }
unset($_SESSION['delete']) ?>




<?php if (isset($_SESSION['update'])) { ?>
    <script>
        Swal.fire(
            'Updated!',
            '<?= $_SESSION['update'] ?>',
            'success'
        )
    </script>
<?php }
unset($_SESSION['update']) ?>

<?php if (isset($_SESSION['login_msg'])) { ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['login_msg'] ?>'
        })
    </script>
<?php }
unset($_SESSION['login_msg']) ?>