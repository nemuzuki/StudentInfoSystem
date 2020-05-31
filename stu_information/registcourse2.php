<?php
$id=$_COOKIE['id'];
if($_POST['registcourse']!=null){
	$registcourse=$_POST['registcourse'];
}
if($_POST['dropcourse']!=null){
	$dropcourse=$_POST['dropcourse'];
}
//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");

if($_POST['registcourse']!=null){
	$sql="call regist_course({$id},{$registcourse});";
    try{
		$result=mysqli_query($con,$sql);
		if(!$result){
			throw new Exception(mysqli_error($con));
		}
		else{
			echo "<script>alert('选课成功')</script>";
		}
	}
	catch(Exception $e){
		echo "<script>alert("."'{$e->getMessage()}'".")</script>";
	}
}
	
if($_POST['dropcourse']!=null){
	$sql="call drop_course({$id},{$dropcourse});";
	try{
		$result=mysqli_query($con,$sql);
		if(!$result){
			throw new Exception(mysqli_error($con));
		}
		else{
			echo "<script>alert('退课成功')</script>";
		}
	}
	catch(Exception $e){
		echo "<script>alert("."'{$e->getMessage()}'".")</script>";
	}
}
	
