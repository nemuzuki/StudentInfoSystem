<?php
$id=$_POST['id'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$college=$_POST['college'];
$major=$_POST['major'];
require_once('../config/database.php');

$sql="INSERT INTO student(id,name,gender,college,major)VALUES('$id','$name','$gender','$college','$major');";

try{
	if(!$id){
		echo "<script>alert('ID不能为空!')</script>";
		die;
	}
	$result=mysqli_query($db,$sql);
	else echo "<script>alert('添加学生信息成功！')</script>";
}

catch(Exception $e){
	echo "<script>alert("."'{$e->getMessage()}'".")</script>";
}