<?php
session_start();
error_reporting(0);
include("includes/config.php");
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT id_user FROM users WHERE userName='$username' and password='$password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['uname'] = $_POST['uname'];
        $_SESSION['uid'] = $num['id_user'];
        header("location: user/search.php");
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>サインイン | JISHOTECH</title>
    <!-- base:css -->
    <link rel="stylesheet" href="user/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="user/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="user/css/vertical-layout-light/style.css">
    <!-- endinject -->

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href="css/templatemo-pod-talk.css" rel="stylesheet">
</head>

<body>
    <main>
        <!-- Header bar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.php">
                    <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 650px">
                    <div class="ms-4">
                        <a href="signup.php" class="btn custom-btn custom-border-btn smoothscroll">サインアップ</a>
                    </div>
					<div class="ms-4">
                        <a href="signin.php" class="btn custom-btn custom-border-btn smoothscroll">サインイン</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="site-header d-flex flex-column justify-content-center align-items-center"  style="min-height: 110px;">
        </header> 
        <!-- End of Header bar -->
    
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light py-5 px-4 px-sm-5">
                            <h3 style="color:white; text-align: center;">ようこそ</h3>
                            <p style="color:white; text-align: center;">続行するにはサインインしてください。</p>
                            <form class="pt-3" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg border-left-0" id="username"
                                        placeholder="ユーザー名" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg border-left-0"
                                        id="password" placeholder="パスワード" name="password" required="true">
                                </div>
                                <div class="mt-3" style="text-align: center">
                                    <button type="submit"
                                        class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn"
                                        style="width: 200px; height: 50px; flex-shrink: 0; border-radius: 25px; border-color:#1877F2; background: #1877F2; display: block; margin: 0 auto;"
                                        name="signin">
                                        <span style="color: white">サインイン</span>
                                    </button>
                                    <button type="submit"
                                        class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn"
                                        style="width: 200px; height: 50px; flex-shrink: 0; border-radius: 25px; display: block; background: #1ca9d1; margin: 0 auto; border-color:#1ca9d1; box-shadow: none;"
                                        name="signup">
                                        <a style="color: white" href="signup.php">サインアップ</a>
                                    </button>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->

    <!-- base:js -->
    <script src="user/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="user/js/off-canvas.js"></script>
    <script src="user/js/hoverable-collapse.js"></script>
    <script src="user/js/template.js"></script>
    <script src="user/js/settings.js"></script>
    <script src="user/js/todolist.js"></script>
    <!-- endinject -->
    </main>

    <?php include('includes/footer.php'); ?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>