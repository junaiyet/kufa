<?php
session_start();
require '../session_check.php';
require '../db.php';
$id = $_GET['id'];

$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query($db_connection, $select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result);

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
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white">Edit User</h3>
                    </div>
                    <div class="card-body">
                        <form action="update_user.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mt-3">
                                        <label for="" class="form-label">Your Name</label>
                                        <input type="hidden" value="<?= $after_assoc['id'] ?>" class="form-control" name="id">
                                        <input type="text" value="<?= $after_assoc['name'] ?>" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mt-3">
                                        <label for="" class="form-label">Your Email</label>
                                        <input type="email" value="<?= $after_assoc['email'] ?>" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <label for="" class="form-label">Your Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <label for="">Photo</label>
                                        <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        <img width="200" class="my-2 " id="pic" src="../uploads/users/<?= $after_assoc['profile_photo'] ?>">
                                        <?php if (isset($_SESSION['extension'])) { ?>
                                            <strong class="text-danger"><?= $_SESSION['extension'] ?></strong>
                                        <?php }
                                        unset($_SESSION['extension']) ?>

                                        <?php if (isset($_SESSION['size'])) { ?>
                                            <strong class="text-danger"><?= $_SESSION['size'] ?></strong>
                                        <?php }
                                        unset($_SESSION['size']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_parts/footer.php'; ?>

<?php if (isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?= $_SESSION['success'] ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php }
unset($_SESSION['success']) ?>