<?php
$id=$_POST['id'];
$name=$_POST['name'];
$college=$_POST['college'];
$teacher=$_POST['teacher'];

//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");

//sql语句的用法：字符串必须用双引号+单引号+大括号的形式
$sql="insert into courses(id,name,college,teacher)
values({$id},"."'{$name}',"."'{$college}',"."'{$teacher}');";
$result=mysqli_query($con,$sql);
if($result){
	echo "<script>alert('添加课程成功')</script>";
}
else{
	echo "<script>alert('添加课程失败')</script>";
}