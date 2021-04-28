<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>課程評鑑系統</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
		<!-- rateyo星星套件 -->
        <link rel="stylesheet" href="rateyo/jquery.rateyo.min.css"/>
		<?php session_start();  ?>
		<script>
			/* @author:Romey
			 * 动态点赞
			 * 此效果包含css3，部分浏览器不兼容（如：IE10以下的版本）
			*/
			$(function(){
				$(".praise").click(function(){
					var praise_img = $(this).children().eq(0).children();
					var text_box = $(this).children().eq(2);
					var praise_txt = $(this).children().eq(1);
					var comment_number = $(this).children().eq(3);
					var num=parseInt(praise_txt.text());
					var comment_num=parseInt(comment_number.text());
					var c=1;
					console.log(comment_num);
					if(praise_img.attr("src") == ("Images/yizan.png")){
						$(this).children().eq(0).html("<img src='Images/zan.png' id='praise-img' class='animation' />");
						praise_txt.removeClass("hover");
						text_box.show().html("<em class='add-animation'>-1</em>");
						$(".add-animation").removeClass("hover");
						num -=1;
						praise_txt.text(num)
						c=1;
					}else{
						$(this).children().eq(0).html("<img src='Images/yizan.png' id='praise-img' class='animation' />");
						praise_txt.addClass("hover");
						text_box.show().html("<em class='add-animation'>+1</em>");
						$(".add-animation").addClass("hover");
						num +=1;
						praise_txt.text(num)
						c=0;
					}
					$.ajax({
                        type: "POST",
                        url: "update_like.php",
                        data: {
                            comment_number: comment_num,
							count:c
                        },
                        success: function(result){
                            
                        }
                    });
				});

				$(".score").each(function(){
					//甜度
					$(this).children().eq(0).children().eq(2).rateYo({
						rating    : $(this).children().eq(0).children().eq(1).text(),
						spacing   : "5px",
						multiColor: {
							"startColor": "#5599FF", //blue
							"endColor"  : "#FFFF00"  //yellow
						},
						precision: 1,
						starWidth: "50px",
						readOnly: true
					});
					//甜度
					$(this).children().eq(1).children().eq(2).rateYo({
						rating    : $(this).children().eq(1).children().eq(1).text(),
						spacing   : "5px",
						multiColor: {
							"startColor": "#5599FF", 
							"endColor"  : "#FFFF00"  
						},
						precision: 1,
						starWidth: "50px",
						readOnly: true
					});
					//甜度
					$(this).children().eq(2).children().eq(2).rateYo({
						rating    : $(this).children().eq(2).children().eq(1).text(),
						spacing   : "5px",
						multiColor: {
							"startColor": "#5599FF", 
							"endColor"  : "#FFFF00"  
						},
						precision: 1,
						starWidth: "50px",
						readOnly: true
					});
				})
			})
		</script>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="home.php">NTHU 線上課程評鑑系統</a>
								<div class="notice">
				<?php
					if(isset($_SESSION['username'])){ ?>
					<div class="notice-btn">
						<div class="notice-num"><?php
								include("mysql_connect.inc.php");
								$unseen = 0;
								$id = $_SESSION['username'];
								$sql = "SELECT sum(unseen) FROM track WHERE username = '$id' && unseen != 0";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_row($result);
								echo $row[0];
							?></div>
						<img class="bell-icon" src="images/bell.png"/>
					</div>
					<div class="notice-list">
					<?php 
						include("mysql_connect.inc.php");
						$id = $_SESSION['username'];
						$sql = "SELECT class_number, unseen FROM track WHERE username = '$id' && unseen != 0";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
					?>			<a href="show_course.php?class_id=<?= $row["class_number"] ?>">
								<div class="notice-item"  onclick="onNoticeClicked('<?php echo $row["class_number"]; ?>')">
									<div class="notice-context">您所關注的課程：<?= $row["class_number"] ?>有 <?= $row["unseen"] ?> 筆新的評論，馬上去看看吧！</div>
								</div>
								</a>
					<?php
							}//end of while
						}//end of if
						else {
					?>
							<div class="empty-message">您所追蹤的課程尚無新的評論</div>
					<?php
						}
					}
					?>
				</div>
				</div>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="home.php">首頁</a></li>
					<li><a href="view_course.php">瀏覽課程</a></li>
					<li><a href="rank.php">排名推薦</a></li>
					<li><a href="show_track.php">追蹤課程</a></li>
                    <li><a href="my_comment.php">我的心得</a></li>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>相同課程心得</h1>
			</div>
			<?php if(isset($_SESSION['username'])){ ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">

				<?php
					$class_id = $_GET["class_id"];
					//連接資料庫	
					//只要此頁面上有用到連接MySQL就要include它
					include("mysql_connect.inc.php");
					$sql = "SELECT * FROM course_comments WHERE class_number='$class_id' ORDER BY comment_number DESC";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
				?>
					<div class="content">
						<!-- 追蹤 -->
						<div class="track" onClick="onTrackClicked('<?php echo $row["class_number"]; ?>')">
							<?php
								$sql_tracked = "SELECT * FROM track WHERE username = '$id'  AND class_number='{$row["class_number"]}'";
								$result_tracked = mysqli_query($conn, $sql_tracked);
								if (mysqli_num_rows($result_tracked) > 0)
									echo "取消追蹤";
								else
									echo "追蹤課程";
							?>
						</div>
						<!---->
						<?php
							$sql2 = "SELECT * FROM course_information WHERE class_number='{$row["class_number"]}'";
							$id = $_SESSION['username'];
							$sql_seen = "UPDATE track SET unseen = 0 WHERE class_number='$class_id' AND username = '$id'";
							$result2 = mysqli_query($conn, $sql2);
							$result_seen = mysqli_query($conn, $sql_seen);
							$info = mysqli_fetch_assoc($result2);
							if($info["semester"] == "10610"){
								$semester = "106上學期";
							}else{
								$semester = "106下學期";
							}
							echo $semester."/".$info["subject"]."/".$info["teacher"];
						?>
						<header>
							<h2><?= $row["title"] ?></h2>
						</header>
						<div class="score">
							<div class="score_box">
								<center><h3>甜度</h3></center>
								<span style="display:none"><?= $row["sweet"] ?></span>
								<span></span>
								<center><span class="score_text"><?= $row["sweet"] ?></span><span style="font-size: 30px">&nbsp;/&nbsp;5</span></center>
							</div>
							<div class="score_box">
								<center><h3>涼度</h3></center>
								<span style="display:none"><?= $row["cool"] ?></span>
								<span></span>
								<center><span class="score_text"><?= $row["cool"] ?></span><span style="font-size: 30px">&nbsp;/&nbsp;5</span></center>
							</div>
							<div class="score_box">
								<center><h3>難度</h3></center>
								<span style="display:none"><?= $row["difficulty"] ?></span>
								<span></span>
								<center><span class="score_text"><?= $row["difficulty"] ?></span><span style="font-size: 30px">&nbsp;/&nbsp;5</span></center>
							</div>	
						</div>
						<h3>【評分方式】</h3>
						<p class="AutoNewline"><?= $row["rating_method"] ?></p>
						<h3>【心得】</h3>
						<p class="AutoNewline"><?= $row["comment"] ?></p>
						<?php 
							$sql2 = "SELECT count(*) FROM press_like_record WHERE comment_number='{$row["comment_number"]}'"; 
							$countresult = mysqli_query($conn, $sql2);
							$count = mysqli_fetch_array($countresult);
							
							$sql2 = "SELECT count(*) FROM press_like_record WHERE comment_number='{$row["comment_number"]}' AND username='{$_SESSION['username']}'"; 
							$checkresult = mysqli_query($conn, $sql2);
							$check = mysqli_fetch_array($checkresult);
						?>

						<div class = "praise">
							<?php if($check[0]==0){ ?>
							<span id="praise"><img src="Images/zan.png" id="praise-img" /></span><?php }else{ ?>
							<span id="praise"><img src="Images/yizan.png" id="praise-img" /></span><?php } ?>
							<span id="praise-txt"><?php echo $count[0]; ?></span>
							<span id="add-num"><em>+1</em></span>
							<span id="comment_number"  style="display:none"><?php echo ($row["comment_number"]);?></span>
							<span id="user" style="display:none"><?php echo ($_SESSION['username']);?></span>
						</div>
					</div>

				<?php
						}
					} else {
						echo "本課程還沒有心得";
					}
				?>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; 2018 NTHU CourseEvaluationSystem
					</div>
				</div>
			</footer>
			<?php 		}else
		{ 

				echo '您無權限觀看此頁面!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=home.php>';
		} ?>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/notice.js"></script>
			<script src="assets/js/track.js"></script>
			<script type="text/javascript" src="rateyo/jquery.min.js"></script>
            <script type="text/javascript" src="rateyo/jquery.rateyo.js"></script>
	</body>
</html>