<?php
session_start();
$id=$_SESSION['user'];
$newpasswd=$_POST['newpasswd'];
if($newpasswd==null){
	die('密码不能为空');
}

require_once('../config/database.php');
mysqli_query($db,"set names utf8");
$sql="CALL changePasswd($id,$newpasswd)";//存储过程
if(mysqli_query($db,$sql)){
	echo "<script>alert('密码修改成功');window.location.href='changePassword.php';</script>";
}
else{
	echo "<script>alert('密码修改失败');window.location.href='changePassword.php';</script>";
}

?>