<?php
session_start();
error_reporting(0);
include('includes/config.php');
// if ($_GET['stid']) {
//     $stid = $_GET['stid'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JISHOTECH</title>

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
                <!-- Search bar -->
                <form action="user/search.php" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="新しい語彙を調べる"
                            aria-label="Search">
                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>
                <!-- End of search bar -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 250px">
                    <div class="ms-4">
                        <a href="signup.php" class="btn custom-btn custom-border-btn smoothscroll">サインアップ</a>
                    </div>
					<div class="ms-4">
                        <a href="signin.php" class="btn custom-btn custom-border-btn smoothscroll">サインイン</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End of Header bar -->

        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">IT用語をマスターしよう！</h1>
                            <!-- Explore this week trending topic -->
                            <h6 class="text-white">最新の流行トピックを探る</h6>

                            <a href="signin.php" class="btn custom-btn smoothscroll mt-3">学習を始めましょう！</a>
                        </div>

                        <!-- Trending topics -->
                        <div class="owl-carousel owl-theme">
                            <?php 
							$ret=mysqli_query($con,"select * from topics limit 6");
							$cnt=1;
							while ($row=mysqli_fetch_array($ret)) {
                            ?>
								<div class="owl-carousel-info-wrap item">
									<img src="images/topics/<?php echo htmlentities($row['id_topic']);?>.png" class="owl-carousel-image img-fluid" alt="">
									<div class="owl-carousel-info">
										<h5 class="mb-2">
											<?php echo htmlentities($row['topic_name']);?>
											<img src="images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
										</h5>
										<span class="badge">流行</span>
									</div>
									<div class="social-share">
										<ul class="social-icon">
											<li class="social-icon-item">
												<a href="#" class="social-icon-link bi-twitter"></a>
											</li>
					
											<li class="social-icon-item">
												<a href="#" class="social-icon-link bi-facebook"></a>
											</li>
										</ul>
									</div>
								</div>
								<?php $cnt = $cnt + 1;
                            }
                            ?>
                        </div>
                        <!-- End of trending creators -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Technoloy fields section -->
        <section class="trending-podcast-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12" style="padding-top: 70px;">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">技術分野</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="signin.php">
                                    <img src="images/topics/6.png" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        Vintage Show
                                    </a>
                                </h5>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="signin.php">
                                    <img src="images/topics/5.png" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        Environment Soil
                                    </a>
                                </h5>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="signin.php">
                                    <img src="images/topics/4.png" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        Daily Talk
                                    </a>
                                </h5>

                                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>100k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>2.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>924k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="social-share d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End of Technoloy fields section -->
    </main>

    <?php include('includes/footer.php'); ?>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
<?php
// }
?>