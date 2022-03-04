<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="login_post.php" method="POST">
                                <div class="mt-3">
                                    <label for="" class="form-label">Your Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Your Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (isset($_SESSION['email_exist'])) { ?>
        <script>
            Swal.fire(
                'Invalid!',
                '<?= $_SESSION['email_exist']?>',
                'error'
            )
        </script>
    <?php } unset($_SESSION['email_exist'])?>

    <?php if (isset($_SESSION['password_wrong'])) { ?>
        <script>
            Swal.fire(
                'Wrong!',
                '<?= $_SESSION['password_wrong']?>',
                'error'
            )
        </script>
    <?php } unset($_SESSION['password_wrong'])?>

</body>

</html>