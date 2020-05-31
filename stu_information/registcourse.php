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
		<h1>选课&退课</h1>
		<form action="registcourse2.php" method="post">
			<p>要选的课程课号<input type="text" name="registcourse"></p>
			<p>要退的课程课号<input type="text" name="dropcourse"></p>
			<button οnclick="window.location.href='registcourse2.php'">确认</button>
		<form>
	</div>

</body>
</html>