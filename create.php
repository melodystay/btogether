<?php
	include_once("connect.php");
	session_start();
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location: login.php");
	}
   	if (isset($_POST['submit']) && $_FILES['poster']['error'] == 0 ) {
        $title = addslashes($_POST['title']);        
        $artist = $_POST['artist'];
		$category_id = $_POST['category'];
		
		$fileName = rand(1, 40).$_FILES['poster']['name'];
		$tmp_place = $_FILES['poster']['tmp_name'];
		$file_place = $_SERVER['DOCUMENT_ROOT'].'/img/'.$fileName;
		move_uploaded_file($tmp_place, $file_place);        
        
		$date = addslashes($_POST['date']);
        $price = addslashes($_POST['price']);
        $places = addslashes($_POST['places']);
        $link = addslashes($_POST['link']);
        $description = addslashes($_POST['description']);
		//$artist = $_SESSION['username'];
		
		$query = "INSERT INTO `events` (`id`, `title`, `singer`, `category_id`, `poster`, `date`, `price`, `places`, `description`, `link`) VALUES (NULL, '$title', '$artist', '$category_id', '$fileName', '$date', '$price', '$places', '$description', '$link');";
		//print_r($query);
		$resultFinal = mysqli_query($connect, $query);
		if ($resultFinal == true) {
			header("Location: organize.php");
		} else echo "Error";

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
	<link rel="stylesheet" href="css/table.css"/>


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
    <section class="blog-details">
		<div class="container">
			<div class="single-blog-page">
				<div class="comment-form">
					<h3>Organize a new event</h3>
					<form action="" method="POST">
						<div class="row">
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Title of the event:</label>
								<input type="text" placeholder="Title" name="title">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Artist:</label>
                                <select class="custom-select my-1" id="inputGroupSelect01" name="artist">
                                <?php
                                    $queryartist = "SELECT * FROM `artists` WHERE `artist` != 'admin';";
                                    $resultartist = mysqli_query($connect, $queryartist);
                                    while($rowartist = mysqli_fetch_assoc($resultartist)) {
                                ?>
                                    <option value="<?=$rowartist['id']?>"><?=$rowartist['artist']?></option>
                                <?php
                                    }
                                ?>
                                </select>
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Category:</label>
                                <select class="custom-select my-1" id="inputGroupSelect01" name="category">
                                <?php
                                    $querycat = "SELECT * FROM `category`";
                                    $resultcat = mysqli_query($connect, $querycat);
                                    while($rowcat = mysqli_fetch_assoc($resultcat)) {
                                ?>
                                    <option value="<?=$rowcat['id']?>"><?=$rowcat['name']?></option>
                                <?php
                                    }
                                ?>
                                </select>
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Poster:</label>
								<input type="file" class="p-2" placeholder="Poster" name="poster">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Date:</label>
								<input type="date" placeholder="Date" name="date">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Price of the ticket($):</label>
								<input type="number" placeholder="Price" min="0" max="1000" name="price">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Number of places:</label>
								<input type="number" placeholder="Places" min="0" max="10000" name="places">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Link:</label>
								<input type="text" placeholder="Link" name="link">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Description of the event:</label>
								<textarea placeholder="Description" name="description"></textarea>
								<button type="submit" name="submit">Publish</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

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