<?php
	session_start();
	include("mysql_connect.inc.php");
	$id = $_SESSION['username'];
	$course_num = $_POST['course_num'];
	$sql_seen = "UPDATE track SET unseen = 0 WHERE class_number='$course_num' AND username = '$id'";
	mysqli_query($conn, $sql_seen);
?>