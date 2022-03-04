<?php
session_start();
require '../session_check.php';
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
                    <div class="card-header">
                        <h3>Add New User</h3>
                        <!-- junaiyet -->
                        <?php if (isset($_SESSION['email_exits'])) { ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['email_exits'] ?>
                            </div>
                        <?php }
                        unset($_SESSION['email_exits']) ?>
                        <!-- junaiyet -->
                    </div>
                    <div class="card-body">
                        <form action="register_post.php" method="POST" enctype="multipart/form-data">
                            <div class="mt-3">
                                <label for="" class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Your Email</label>
                                <input type="email" class="form-control" name="email">

                            </div>
                            <div class="mt-3">
                                <label for="" class="form-label">Your Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mt-3">
                                <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                <img width="200" class="mt-2" id="pic" />
                            </div>
                            <?php if (isset($_SESSION['extension'])) { ?>
                                <strong class="text-danger"><?= $_SESSION['extension'] ?></strong>
                            <?php }
                            unset($_SESSION['extension']) ?>

                            <?php if (isset($_SESSION['size'])) { ?>
                                <strong class="text-danger"><?= $_SESSION['size'] ?></strong>
                            <?php }
                            unset($_SESSION['size']) ?>
                            <div class="mt-3">
                                <select name="role" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Mod</option>
                                    <option value="4">Viewer</option>
                                </select>

                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Register</button>
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


<?php if (isset($_SESSION['exist'])) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $_SESSION['exist'] ?>',
        })
    </script>
<?php }
unset($_SESSION['exist']) ?>