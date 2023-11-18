<?php
include('includes/config.php');
session_start();
error_reporting(0);

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>JishoTech || Home Page</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
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
	<!--start-smoth-scrolling-->
	<!--webfonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
	<!--import bootstrap 5-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--webfonts-->
</head>

<body>
	<?php include_once('includes/header.php'); ?>
	
	
	<div class="new" style="padding: 50px 100px" >
		<div class="abc" style="min-height: 750px;">
		<form class="search-container" method="post">
			<label for="exampleInputUsername1">Search By Registration Number</label>
			<input type="text" class="search-box" id="searchInput" name="searchInput" placeholder="語量">
			<span class="search-icon" name="search">
				<button type="submit" name="search" class="btn btn-info btn-min-width mr-1 mb-1">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 35 35" fill="none">
						<circle cx="14.5833" cy="14.5833" r="10.2083" stroke="#4B465C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<circle cx="14.5833" cy="14.5833" r="10.2083" stroke="white" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M30.625 30.625L21.875 21.875" stroke="#4B465C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M30.625 30.625L21.875 21.875" stroke="white" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
			</span>
		</form>
		<div class="row row-cols-1 row-cols-md-4 g-4">
			
	  
			<?php
		if(isset($_POST['search']))
		{ 
			$sdata=$_POST['searchInput'];
			?>

					<?php
						$query=mysqli_query($con,"select * from words WHERE kanji LIKE '%$sdata%' OR hiragana LIKE '%$sdata%'OR meaning LIKE '%$sdata%'");
						$num=mysqli_num_rows($query);
						if($num>0){
							$cnt=1;
							while($row=mysqli_fetch_array($query))
							{
								?> 
								<div class="col " >
									<div class="card h-100">
										<div class="card-body">
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
									</div>
								</div>
								<?php 
								$cnt=$cnt+1;
							} 
						} 
						else { 
							?>
									<tr>
										<td colspan="8"> No record found against this search</td>
										
									</tr>
									
									<?php 
						} 
					}
					?>                     
	</div>
	

<div class="div-footer"> 
	<?php include_once('includes/footer.php'); ?>
</div>
</body>

</html>