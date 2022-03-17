<?php

require_once('../config/database.php');
$id=$_POST['id'];
$name=$_POST['name'];
$college=$_POST['college'];
$teacher=$_POST['teacher'];

mysqli_query($db,"set names utf8");

//sql语句的用法：字符串必须用双引号+单引号+大括号的形式
$sql="INSERT INTO course(id,name,college,teacher)VALUES('$id','$name','$college','$teacher');";
$result=mysqli_query($db,$sql);
if($result){
	echo "<script>alert('添加课程成功'); parent.location.href='./index.php';</script>";
}
else{
	echo "<script>alert('添加课程失败') parent.location.href='./index.php';</script>";
}
?>