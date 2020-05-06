<?php
//上接homepage.php

$host="localhost";
$user="root";
$pw="1798";
$db="stu_information";

$con=mysqli_connect($host,$user,$pw,$db);

$id=$_POST['id'];
$password=$_POST['password'];

if($id==null||$password==null){
    die("账号和密码不能为空!");
}


$sql='select * from users where id='."'{$id}'and password="."'$password';";
$result=mysqli_query($con,$sql);//将获取到的用户名和密码拿到数据库的users表里面去查找匹配

if($result instanceof mysqli_result){
	if(!$result->num_rows){
		echo "<h1>用户名或密码错误(；´д｀)ゞ</h1>";
	}
	else{
		
		$url="station.php";
		setcookie('id',$id);
		if($id==1813055){
			header("location:administrator.php");
		}
		else{
			header("location:$url");
		}
	}		
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