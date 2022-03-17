<?php
session_start();//只要用SESSION就要写
$id=$_POST['id'];
$passwd=$_POST['passwd'];

require_once('./config/database.php');

$sql="SELECT * FROM user WHERE id ='$id' AND password='$passwd'";
$result=mysqli_query($db,$sql);

if(!$result->num_rows){
	echo "<script>alert('密码错误')</script>";
	exit();
}
else{
	# 管理员
	if($id==1){
		$_SESSION["login"]=true;
		$_SESSION["user"]=$id;
		header ("HTTP/1.1 302 Moved Temporatily");
		header("Location:./admin/");# 跳转到管理员目录
	}
	# 用户
	else{
		$_SESSION["login"]=true;
		$_SESSION["user"]=$id;
		header ("HTTP/1.1 302 Moved Temporatily");
		header("Location:./user/");
	}
}		

