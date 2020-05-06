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
</head>




<body class="background">
	<div class="center">
		<h1>学生信息系统</h1>
		<form action="addscore2.php" method="post">
			<p>学号<input type="text" name="id"></p>
			<p>课号<input type="text" name="course"></p>
			<p>成绩<input type="text" name="score"></p>
			
			<button οnclick="window.location.href='addscore2.php'">确认</button>
		<form>
	</div>

</body>
</html>