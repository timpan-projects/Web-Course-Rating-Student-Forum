<?php
    //連接資料庫
    //只要此頁面上有用到連接MySQL就要include它
    include("mysql_connect.inc.php");
    $teacher = $_POST["teacher"];
    $course = $_POST["course"];
    $title = $_POST["title"];
    $rating_method = $_POST["rating_method"];
    $comment = $_POST["comment"];
    $sweet_score = $_POST["sweet_score"];
    $cool_score = $_POST["cool_score"];
    $difficulty_score = $_POST["difficulty_score"];
	session_start();
    // echo $semester."<br>";
    // echo ($teacher==NULL)."<br>";
    // echo $course."<br>";
    // echo ($title==NULL)."<br>";
    // echo ($rating_method==NULL)."<br>";
    // echo ($comment==NULL)."<br>";
    // echo $sweet_score."<br>";
    // echo $cool_score."<br>";
    // echo $difficulty_score."<br>";

    //檢查欄位是否為空值,除了星星(不選就是0分)、學期和老師(如果沒按搜尋，直接選選課程)
    if($course!="0" && $title!=null && $rating_method!=null && $comment!=null){
        $course = explode("/",$course);
        //找指定課程的課程號碼
		$id = $_SESSION['username'];
        $sql = "SELECT * FROM course_information WHERE semester='{$course[0]}' and subject='{$course[1]}' and teacher='{$course[2]}'";

        //執行sql
        $result = mysqli_query($conn, $sql);
		$class_number="";
		$count = 0.0;
		$avg_difficulty = 0.0;
		$avg_sweet = 0.0;
		$avg_cool = 0.0;
		$avg = 0.0;
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $class_number = $row["class_number"];
				$count = $row["count"];
				$avg_difficulty = $row["avg_difficulty"];
				$avg_sweet = $row["avg_sweet"];
				$avg_cool = $row["avg_cool"];
				$avg = $row["avg"];
				$avg_sweet=(($avg_sweet*$count)+$sweet_score)/($count+1);
				$avg_difficulty=($avg_difficulty*$count+$difficulty_score)/($count+1);
				$avg_cool=($avg_cool*$count+$cool_score)/($count+1);
				$avg=(($avg*$count)+($sweet_score+$cool_score-$difficulty_score)/2)/($count+1);
				$count=$count+1;
            }

            //找到課程號碼後，將資料insert進course_comments資料表
			$sql2 = "SELECT count(*) FROM course_comments WHERE username='{$id}' AND class_number='{$class_number}'"; 
			$countresult = mysqli_query($conn, $sql2);
			$count1 = mysqli_fetch_array($countresult);
			if($count1[0]==0){
				$sql = "INSERT INTO course_comments (class_number, title, rating_method, comment, sweet, cool, difficulty, username)
					VALUES ('$class_number', '$title', '$rating_method','$comment', '$sweet_score', '$cool_score', '$difficulty_score', '$id')";

				if (mysqli_query($conn, $sql)) {
					echo "<script>
						alert('新增心得成功！！');
					</script>";
					$sql = "UPDATE course_information SET count='$count',avg_sweet='$avg_sweet',avg_difficulty='$avg_difficulty',avg_cool='$avg_cool',avg='$avg' WHERE class_number='$class_number'";
					$sql_update_unseen_for_track = "UPDATE track SET unseen = unseen+1 WHERE class_number='$class_number' AND username != '$id'";
					if (mysqli_query($conn, $sql)){
						echo"成功";
					}
					else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					if (mysqli_query($conn, $sql_update_unseen_for_track)){
						echo"成功";
					}
					else{
						echo "Error: " . $sql_update_unseen_for_track . "<br>" . mysqli_error($conn);
					}
					echo "<script type='text/javascript'>";
					echo "window.location.href='my_comment.php'";
					echo "</script>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			else{
				echo "<script>
                alert('您已發表過此課程的心得了喔！！');
				</script>";
				echo "<script type='text/javascript'>";
				echo "window.location.href='insert_comment.php'";
				echo "</script>";
			}
        } else {
            echo "0 result";
        }
    }else{
        echo "<script>
                alert('所有欄位都要填喔！！');
            </script>";
        echo "<script type='text/javascript'>";
        echo "window.location.href='insert_comment.php'";
        echo "</script>";
    }
?>