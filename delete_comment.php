<?php
    //連接資料庫
    //只要此頁面上有用到連接MySQL就要include它
    include("mysql_connect.inc.php");
    $comment_number = $_GET["comment_number"];
	/* 刪除指定課程心得分數 */
	$sql = "SELECT * FROM course_comments WHERE comment_number = '$comment_number';";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$class_number = $row["class_number"];
	$difficulty = $row["difficulty"];
	$sweet = $row["sweet"];
	$cool = $row["cool"];
	$sql = "SELECT * FROM course_information WHERE class_number = '$class_number';";
	$result_avg = mysqli_query($conn, $sql);
	$row_avg = mysqli_fetch_assoc($result_avg);
	$count = $row_avg["count"];
	$avg_difficulty = $row_avg["avg_difficulty"];
	$avg_sweet = $row_avg["avg_sweet"];
	$avg_cool = $row_avg["avg_cool"];
	$avg = $row_avg["avg"];
	if($count>1){
	$avg_sweet=(($avg_sweet*$count)-$sweet)/($count-1);
	$avg_difficulty=($avg_difficulty*$count-$difficulty)/($count+-1);
	$avg_cool=($avg_cool*$count-$cool)/($count-1);
	$avg=(($avg*$count)-($sweet+$cool-$difficulty)/2)/($count-1);
	$count=$count-1;}
	else
	{
	$avg_sweet=0;
	$avg_difficulty=0;
	$avg_cool=0;
	$avg=0;
	$count=0;
	}
	$sql = "UPDATE course_information SET count='$count',avg_sweet='$avg_sweet',avg_difficulty='$avg_difficulty',avg_cool='$avg_cool',avg='$avg' WHERE class_number='$class_number'";
    $result = mysqli_query($conn, $sql);
	/* 刪除指定課程心得 */
    $sql = "DELETE FROM course_comments WHERE comment_number = '$comment_number';";
    //執行sql
    $result = mysqli_query($conn, $sql);

    /* 刪除指定按讚心得 */
    $sql = "DELETE FROM press_like_record WHERE comment_number = '$comment_number';";
    //執行sql
    $result = mysqli_query($conn, $sql);
    echo "<script>
                alert('已刪除心得！！');
            </script>";
    echo "<script type='text/javascript'>";
    echo "window.location.href='my_comment.php'";
    echo "</script>";
?>