<!DOCTYPE html>
<html>
<head>
    <title>学生信息系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./admin.css">
    <div class="background"></div>
</head>

<body>
<div class="container topnav">
    <div class="logo">
        学生信息管理系统
    </div>
    <div class="userbox" style="float:right">
        当前用户：
		<?php 
		session_start();
		echo $_SESSION["user"]
		?>
    </div>
</div>
<div class="container main">
    <!-- 左边栏，由homepage和item组成，若target=frame则目标页面是主页的右半部分 -->
    <div class="leftnav">
        <div class="subtitle">
            欢迎管理员
        </div>
        <div class="homepage">
            <a href="./welcome.php" target="frame">首页</a>
        </div>
        <div class="item">
            <a href="./showStudents.php" target="frame">查看所有学生信息</a>
        </div>
        <div class="item">
            <a href="./addStudent.php" target="frame">新建学生信息</a>
        </div>
		<div class="item">
            <a href="./deleteStudent.php" target="frame">删除学生信息</a>
        </div>
		<div class="item">
            <a href="./showCourses.php" target="frame">查看所有课程信息</a>
        </div>
        <div class="item">
            <a href="./showRegists.php" target="frame">查看所有选课信息</a>
        </div>
		<div class="item">
            <a href="./addCourse.php" target="frame">添加课程</a>
        </div>
		<div class="item">
            <a href="./addScore.php" target="frame">上传成绩</a>
        </div>
        <div class="item">
            <a href="./showCourseScore.php" target="frame">查看某门课程成绩</a>
        </div>
		<div class="item">
            <a href="./showStudentScore.php" target="frame">查看某个学生成绩</a>
        </div>
		<div class="item">
            <a href="./changePassword.php" target="frame">修改密码</a>
        </div>		
		<div class="item">
            <a href="../index.php">退出系统</a>
        </div>
	</div>

    
    <!--主页-->
    <div class="content">
        <iframe name="frame" frameborder="0" width="100%" src="./welcome.php"></iframe>
    </div>
</div>

</body>
</html>