<?php
$id=$_POST['id'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$college=$_POST['college'];
$major=$_POST['major'];

//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");


$sql="insert into students(id,name,gender,college,major)
values({$id},"."'{$name}',"."'{$gender}',"."'{$college}',"."'{$major}');";

try{
	if(!$id){
		echo "<script>alert('id不能为空!')</script>";
		die;
	}
	$result=mysqli_query($con,$sql);
	if(!$result)throw new Exception(mysqli_error($con));
	else echo "<script>alert('添加学生信息成功！')</script>";
}

catch(Exception $e){
	echo "<script>alert("."'{$e->getMessage()}'".")</script>";
}