<?php
$id=$_POST['id'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$college=$_POST['college'];
$major=$_POST['major'];

//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");

//sql语句的用法：字符串必须用双引号+单引号+大括号的形式
$sql="insert into students(id,name,gender,college,major)
values({$id},"."'{$name}',"."'{$gender}',"."'{$college}',"."'{$major}');";
$result=mysqli_query($con,$sql);
if($result){
	echo "<script>alert('添加成功')</script>";
}
else{
	echo "<script>alert('添加失败')</script>";
}