<?php
include('includes/config.php');
session_start();
error_reporting(0);

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
				<?php include_once('includes/topiclist.php'); ?>
			</div>

			<div class="col col-9">
				Content
			</div>
		</div>
		
	</div>


	<?php include_once('includes/footer.php'); ?>


</body>

</html>