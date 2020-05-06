<?php
echo date("Y-m-d H:i:s");?>
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
			$id=$_COOKIE['id'];
			echo "<h1>登录成功，用户&nbsp{$id}(*/ω＼*)</h1>";
		?>
			<p><a href="testscore.php">成绩查询</a></p>
			<p><a href="change_pw.php">修改密码</a></p>
			<p><a href="homepage.php">退出系统</a></p>
	</div>

</body>
</html>