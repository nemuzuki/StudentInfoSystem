<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>

<body class="background">
	<div class="center">
		<h1>添加学生信息</h1>
		<form action="addStudent2.php" method="post">
            <div class="inputbox"><span>学号</span><input name="id" required type="text"></div>
            <div class="inputbox"><span>姓名</span><input name="name" required type="text"></div>
            <div class="inputbox"><span>性别</span><input name="gender" required type="text"></div>
            <div class="inputbox"><span>学院</span><input name="college" required type="text"></div>
            <div class="inputbox"><span>专业</span><input name="major" required type="text"></div>
			<div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
		<form>
	</div>

</body>
</html>
