<?php
    //連接資料庫
    //只要此頁面上有用到連接MySQL就要include它
    include("mysql_connect.inc.php");
	header("Content-Type:text/html; charset=utf-8");
    session_start();
	$teacher = $_POST['teacher'];

    $sql = "SELECT * FROM course_information WHERE teacher LIKE '%".$teacher."%' OR subject LIKE '%".$teacher."%' OR class_number LIKE '%".$teacher."%'";
    $result = mysqli_query($conn, $sql);

    $course_list = "";
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $course_list .= $row["semester"]."/".$row["subject"]."/".$row["teacher"]."%";
        }
    } else {
        echo "0 result";
    }

    echo $course_list;
    mysqli_close($conn);
?>