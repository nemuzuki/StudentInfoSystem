<?php

require_once('../config/database.php');
$student=$_GET['student'];
$course=$_GET['course'];
$score=$_GET['score'];


$sql="INSERT INTO score(student,course,score)VALUES($student,$course,$score);";
$result=mysqli_query($db,$sql);
if($result){
	echo "<script>alert('添加成绩成功')</script>";
}
else{
	echo "<script>alert('添加成绩失败')</script>";
}