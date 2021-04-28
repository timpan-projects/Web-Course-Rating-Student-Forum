<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$name = $_POST['name'];
$email = $_POST['email'];


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
		?>
		<script>
		var strEmail = "<?php echo $email?>";
		console.log(strEmail);
		//Regular expression Testing
		emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
		 
		//validate ok or not
		if(strEmail.search(emailRule)!= -1){
		<?php
			$sql2 = "SELECT count(*) FROM member_profile WHERE email='{$email}' OR username='{$id}'"; 
			$countresult = mysqli_query($conn, $sql2);
			$count = mysqli_fetch_array($countresult);
			$sql = "insert into member_profile (username, password, name, email, credibility) values ('$id', '$pw', '$name', '$email', 0)";
			if($count[0]==0){
				if(mysqli_query($conn, $sql))
				{ ?>
						alert("註冊成功!");
						location.href = "home.php";
				<?php }
			}
			else
			{ ?>
					alert("註冊失敗，已有此帳號/email");
					location.href = "register.php";
        <?php } ?>
		}else{
			alert("email格式不符!");
			location.href = "delete_register.php?email="+strEmail;
		}
		</script>
<?php
}
else
{ ?>
<script language="javascript">
	alert("有尚未填寫的資料或兩次密碼不相符!");
	location.href = "register.php";
</script>
<?php } ?>