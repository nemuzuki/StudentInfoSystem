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
			echo "<h1>欢迎管理员φ(>ω<*) </h1>";
		?>
		<table align="center">
		<tr>
			<td><a href="showinfo.php">查看所有学生信息</a></td>
			<td><a href="addinfo.php">新建学生信息</a></td>
			<td><a href="deleteinfo.php">删除学生信息</a></td>
		</tr>
		<tr>
			<td><a href="showcourses.php">查看所有课程信息</a></td>
			<td><a href="showregist.php">查看所有选课信息</a></td>
			<td><a href="addcourse.php">添加课程</a></td>
			<td><a href="addscore.php">上传成绩</a></td>
		</tr>
		<tr>
			<td><a href="show_course_score.php">查看某门课程成绩</a></td>
			<td><a href="show_user_score.php">查看某个学生成绩</a></td>
			<td><a href="change_pw.php">修改密码</a></td>
			<td><a href="homepage.php">退出系统</a></td>
		</tr>
		</table>
	</div>

</body>
</html>