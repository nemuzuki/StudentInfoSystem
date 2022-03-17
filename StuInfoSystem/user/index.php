<!DOCTYPE html>
<html>
<head>
    <title>学生信息系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./user.css">
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
            欢迎同学
        </div>
        <div class="homepage">
            <a href="./welcome.php" target="frame">首页</a>
        </div>
        <div class="item">
            <a href="./registCourse.php" target="frame">选课</a>
        </div>
        <div class="item">
            <a href="./checkScore.php" target="frame">成绩查询</a>
        </div>
		<div class="item">
            <a href="../admin/changePassword.php" target="frame">修改密码</a>
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
<div class="container footer">
    <span>数据库系统</span>
</div>
</body>
</html>