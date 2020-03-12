<?php
	$host = 'localhost';
	$user = 'root';
	$pwsd = "";
	$db = 'muravlenko'; 
	$conn = mysqli_connect($host, $user, $pwsd, $db);
	mysqli_query($conn, "SET NAMES utf8")
?>