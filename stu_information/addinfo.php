<?php
echo date("Y-m-d H:i:s");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息系统</title>
    <style>
		.center{text-align:center}
		.background{
			background-image: url(lm7.jpg);
			background-repeat: repeat;
		}
</style>
</head>




<body class="background">
	<div class="center">
		<h1>学生信息系统</h1>
		<form action="post.php" method="post">
			<p>学号<input type="text" name="id"></p>

			<p>姓名<input type="text" name="name"></p>
			
			<p>性别<input type="text" name="gender"></p>
			
			<p>专业<input type="text" name="major"></p>
			
			<button οnclick="window.location.href='post.php'">确认</button>
		<form>
	</div>

</body>
</html>