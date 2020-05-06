<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息系统</title>
    <style>
		.center{text-align:center;}
		.background{
			background-image: url(lm7.jpg);
			background-repeat: repeat;
		}
	</style>
	<style type="text/css">
		a:link{color:blue;}
		a:visited{color:blue;}
</style>
</head>




<body class="background">
	<div class="center">
		<?php
			echo "<h1>欢迎管理员φ(>ω<*) </h1>";
		?>
			 <p><a href="addinfo.php">新建学生信息</a></p>
			 <p><a href="addscore.php">上传成绩</a></p>
			 <p><a href="change_pw.php">修改密码</a></p>
			 <p><a href="homepage.php">退出系统</a></p>
	</div>

</body>
</html>