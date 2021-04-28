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
		<?php session_start(); ?>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.php">NTHU 線上課程評鑑系統</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

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
								</div>
							</div>
						</form>
					</div>
					</div>
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</script>
	</body>
</html>