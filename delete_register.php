<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$email=$_GET['email'];   

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
$sql = "DELETE FROM member_profile WHERE email = '$email';";
    //執行sql
    $result = mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>";
    echo "window.location.href='register.php'";
    echo "</script>";
?>
