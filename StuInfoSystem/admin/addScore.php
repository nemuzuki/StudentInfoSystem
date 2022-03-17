<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>

<body class="background">
	<div class="center">
		<h1>学生信息系统</h1>
		<form action="addScore2.php" method="get">
            <div class="inputbox"><span>学号</span><input name="student" required type="text"></div>
            <div class="inputbox"><span>课号</span><input name="course" required type="text"></div>
            <div class="inputbox"><span>成绩</span><input name="score" required type="text"></div>
			<div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
		<form>
	</div>

</body>
</html>