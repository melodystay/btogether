<?php
    include_once("connect.php");
    session_start();
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT COUNT(*) AS totalnum FROM `artists` WHERE artist = '$username' and password = '$password'";
        $row = mysqli_fetch_assoc(mysqli_query($connect, $query));
        if ($row["totalnum"] == 1) {
            $_SESSION["username"] = $username;
            header("Location: organize.php");
        } else  $notification = "Wrong username or password. Try again!";     
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

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/login.css"/>


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

    <div class="container-fluid" onclick="onclick">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center">
            <h2>Please Login</h2>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="rounded" placeholder="Artist's name" name="username">
                    </div>
                    <div class="col-md-12">
                        <input type="password" class="rounded" placeholder="Password" name="password">
                    </div>
                    <div class="col-md-12 start-50">
                        <button type="submit" class="login btn btn-dark rounded">Login</button> <br>
                    </div>
                </div>
            </form>
            <div class="my-1">
                <a href="signup.php"><button class="sup btn btn-dark rounded mx-2">Signup</button></a>
            </div>
            <h2>&nbsp;</h2>
            <p class="text-danger"><?=$notification?></p>
        </div>
    </div>

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