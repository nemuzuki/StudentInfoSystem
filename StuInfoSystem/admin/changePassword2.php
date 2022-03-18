<?php
session_start();
$id=$_SESSION['user'];
$newpassword=$_POST['newpassword'];
if($newpassword==null){
	die('密码不能为空');
}

require_once('../config/database.php');
mysqli_query($db,"set names utf8");

$sql="UPDATE user SET password='$newpassword' where id ='$id'";
mysqli_query($db, "SET AUTOCOMMIT=0"); // 设置为不自动提交，因为MYSQL默认立即执行
mysqli_begin_transaction($db);//开始事务定义
if(mysqli_query($db,$sql)){
	echo "<script>alert('密码修改成功')</script>";
}
else{
	echo "<script>alert('密码修改失败')</script>";
	mysqli_query($db, "ROLLBACK");//失败则回滚
}
mysqli_commit($db);//提交事务 

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>
<body class="background"></body>