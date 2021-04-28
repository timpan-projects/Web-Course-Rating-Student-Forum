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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- css檔 -->
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="script.js"></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<!-- rateyo星星套件 -->
        <link rel="stylesheet" href="rateyo/jquery.rateyo.min.css"/>
	<?php session_start(); ?>
	<script>
      $(document).ready(function(){
        $.ajax(returnObject("all_course"));

        $("#search").click(function(){
            $.ajax(returnObject("search_course"));
        });
      });

      function returnObject(string){
        var obj;
        if (string == "all_course"){
            obj = {
                type: "POST",
                url: "all_course.php",
                success: returnFunction("all_course")
            }
        }
        else if (string == "search_course"){
            obj = {
                type: "POST",
                url: "search_course.php",
                data: {
                        teacher: $("#input").val()
                      },
                success: returnFunction("search_course")
            }
        }
        return obj;
      }

      function returnFunction(string){
        var func;
        if (string == "all_course"){
            func = function(result){
                $("#course").empty();
                result = result.split("%");
                $("#course").append("<option value='0'>請選擇一門課程</option>");
                for(var i=0;i<result.length-1;i++){
                    var origin = result[i];
                    if(result[i].substr(3,2) == "10"){
                        result[i] = result[i].split("");
                        result[i].splice(3,2,"上");
                        result[i] = result[i].join("");
                    }else{
                        result[i] = result[i].split("");
                        result[i].splice(3,2,"下");
                        result[i] = result[i].join("");
                    }
                    $("#course").append("<option value='"+origin+"'>"+result[i]+"</option>");
                }   
            }
        }
        else if (string == "search_course"){
            func = function(result){
                $("#course").empty();
                result = result.split("%");
                $("#course").append("<option value='0'>請選擇一門課程</option>");
                for(var i=0;i<result.length-1;i++){
                    var origin = result[i];
                    if(result[i].substr(3,2) == "10"){
                        result[i] = result[i].split("");
                        result[i].splice(3,2,"上");
                        result[i] = result[i].join("");
                    }else{
                        result[i] = result[i].split("");
                        result[i].splice(3,2,"下");
                        result[i] = result[i].join("");
                    }
                    $("#course").append("<option value='"+origin+"'>"+result[i]+"</option>");
                }   
            }
        }
        return func;
      }
    </script>
	</head>
	<body class="is-preload">
		<?php if(isset($_SESSION['username'])){ ?>
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
								<div class="notice-item" onclick="onNoticeClicked('<?php echo $row["class_number"]; ?>')">
									<div class="notice-context">您所關注的課程：<?= $row["class_number"] ?>有 <?= $row["unseen"] ?> 筆新的評論，馬上去看看吧！</div>
								</div>
								</a>
					<?php
							}//end of while
						}//end of if
						else {
					?>
							<div>您所追蹤的課程尚無新的評論</div>
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
				<h1>新增心得</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<form action="upload_comment.php" method="POST">
                        <h2>第一步：選擇課程</h2>
                        <br>
                        <input type="text" placeholder="輸入：老師名/課名/課程編號" id="input" name="teacher">
                        <button type="button" id="search" class="btn btn-default">搜尋</button>
                        <br><br>
                        <select id="course" name="course">
                            <option value="0">請選擇一門課程</option>
                        </select>
                        <br><br>
                        <h2>第二步：填寫心得</h2>
                        <p>
                            <div><h3>標題</h3></div>
                            <input type="text" name="title"/>
                        </p>
                        <p>
                            <div>評分方式</div>
                            <textarea name="rating_method" rows="4" cols="50"></textarea>
                        </p>
                        <p>
                            <div>修課心得</div>
                            <textarea name="comment" rows="4" cols="50"></textarea>
                        </p>
                        <div>甜度：</div>
                        <div>
                            <span id="sweet"></span>
                            <span id="display_sweet"></span>
                            <input type="hidden" name="sweet_score" id="sweet_score" value="0">
                        </div>

                        <div>涼度：</div>
                        <div>
                            <span id="cool"></span>
                            <span id="display_cool"></span>
                            <input type="hidden" name="cool_score" id="cool_score" value="0">
                        </div>

                        <div>難度：</div>
                        <div>
                            <span id="difficulty"></span>
                            <span id="display_difficulty"></span>
                            <input type="hidden" name="difficulty_score" id="difficulty_score" value="0">
                        </div>
                        <br>
                        <input type="submit" name="submit" value="送出">
                        </form>



                        <script>

                        //星星套件
                        $(function () {
                            //甜度
                            $("#sweet").rateYo({
                            rating    : 0,
                            spacing   : "5px",
                            multiColor: {
                                "startColor": "#FFFFBB", //light yellow
                                "endColor"  : "#FF0000"  //red
                            },
                            precision: 1
                            }).on("rateyo.change", function (e, data) {
                            $("#display_sweet").text("分數："+data.rating);
                            $("#sweet_score").val(data.rating);
                            });

                            //涼度
                            $("#cool").rateYo({
                            rating    : 0,
                            spacing   : "5px",
                            multiColor: {
                                "startColor": "#FFFFBB", //light yellow
                                "endColor"  : "#FF0000"  //red
                            },
                            precision: 1
                            }).on("rateyo.change", function (e, data) {
                            $("#display_cool").text("分數："+data.rating);
                            $("#cool_score").val(data.rating);
                            });

                            //難度
                            $("#difficulty").rateYo({
                            rating    : 0,
                            spacing   : "5px",
                            multiColor: {
                                "startColor": "#FFFFBB", //light yellow
                                "endColor"  : "#FF0000"  //red
                            },
                            precision: 1
                            }).on("rateyo.change", function (e, data) {
                            $("#display_difficulty").text("分數："+data.rating);
                            $("#difficulty_score").val(data.rating);
                            });
                        });
                        </script>
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
			<script type="text/javascript" src="rateyo/jquery.min.js"></script>
            <script type="text/javascript" src="rateyo/jquery.rateyo.js"></script>
			<script src="assets/js/notice.js"></script>
			<script src="assets/js/track.js"></script>
		<?php } 
		else
		{
				echo '您無權限觀看此頁面!';
				echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		}?>
	</body>
</html>