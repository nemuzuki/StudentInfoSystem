<?php
if (isset($_SESSION['user'])){
	session_destroy();//销毁之前的会话
}
session_start();//建立会话
if(isset($_GET["retry"])){
    $wrong='<div class="inputbox">
                <span style="color:#df3a01;font-size:10px;margin:10px;display:block">用户名或密码错误</span>
            </div>';
}
print <<<END
	
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, height=device-height, inital-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" media="all" href="./login.css" />
    <title>学生信息系统</title>
    <style>
		.center{text-align:center;}
	</style>
</head>


<body>
	<div class="loginbox">
		<div class="title">
			<span>学生信息系统</span>
		</div>
		<div class="subtitle">用户登录</div>
		<form action="./login.php" method="post">
			<!-- required代表必填 -->
            <div class="inputbox"><span>学号</span><input name="id" required type="text"></div>
			<div class="inputbox"><span>密码</span><input name="passwd" required type="password"></div>
			
            <div class="submitbox"><input name="submit" type="submit" value="确认"></div>
		<form>
	</div>
</body>
</html>
END;

exit();

?>