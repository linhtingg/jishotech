<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (strlen($_SESSION['uid']== 0)) {
	header('location: ../signin.php');
} 
else {
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>JishoTech || Search Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!--Custom Theme files-->

	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	</script>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<!--start-smoth-scrolling-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
			});
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>	
	
	<!--start-smoth-scrolling-->
	<!--webfonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
	<!--webfonts-->
</head>

<body>
	<?php include_once('includes/header.php'); ?>
	
	<!-- Content -->
	<div class="content">
		<!-- Frame -->
			<!-- Input search form -->
			<form class="search-container" method="get">
				<input type="text" class="search-box" id="searchInput" name="searchInput" placeholder="語量">
				<span class="search-icon">
					<!-- BUTTON SEARCH -->
					<button type="submit" name="search" class="search-btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 35 35" fill="none">
							<circle cx="14.5833" cy="14.5833" r="10.2083" stroke="#4B465C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<circle cx="14.5833" cy="14.5833" r="10.2083" stroke="white" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M30.625 30.625L21.875 21.875" stroke="#4B465C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M30.625 30.625L21.875 21.875" stroke="white" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<!-- END BUTTON SEARCH -->
				</span>
			</form>
			<!-- END Input search form -->

			<!-- result after query from input form -->
			<!-- <div class="row row-cols-1 row-cols-md-4 g-4"> -->
			<?php
				$results_per_page = 12; // Number of results per page

					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					} else {
						$page = 1;
					}

				$start_from = ($page - 1) * $results_per_page;

				if (isset($_GET['search'])) {
					// Tìm kiếm được kích hoạt, thực hiện truy vấn tìm kiếm
					if (isset($_GET['searchInput'])) {
						$sdata = $_GET['searchInput'];

						// // Count total number of rows
						// $count_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM words WHERE kanji LIKE '%$sdata%' OR hiragana LIKE '%$sdata%' OR meaning LIKE '%$sdata%'");
						// $count_data = mysqli_fetch_assoc($count_query);
						// $total_pages = ceil($count_data['total'] / $results_per_page);
						// Count total number of rows
						$count_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM words WHERE kanji LIKE '%$sdata%' OR hiragana LIKE '%$sdata%' OR meaning LIKE '%$sdata%' ORDER BY hiragana ASC");

						$count_data = mysqli_fetch_assoc($count_query);
						$number_of_result = $count_data['total'];
						$total_pages = ceil($number_of_result / $results_per_page);
						
						// Fetch data with pagination
						$query = mysqli_query($con, "SELECT * FROM words WHERE kanji LIKE '%$sdata%' OR hiragana LIKE '%$sdata%' OR meaning LIKE '%$sdata%' ORDER BY hiragana ASC LIMIT $start_from, $results_per_page");
					} else {
						// Trường hợp không có từ khóa tìm kiếm cụ thể, không thay đổi total_pages và query
						$query = null;
						$total_pages = 1;
					}
				} else {
					// Truy vấn khi truy cập trang lần đầu tiên hoặc không thực hiện tìm kiếm
					$query = mysqli_query($con, "SELECT * FROM words LIMIT $start_from, $results_per_page");
					$count_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM words");
					$count_data = mysqli_fetch_assoc($count_query);
					$number_of_result = $count_data['total'];
					$total_pages = ceil($number_of_result / $results_per_page);
				}
				?>
				<!-- Hiển thị số kết quả tìm thaasy -->
				<div class="mb-4 ps-3 text-body-secondary"> <?php echo $number_of_result ?> 件の結果  </div>
				<!-- Hiển thị kết quả -->
				<div class="row row-cols-1 row-cols-md-4 g-4">
					<?php
					if ($query !== null) { // Kiểm tra xem có truy vấn không
						$num = mysqli_num_rows($query);

						if ($num > 0) {
							$cnt = 1;
							while ($row = mysqli_fetch_array($query)) {
								// Hiển thị kết quả tìm kiếm
								?>
								<div class="col">
									<a class="card h-100 card-custom" href="detail.php?wordid=<?php echo htmlentities($row['id_word']); ?>" style="text-decoration: none;">
										<div class="card-body">
											<!-- ... (các nội dung thẻ card) ... -->
											<h5 class="card-title"><?php echo htmlentities($row['kanji']);?>  </h5>
											<p class="card-text"><?php echo htmlentities($row['hiragana']);?> </p>
											<p class="card-text"><?php echo htmlentities($row['katakana']);?> </p>
											<br>
											<h6 class="card-subtitle mb-2 text-muted"><?php echo htmlentities($row['meaning']);?> </h6>
											<p class="card-text"><?php echo htmlentities($row['romaji']);?>   </p>
											<p class="card-text"><?php echo htmlentities($row['example']);?>  </p>
											<p class="card-text"><?php echo htmlentities($row['status']);?>   </p>
											<p class="card-text"><?php echo htmlentities($row['link']);?>     </p>
										</div> 
									</a>
								</div>
								<?php
								$cnt = $cnt + 1;
							}
							echo '</div>';
							echo '</div>';

							// Hiển thị phân trang
							?>
							<div class="mt-5 d-flex justify-content-center">
								<nav aria-label="Page navigation example" class="custom-centered-nav">
									<ul class="pagination pagination-custom">
										<?php if ($page > 1): ?>
										<li class="prev"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page-1 ?>">Prev</a></li>
										<?php endif; ?>
										
										<?php if ($page > 3): ?>
										<li class="start"><a href="?searchInput=<?php echo $sdata ?>&search=&page=1">1</a></li>
										<li class="page"><a>...</a></li>
										<?php endif; ?>
										
										<?php if ($page-2 > 0): ?><li class="page"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
										<?php if ($page-1 > 0): ?><li class="page"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>
										
										<li class="currentpage"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page ?>"><b><?php echo $page ?></b></a></li>
										
										<?php if ($page+1 < $total_pages+1): ?><li class="page"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
										<?php if ($page+2 < $total_pages+1): ?><li class="page"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>
										
										<?php if ($page < $total_pages-2): ?>
											<li class="page"><a>...</a></li>
											<li class="end"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $total_pages ?>"><?php echo $total_pages ?></a></li>
										<?php endif; ?>
										
										<?php if ($page < $total_pages): ?>
										<li class="next"><a href="?searchInput=<?php echo $sdata ?>&search=&page=<?php echo $page+1 ?>">Next</a></li>
										<?php endif; ?>
									</ul>
								</nav>
							</div>
							<?php
						} else {
							echo '<div class="container text-center no-result"> 検索結果なし</div>';
						}
					}
					?>
				</div>

							
			</div>
			<!-- ENDresult after query from input form -->

			<!-- END pagtination  -->
	</div>
	<!-- END Content -->

	<!-- Footer -->
	<div class="div-footer" > 
		<?php include_once('includes/footer.php'); ?>
	</div>
</body>

</html>
<?php } ?>