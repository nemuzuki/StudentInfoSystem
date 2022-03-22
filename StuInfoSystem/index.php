<?php
if (isset($_SESSION['user'])){
	session_destroy();//销毁之前的会话
}
session_start();//建立会话
?>
	
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, height=device-height, inital-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" media="all" href="./login.css" />
    <title>学生信息系统</title>
</head>


<body>
	<div class="loginbox">
		<div class="title">
			<span>学生信息系统</span>
		</div>
		<div class="subtitle">用户登录</div>
		<form action="./login.php" method="post">
            <div class="inputbox"><span>账号</span><input name="id" required type="text"></div>
			<div class="inputbox"><span>密码</span><input name="passwd" required type="password"></div>
			
            <div class="submitbox"><input name="submit" type="submit" value="确认"></div>
		<form>
	</div>
</body>
</html>
