<?php 
	require_once('PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php');
	include("mysql_connect.inc.php");
    $C_email=$_POST['email'];
	$sql = "SELECT * FROM member_profile WHERE email='$C_email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$mail= new PHPMailer();                          //建立新物件
		$mail->IsSMTP();                                    //設定使用SMTP方式寄信
		$mail->SMTPAuth = true;                        //設定SMTP需要驗證
		$mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
		$mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
		$mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
		$mail->CharSet = "utf-8";                       //郵件編碼
		$mail->Username = "nukccweb@gmail.com"; //Gamil帳號
		$mail->Password = "2016ccweb";                 //Gmail密碼
		$mail->From = "nukccweb@gmail.com";        //寄件者信箱
		$mail->FromName = "NTHU 線上課程評鑑系統"; //寄件者姓名
		$mail->Subject ="忘記密碼提醒"; //郵件標題
		$mail->Body = "您於NTHU線上課程評鑑系統的帳號/密碼為".$row["username"]."/".$row["password"]; //郵件內容
		$mail->IsHTML(true);                             //郵件內容為html
		$mail->AddAddress($C_email);            //收件者郵件及名稱
		if(!$mail->Send()){
			echo "Error: " . $mail->ErrorInfo;
			echo "Message was not sent<br/ >";
		}else{
			echo "<script>
                alert('密碼已寄出請於您的信箱查詢!');
            </script>";
			echo "<script type='text/javascript'>";
			echo "window.location.href='home.php'";
			echo "</script>";
		}
	}
	else
	{
		echo "<script>
            alert('此信箱未註冊本系統!');
        </script>";
		echo "<script type='text/javascript'>";
		echo "window.location.href='home.php'";
		echo "</script>";
	}

?>