<?php
include('includes/config.php');
session_start();
error_reporting(0);

if (strlen($_SESSION['uid']== 0)) {
	header('location: ../signin.php');
} 
else {
	if (isset($_GET['wordid'])) {
		$id_word = $_GET['wordid'];
		$ret = mysqli_query($con, "SELECT * FROM words WHERE id_word='$id_word' limit 1");
		$row = mysqli_fetch_array($ret);
		
		// error_reporting(E_ALL);
    	// ini_set('display_errors',1);
		$temp['id_user'] = $_SESSION['uid'];
		$temp['id_word'] = $id_word;
		$data[] = $temp;

		$inp = file_get_contents('wordhistory.json');
		$tempArray = json_decode($inp);
		array_push($tempArray, $data);
		$jsonData = json_encode($tempArray);
		file_put_contents('wordhistory.json', $jsonData);
	}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>JishoTech || Home Page</title>
	<!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!--Custom Theme files-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
	<div class="content">
		<?php include_once('includes/search.php'); ?>
		<div class="row">
			<div class="col col-3">
				<div class="card mb-4 detail-custom">
                    <div class="card-body">
                        <div class="card-title"><?php echo htmlentities($row['kanji']);?></div>
                        <div class="card-text">「<?php echo htmlentities($row['hiragana']);?>」</div>
                    </div>
                </div>
                <ul class="word-topic list-unstyled">
                    <li class="text-center">情報セキュリティ</li>
                    <li class="text-center">ネットワーク</li>
                </ul>
			</div>
			<div class="col col-8">
				<div class="detail-content">
					
                    <div class="detail-function d-flex justify-content-end">
                        <button type="button" class="detail-edit">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="detail-bookmark">
                            <i class="bi bi-bookmark"></i>
                        </button>
                    </div>

					<div class="word-mean" style="min-height: 150px">
						<div class="word-vn">
							<?php echo htmlentities($row['meaning']);?><br></br>
							<?php echo htmlentities($row['example']);?>
						</div>
					</div>

					<div class="d-flex mt-4 justify-content-between">
						<div class="detail-img">
							<img src="./images/img1.jpg" alt="" style="height: auto; width: 200px; margin-right: 20px;">
							<img src="./images/img2.png" alt="" style="height: auto; width: 200px;">
							
						</div>
					<div class="img-btn d-flex justify-content-center align-items-center">
						<button type="button">語彙の他の画像</button> 
					</div>
						

					</div>
					
		
                </div>
			</div>
		</div>
		
	</div>


	<?php include_once('includes/footer.php'); ?>


</body>

</html>
<?php } ?>