<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (strlen($_SESSION['uid'] == 0)) {
    header('location: ../signin.php');
} 
else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>JishoTech || Action History</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!--Custom Theme files-->
        <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        </script>
        </script>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">

    </head>

    <body>
        <!-- Header -->
        <header class="header container-fluid">
            <div class="header-left">
                <div class="logo text-center">
                    <a href="../index.php" class="logo__link">JishoTech</a>
                </div>
                <div class="header-navbar">
                    <ul class="nav nav-pills navbar-custom">
                        <li class="nav-item">
                            <a href="search.php" class="nav-link text-center">単語の探索</a>
                        </li>
                        <li class="nav-item">
                            <a href="topic.php" class="nav-link text-center">トピックリスト</a>
                        </li>
                        <li class="nav-item">
                            <a href="bookmark.php" class="nav-link text-center">ブックマーク</a>
                        </li>
                        <li class="nav-item active">
                            <a href="history.php" class="nav-link text-center">アクション歴史</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="header-right">
                <div class="dropdown">
                    <button class="btn-dd dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        ユーザー名
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">
                                <img src="./images/header/avatar-icon.png" alt="avatar-icon">
                                プロフィール
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="signout.php">
                                <img src="./images/header/signout-icon.png" alt="signout-icon">
                                サインアウト
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="content">
            <!-- Stats -->
            <div class="row">
                <?php
                $user_id = $_SESSION['uid'];
                $ret = mysqli_query($con, "SELECT * FROM users WHERE id_user='$user_id'");
                $num = mysqli_fetch_array($ret);

                $now = new DateTime();
                $lastlogout = date_create_from_format('Y-m-d H:i:s',$num['lastlogout']);
                $lastlogin = date_create_from_format('Y-m-d H:i:s',$num['lastlogin']);
                
                $interval2 = date_diff($now,$lastlogout);
                $interval1 = date_diff($now,$lastlogin);
                ?>
                <div class="col-md-6 col-xl-6">
                    <div class="card h-100 card-custom" >
                        <div class="card-body">
                            <i class="fa fa-desktop float-right"></i>
                            <h6 class="text-hist-1 text-uppercase m-b-15">最後にアカウントにログインした</h6>
                            <h2 class="m-b-15 text-hist-2"><?php echo $interval1->format('%D days %H hours'); ?>&nbsp</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="card h-100 card-custom" >
                        <div class="card-body">
                            <i class="fa fa-desktop float-right"></i>
                            <h6 class="text-hist-1 text-uppercase m-b-15">最後にアカウントにログアウトした</h6>
                            <h2 class="m-b-15 text-hist-2" style="color: tomato"><?php echo $interval2->format('%D days %H hours'); ?>&nbsp</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats -->

            <div style="font-size:x-large; margin-top: 2rem;">&nbsp最近検索した言葉</div>

            <!-- Search history -->
            <div class="row">
                <?php
                $user_id = $_SESSION['uid'];
                
                $json = json_decode(file_get_contents('wordhistory.json'), true);

                // foreach ($json as $row) {
                for ($i = count($json) - 1; $i >= count($json) - 6; $i--) {
                    $row = $json[$i];
                    if ($row[0]['id_user'] == $user_id) {
                        // echo '<pre>' . print_r($row[0]['id_word'], true) . '</pre>';
                        // Get the word ID
                        $id_word = $row[0]['id_word'];
                        // Connect to database to get word details
                        $ret = mysqli_query($con, "SELECT * FROM words WHERE id_word='$id_word' limit 1");
                        $row = mysqli_fetch_array($ret);
                ?>
                
                <div class="col-xl-12" style="margin-top: 1rem">
                    <div class="card h-100 card-custom-2" >
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo htmlentities($row['kanji']); ?>
                                <span style="color: #1677FF; font-size: 15px">「<?php echo htmlentities($row['hiragana']); ?>」</span>
                            </h5>
                            <span class="card-text"><?php echo htmlentities($row['meaning']);?></span>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <!-- Search history -->
        </div>

        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
        <script>
            $(document).ready(function () {
                var currentTopicId = getUrlParameter('topic');
                if (currentTopicId === '' || currentTopicId === '0') {

                    $('a[href="topic.php?topic=0"]').addClass('active');
                } else {
                    $('.list-group-item').removeClass('active');
                    $('a[href="?topic=' + currentTopicId + '"]').addClass('active');
                }

                $('.list-group-item').click(function (e) {
                    e.preventDefault();
                    $('.list-group-item').removeClass('active');
                    $(this).addClass('active');
                    window.location.href = $(this).attr('href');
                });

                function getUrlParameter(name) {
                    name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
                    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
                    var results = regex.exec(location.search);
                    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
                }
            });

        </script>
    </body>

    </html>

<?php } ?>