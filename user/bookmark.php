<?php
$conn = new mysqli("localhost", "root", "", "jishotech");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if (strlen($_SESSION['uid']== 0)) {
	header('location: ../signin.php');
} 
else {
    $topicQuery = $conn->query("SELECT * FROM Topics");
    $topics = $topicQuery->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>JishoTech || BookMark Page</title>

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
                <li  class="nav-item active">
                <a href="bookmark.php" class="nav-link text-center">ブックマーク</a>
                </li>
                <li class="nav-item">
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
        <!-- Search bar -->
        <form class="search-container">
            <input type="text" class="search-box" id="searchInput" name="q" placeholder="語量">
            <span class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 35 35" fill="none">
                    <circle cx="14.5833" cy="14.5833" r="10.2083" stroke="#4B465C" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <circle cx="14.5833" cy="14.5833" r="10.2083" stroke="white" stroke-opacity="0.2" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.625 30.625L21.875 21.875" stroke="#4B465C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M30.625 30.625L21.875 21.875" stroke="white" stroke-opacity="0.2" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </form>

        <!--  -->
        <div class="row">
            <div class="col col-3">
                <!-- Sidebar -->
                <div class="topiclist">
                    <div class="title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 32 29" fill="none">
                            <path
                                d="M1.74411 16.0556H12.2088C13.168 16.0556 13.9529 15.3556 13.9529 14.5V2.05556C13.9529 1.2 13.168 0.5 12.2088 0.5H1.74411C0.784848 0.5 0 1.2 0 2.05556V14.5C0 15.3556 0.784848 16.0556 1.74411 16.0556ZM1.74411 28.5H12.2088C13.168 28.5 13.9529 27.8 13.9529 26.9444V20.7222C13.9529 19.8667 13.168 19.1667 12.2088 19.1667H1.74411C0.784848 19.1667 0 19.8667 0 20.7222V26.9444C0 27.8 0.784848 28.5 1.74411 28.5ZM19.1852 28.5H29.6498C30.6091 28.5 31.3939 27.8 31.3939 26.9444V14.5C31.3939 13.6444 30.6091 12.9444 29.6498 12.9444H19.1852C18.2259 12.9444 17.4411 13.6444 17.4411 14.5V26.9444C17.4411 27.8 18.2259 28.5 19.1852 28.5ZM17.4411 2.05556V8.27778C17.4411 9.13333 18.2259 9.83333 19.1852 9.83333H29.6498C30.6091 9.83333 31.3939 9.13333 31.3939 8.27778V2.05556C31.3939 1.2 30.6091 0.5 29.6498 0.5H19.1852C18.2259 0.5 17.4411 1.2 17.4411 2.05556Z"
                                fill="white" />
                        </svg>
                        <span class="title-text">トピックリスト</span>
                    </div>
                    <div class="list-group list-group-custom">
                        <a href="topic.php?topic=0" class="list-group-item">全ての単語</a>
                        <?php
                        foreach ($topics as $topic) {
                            echo "<a class=\"list-group-item\" href=\"?topic={$topic['id_topic']}\">{$topic['topic_name']}</a>";
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="col col-9">
                
                <div id="">
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php
                        $currentTopic = isset($_GET['topic']) ? (int) $_GET['topic'] : 0;
                        $searchTerm = isset($_GET['q']) ? $_GET['q'] : null;
                        $query = "SELECT * FROM words WHERE id_user = {$_SESSION['uid']}";
                        if ($currentTopic != 0) {
                            $query .= " AND WHERE id_word IN (SELECT id_word FROM wordtopic WHERE id_topic = {$currentTopic})";
                        }

                        if ($searchTerm !== null) {
                            if ($currentTopic != 0) {
                                $query .= " AND (kanji LIKE '%$searchTerm%' OR hiragana LIKE '%$searchTerm%' OR meaning LIKE '%$searchTerm%')";
                            } else {
                                $query .= " WHERE (kanji LIKE '%$searchTerm%' OR hiragana LIKE '%$searchTerm%' OR meaning LIKE '%$searchTerm%')";
                            }
                        }

                        $wordQuery = $conn->query($query);
                        $words = $wordQuery->fetch_all(MYSQLI_ASSOC);

                        $perPage = 9;
                        $totalPages = ceil(count($words) / $perPage);
                        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                        $start = ($currentPage - 1) * $perPage;
                        $pagedWords = array_slice($words, $start, $perPage);

                        foreach ($pagedWords as $word) {
                            ?>
                            <div class="col mb-4 word-card">
                                <div class="card h-100 word-card-custom">
                                <a style = "text-decoration:none"  href="detail.php?wordid=<?php echo htmlentities($word['id_word']); ?>" >
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $word['kanji'] ?>
                                        </h5>
                                        <p class="card-text">
                                            <?= $word['hiragana'] ?>
                                        </p>
                                        <p class="card-text">
                                            <?= $word['katakana'] ?>
                                        </p>
                                        <p class="card-subtitle mt-2"  style="font: 15px Roboto;">
                                            <?= $word['meaning'] ?>
                                        </p>
                                    </div>
                        </a>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>

                    <div class="mt-3 d-flex justify-content-center">
                        <nav aria-label="Page navigation example" class="custom-centered-nav">
                            <ul class="pagination pagination-custom">
                                <?php
                                $numLinks = 4;
                                $startPage = max(1, $currentPage - floor($numLinks / 2));
                                $endPage = min($totalPages, $startPage + $numLinks - 1);

                                if ($currentPage > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="?topic=' . $currentTopic . '&page=' . ($currentPage - 1) . '&q=' . ($searchTerm) . '">Prev</a></li>';
                                }

                                for ($i = $startPage; $i <= $endPage; $i++) {
                                    echo '<li class="page-item ' . (($i == $currentPage) ? 'active' : '') . '"><a class="page-link" href="?topic=' . $currentTopic . '&page=' . $i . '&q=' . ($searchTerm) . '">' . $i . '</a></li>';
                                }

                                if ($currentPage < $totalPages) {
                                    echo '<li class="page-item"><a class="page-link" href="?topic=' . $currentTopic . '&page=' . ($currentPage + 1) . '&q=' . ($searchTerm) . '">Next</a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="topic-btn-gr">
                    <button type="button" class="btn btn-dark">インポート</button>
                    <button type="button" class="btn btn-dark">エクスポート</button>
                    <button type="button" class="btn btn-danger" style="text-decoration: none; background-color: transparent; color: red;">
                        <a href="topic_quiz.php" style="color: red; text-decoration: none;">削除</a>
                    </button>
                </div>


                </div>


            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once('includes/footer.php'); ?>

    <script>

$(document).ready(function() {

    var currentTopicId = getUrlParameter('topic');
    if (currentTopicId === '' || currentTopicId === '0') {

        $('a[href="topic.php?topic=0"]').addClass('active');
    } else {
        $('.list-group-item').removeClass('active');
        $('a[href="?topic=' + currentTopicId + '"]').addClass('active');
    }

    $('.list-group-item').click(function(e) {
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