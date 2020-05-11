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
		<h1>删除学生信息</h1>
		<form action="deleteinfo2.php" method="post">
			<p>学号<input type="text" name="deleteid"></p>
			
			<button οnclick="window.location.href='deleteinfo2.php'">确认</button>
		<form>
	</div>

</body>
</html>