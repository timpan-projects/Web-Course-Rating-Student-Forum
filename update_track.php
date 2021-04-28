<?php
	session_start();
	include("mysql_connect.inc.php");
    $user = $_SESSION['username'];
	$course_num = $_POST['course_num'];

	$sql_check = "SELECT * FROM track WHERE username = '$user' and class_number = '$course_num'";
	$result = mysqli_query($conn, $sql_check);
	if (mysqli_num_rows($result) > 0)
		$sql = "DELETE FROM `track` WHERE username = '$user' and class_number = '$course_num'";
	else
		$sql = "INSERT INTO `track` (`username`, `class_number`, `unseen`) VALUES ('$user', '$course_num', '0')";

	if (mysqli_query($conn, $sql))
		echo"成功追蹤";
	else
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	
?>