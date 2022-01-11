<?php
include '../controller/AuthController.php';

$controller = new AuthController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uts Data Sekolah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <br /><br />
                <div id="logout">
                    <?php if (isset($_GET['signout'])) { ?>
                        <div class="alert alert-success">
                            <small>Anda Berhasil Logout</small>
                        </div>
                    <?php } ?>
                </div>
                <div id="notifikasi">
                    <div class="alert alert-danger">
                        <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
                    </div>
                </div>
                <div id="notifikasiChaptcha">
                    <?php if (isset($_GET['chaptcha'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Chaptcha Tidak Sama</strong>
                            <a href="login.php" class="btn-close"></a>
                        </div>
                    <?php endif ?>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sign in</h4>
                    </div>
                    <div class="card-body">
                        <!-- form berfungsi mengirimkan data input 
						dengan method post ke proses login dengan paramater get aksi login -->
                        <form method="post" action="<?= $controller->proses_login() ?>" id="formlogin">
                            <div class="form-group mt-2">
                                <label>Your username</label>
                                <input name="username" class="form-control" placeholder="Username" type="text" required="required" autocomplete="off">
                            </div> <!-- form-group// -->
                            <div class="form-group mt-2">
                                <label>Your password</label>
                                <input name="password" class="form-control" placeholder="******" type="password" required="required" autocomplete="off">
                            </div> <!-- form-group// -->
                            <div class="form-group mt-2">
                                <!-- Captcha -->
                                <img src="captcha.php" alt="" srcset="" width="150px" height="40px">
                                <div class="mt-2">
                                    <input name="code" value="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <button type="submit" name="login" class="btn btn-primary btn-block"> Login </button>
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-4">
                                        <a href="index.php"> Kembali ke Home </a>
                                    </div> <!-- form-group//-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script>
            // notifikasi gagal di hide
            <?php if (empty($_GET['get'])) { ?>
                $("#notifikasi").hide();
            <?php } ?>

            <?php if (empty($_GET['chaptcha'])) { ?>
                $("#notifikasiChaptcha").hide();
            <?php } ?>

            var logingagal = function() {
                $("#logout").fadeOut('slow');
                $("#notifikasi").fadeOut('slow');
                $("#notifikasiChaptcha").fadeOut('slow');
            };

            setTimeout(logingagal, 4000);
        </script>
</body>

</html>