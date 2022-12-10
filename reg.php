<?php
	include_once("connect.php");
	$id = $_GET['id'];
	$query1 = "SELECT * FROM `events` WHERE `id` = $id";
    $result1 = mysqli_query($connect, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$query2 = "SELECT * FROM `events`, `artists` ORDER BY `date` DESC Limit 1,2;";
    $result2 = mysqli_query($connect, $query2);
	$row2 = mysqli_fetch_assoc($result2);

	if(isset($_POST['submit'])) {
		$phonenumber = $_POST['phonenumber'];
		$email = $_POST['email'];
		$ticketnum = $_POST['ticketnum'];
		$queryticket = "INSERT INTO `tickets` (`id`, `email`, `phoneNumber`, `numberOfTickets`, `concertId`) VALUES (NULL, '$email', '$phonenumber', '$ticketnum', '$id');";
		$soldquery = mysqli_query($connect, $queryticket);
		
		if ($soldquery == true) {
			$msg = "🎉You have successfully registered for the event!🎉";
		} else {
			echo "Something went wrong";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>VHype Virtual Concerts</title>
	<meta charset="UTF-8">
	<meta name="description" content="Tulen Photography HTML Template">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/accordion.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/regside.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/reg.css"/>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Offcanvas Menu Section -->
	<?php
        include_once("block/offcanvasmenu.php");
    ?>
	<!-- Offcanvas Menu Section end -->
    
	<?php
		$date = date('Y-m-d');
		if($date > $row1['date']) {
	?>
		<div class="container col-8">
			<h1>This a past event(</h1>
			<p>You can find the past events on our official social media sites.</p>
		</div>
	<?php
		} elseif ($date == $row1['date']) {

	?>
		<div class="container col-8">
			<h1>Yay! It is the D-DAY!</h1>
			<p><a href="<?=$row1['link']?>">Click here</a> to watch the event.</p>
		</div>
	<?php
		} else {
	?>
	
	<div class="main">  	
			
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			
			<form>
				<label for="chk" aria-hidden="true">Information about the event</label>
				<div class="container m-3">
					<b class="text-light"><?=$msg?></b>
					<p class="text-light">
						<b>Description:</b><br>
						<span><?=$row1['description']?></span>
					</p>
					<p class="text-light">
						<b>Price:</b><span> <?=$row1['price']?>$</span>
					</p>
					<p class="text-light">
						<b>Date:</b><span> <?=$row1['date']?></span>
					</p>
				</div>
			</form>
		</div>
		<div class="login">
			<form method="POST">
				<label for="chk" aria-hidden="true">Get a ticket!</label>
					<input type="email" name="email" placeholder="Email">
					<input type="text" name="phonenumber" placeholder="Phone number" required="">
					<input type="number" name="ticketnum" placeholder="Number of tickets" required="" min="0" max="<?=$row1['places']?>">
				<button type="submit" name="submit">Done</button>
			</form>
		</div>
		
	</div>
	<?php
		}
	?>
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/pana-accordion.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>