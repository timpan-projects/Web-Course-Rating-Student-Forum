<?php
    //連接資料庫
    //只要此頁面上有用到連接MySQL就要include它
    include("mysql_connect.inc.php");
    $sql = "SELECT * FROM course_information";
    $result = mysqli_query($conn, $sql);
	session_start();
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