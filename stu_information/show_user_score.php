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
		<form action="show_user_score2.php" method="post">

			<p>要查询的学生学号<input type="text" name="stu_id"></p>
			
			<button οnclick="window.location.href='show_user_score2.php'">确认</button>
		<form>
	</div>
</body>
</html>