<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title>添加课程信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>


<body>
	<div class="loginbox">
		<div class="title">
			<span>添加课程信息</span>
		</div>
		<form action="./addCourse2.php" method="post">
			<!-- required代表必填 -->
            <div class="inputbox"><span>课号</span><input name="id" required type="text"></div>
            <div class="inputbox"><span>名称</span><input name="name" required type="text"></div>
            <div class="inputbox"><span>学院</span><input name="college" required type="text"></div>
            <div class="inputbox"><span>教师</span><input name="teacher" required type="text"></div>
			<div class="clickbox clearfloat"><span></span><input name="submit" type="submit" value="提交"></div>
		<form>
	</div>
</body>
</html>
