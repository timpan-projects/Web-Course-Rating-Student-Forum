<?php
	session_start();
	include("mysql_connect.inc.php");
    $comment_number = $_POST['comment_number'];
    $user = $_SESSION['username'];
	$count = $_POST['count'];
    $db_server = "localhost"; //資料庫位置
    $db_user = "root"; //資料庫管理者帳號
    $db_passwd = ""; //資料庫管理者密碼
    $db_name = "voicetube"; //資料庫名稱

    //刪除資料庫中指定字幕
	if($count==0){
		$sql = "INSERT INTO press_like_record (username, comment_number) VALUES ('$user', '$comment_number')";
    }
	else{
		$sql = "DELETE FROM press_like_record where username='$user' and comment_number='$comment_number'";
	}
	if (mysqli_query($conn, $sql)){
		echo"成功";
    }
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>