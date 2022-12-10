<?php
    session_start();
    include_once("connect.php");
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location: login.php");
	}
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $querydelete = "DELETE FROM `events` WHERE `id` = $id";
        $result = mysqli_query($connect, $querydelete);
        header("Location: organize.php");
    } else "Error";

?>