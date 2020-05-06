<?php

$id=$_COOKIE['id'];
$newpassword=$_POST['newpassword'];
if($newpassword==null){
	die('密码不能为空');
}
//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");

//sql语句的用法：字符串必须用双引号+单引号+大括号的形式
$sql="update users set password="."'{$newpassword}'"."where id={$id};";
$result=mysqli_query($con,$sql);
if($result){
	echo "<script>alert('密码修改成功')</script>";
}
else{
	echo "<script>alert('密码修改失败')</script>";
}

?>
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
<body class="background"></body>