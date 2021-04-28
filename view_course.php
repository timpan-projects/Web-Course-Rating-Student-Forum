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
		<link rel="stylesheet" href="rateyo/jquery.rateyo.min.css"/>
		<?php session_start(); ?>
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
		<?php if(isset($_SESSION['username'])){ ?>

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
			<h1>瀏覽課程</h1>
		</div>

        <!-- Main -->
		<section id="main" class="wrapper">
			<div class="inner">
				<form action="view_course.php" method="POST">
					<input type="text" placeholder="輸入：老師名/課名/課程編號" id="input" name="teacher">
					<div align="right">
					<input type="submit" class="button primary icon fa-search">
					</div>
				</form>
				<?php
				header("Cache-control: private");
				if(isset($_POST['teacher'])){ 
					
					//連接資料庫
					//只要此頁面上有用到連接MySQL就要include它
					echo "<font size='4'>搜尋<font color=blue>".$_POST['teacher']."</font>結果:</font>";
					include("mysql_connect.inc.php");
					header("Content-Type:text/html; charset=utf-8");
					$teacher = $_POST['teacher'];

					$sql = "SELECT * FROM course_information WHERE teacher LIKE '%".$teacher."%' OR subject LIKE '%".$teacher."%' OR class_number LIKE '%".$teacher."%'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
                            // output data of each row ?>
						<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>學期</th>
									<th>課名</th>
									<th>授課老師</th>
								</tr>
							</thead>
							<tbody>
                    <?php   while($row = mysqli_fetch_assoc($result)) {
                    ?>

						<tr><td>
						<?php
							$sql2 = "SELECT * FROM course_information WHERE class_number='{$row["class_number"]}'";
							$result2 = mysqli_query($conn, $sql2);
							$info = mysqli_fetch_assoc($result2);
							if($info["semester"] == "10610"){
								$semester = "106上學期";
							}else{
								$semester = "106下學期";
							} 
							echo $semester ?></td><td>
							<a href="show_course.php?class_id=<?= $row["class_number"] ?>">
							<?php echo $info["subject"] ?></a></td><td><a href="show_teacher.php?teacher_id=<?= $info["teacher"] ?>">
							<?php echo $info["teacher"]; ?></a></td>
							<!-- 追蹤 -->
							<td>
							<div class="track" onClick="onTrackClicked('<?php echo $row["class_number"]; ?>')">
								<?php
									$sql_tracked = "SELECT * FROM track WHERE username = '$id'  AND class_number='{$row["class_number"]}'";
									$result_tracked = mysqli_query($conn, $sql_tracked);
									if (mysqli_num_rows($result_tracked) > 0)
										echo "取消追蹤";
									else
										echo "追蹤課程";
								?>
							</td>
							</div>
							<!---->
						</tr>
					
                    <?php
                            }
							?></tbody></table></div>
                    <?php
                        } else {
                            echo "0 result";
					}
				}
				else{
                        //連接資料庫	
                        //只要此頁面上有用到連接MySQL就要include它
                        include("mysql_connect.inc.php");
                        $sql = "SELECT DISTINCT class_number FROM course_comments";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row ?>
						<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>學期</th>
									<th>課名</th>
									<th>授課老師</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
                    <?php   while($row = mysqli_fetch_assoc($result)) {
                    ?>

						<tr><td>
						<?php
							$sql2 = "SELECT * FROM course_information WHERE class_number='{$row["class_number"]}'";
							$result2 = mysqli_query($conn, $sql2);
							$info = mysqli_fetch_assoc($result2);
							if($info["semester"] == "10610"){
								$semester = "106上學期";
							}else{
								$semester = "106下學期";
							} 
							echo $semester ?></td><td>
							<a href="show_course.php?class_id=<?= $row["class_number"] ?>">
							<?php echo $info["subject"] ?></a></td><td><a href="show_teacher.php?teacher_id=<?= $info["teacher"] ?>">
							<?php echo $info["teacher"]; ?></a></td>
							<!-- 追蹤 -->
							<td>
							<div class="track" onClick="onTrackClicked('<?php echo $row["class_number"]; ?>')">
								<?php
									$sql_tracked = "SELECT * FROM track WHERE username = '$id'  AND class_number='{$row["class_number"]}'";
									$result_tracked = mysqli_query($conn, $sql_tracked);
									if (mysqli_num_rows($result_tracked) > 0)
										echo "取消追蹤";
									else
										echo "追蹤課程";
								?>
							</td>
							</div>
							<!---->
						</tr>
                    <?php
                            }
							?></tbody></table></div>
                    <?php   } else {
                            echo "0 result";
				}}
                    ?>
			</div>
		</section>

		<?php }
		else
		{ ?>


		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">首頁</a></li>
					<li><a href="elements.html">瀏覽課程</a></li>
					<li><a href="generic.html">排名推薦</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>NTHU 線上課程評鑑系統</h1>
					<p>Course Evaluation System. Better Choice, Better Life.</p>
				</div>
			</section>

		<!-- Testimonials -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Login To Your Account</h2>
					</header>
					<div class="highlights">
					<div class="inner">
						<form method="post" action="connect.php">
							<div class="row gtr-uniform">
								<div class="col-12 col-12-xsmall">
									<input type="text" name="id" placeholder="ID" />
								</div>
								<div class="col-12 col-12-xsmall">
									<input type="password" name="pw" placeholder="Password" />
								</div>
								<div class="col-12">
									<ul class="actions">
									<li><input type="submit" value="Login" class="primary" /></li>
									<li><input type="reset" value="Reset" /></li>
									</ul>
									Not registered?<a href="register.php">Create an account</a>
								</div>
							</div>
						</form>
					</div>
					</div>
				</div>
			</section>

		<?php }?>
				<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; 2018 NTHU CourseEvaluationSystem
					</div>
				</div>
			</footer>

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