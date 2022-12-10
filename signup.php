<?php
    include_once("connect.php");
    if(isset($_POST['submit']) && $_FILES['file']['error'] == 0) {
        $artist = $_POST['artist'];
        $password = $_POST['password'];
        $about = addslashes($_POST['about']);
        $img = $_FILES['file']['name'];
		$tmp_place = $_FILES['file']['tmp_name'];
		$file_place = '/img';
		move_uploaded_file($tmp_place, $file_place.'/'.$img);     
        
        $query = "INSERT INTO `artists` (`id`, `artist`, `password`, `img`, `about`, `active`) VALUES (NULL, '$artist', '$password', '$img', '$about', '1');"; 
        $resultFinal = mysqli_query($connect, $query);
		if ($resultFinal == true) {
			header("Location: login.php");
		} else echo "Error";
        print_r($resultFinal);
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
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/signup.css"/>
	<style>
       
    </style>


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
    <form action="" method="POST">
    <div id="mainButton">
        <div class="btn-text" onclick="openForm()">Sign Up</div>
        <div class="modal">
            <div class="close-button" onclick="closeForm()">x</div>
            <div class="form-title">Sign Up</div>
            <div class="input-group">
                <input type="text" id="name" name="artist" onblur="checkInput(this)" />
                <label for="name">Artist's name</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" onblur="checkInput(this)" />
                <label for="password">Password</label>
            </div>
            <div class="input-group">
                <input type="file" id="file" name="file" onblur="checkInput(this)" />
            </div>
            <div class="input-group">
                <textarea name="about" id="about" cols="50" rows="5" placeholder="About the artist" onblur="checkInput(this)"></textarea>
            </div>
            <div class="input-group">
                <p class="text-danger">Warning! After signing up to change the details you will have to contact the admin, so please make sure to recheck all the detiails before signing up)</p>            
            </div>
            <div class="form-button border-0" onclick="closeForm()"><button name="submit" class="btn btn-dark w-100">Sign up</button></div>
        </div>
    </div>
</form>
   <script>
        var button = document.getElementById('mainButton');
        var openForm = function() {
	        button.className = 'active';
        };
        var checkInput = function(input) {
            if (input.value.length > 0) {
                input.className = 'active';
            } else {
                input.className = '';
            }
        };
        var closeForm = function() {
            button.className = '';
        };
        document.addEventListener("keyup", function(e) {
            if (e.keyCode == 27 || e.keyCode == 13) {
                closeForm();
            }
        });
   </script>
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