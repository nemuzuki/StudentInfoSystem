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
		<h1>添加课程</h1>
		<form action="addcourse2.php" method="post">
			<p>课号<input type="text" name="id"></p>
			<p>课名<input type="text" name="name"></p>
			<p>学院<input type="text" name="college"></p>
			<p>教师<input type="text" name="teacher"></p>
			
			<button οnclick="window.location.href='addcourse2.php'">确认</button>
		<form>
	</div>

</body>
</html>
