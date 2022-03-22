<?php
session_start();//启动session，在服务器端保存会话信息
$id=$_POST['id'];
$passwd=$_POST['passwd'];

require_once('./config/database.php');

//防止SQL注入，如' or 1=1 #
$enableAntiInject=False;
if($enableAntiInject && !is_numeric($id)){
	$id=mysqli_real_escape_string($db,$id); //将非法字符前面加上转义符号\
}
$sql="SELECT * FROM user WHERE id ='$id' AND password='$passwd'";
$result=mysqli_query($db,$sql);

if(!$result->num_rows){
	echo "<script>alert('用户名或密码错误！');window.location.href='index.php';</script>";//先弹出对话框，关闭后跳转
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

