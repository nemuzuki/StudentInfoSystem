<?php
session_start();
$id=$_SESSION['user'];
$newpassword=$_POST['newpassword'];
if($newpassword==null){
	die('密码不能为空');
}

require_once('../config/database.php');
mysqli_query($db,"set names utf8");

$sql="UPDATE user SET password='$newpassword'where id ='$id'";
$result=mysqli_query($db,$sql);
if($result){
	echo "<script>alert('密码修改成功')</script>";
}
else{
	echo "<script>alert('密码修改失败')</script>";
}

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>
<body class="background"></body>