<?php
session_start();
$studentid=$_SESSION['user'];
$courseid=$_POST['courseid'];

require_once('../config/database.php');
mysqli_query($db,"set names utf8");

if($courseid!=null){
	$sql="INSERT INTO regist(student,course)values ('$studentid','$courseid')";
    try{
		$result=mysqli_query($db,$sql);
		if(!$result){
			throw new Exception(mysqli_error($db));
		}
		else{
			echo "<script>alert('选课成功')</script>";
		}
	}
	catch(Exception $e){
		echo "<script>alert("."'{$e->getMessage()}'".")</script>";
	}
}
	
