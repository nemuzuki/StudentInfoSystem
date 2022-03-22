<?php
$student_id=$_POST['student_id'];
require_once('../config/database.php');

$success = true;
mysqli_query($db, "SET AUTOCOMMIT=0"); // 设置为不自动提交
mysqli_begin_transaction($db);//启动事务
$sql1="DELETE FROM student WHERE id=$student_id";
$result1=mysqli_query($db,$sql1);
if(!$result1){
	$success=false;
}
$sql2="DELETE FROM user WHERE id=$student_id";
$result2=mysqli_query($db,$sql2);
if(!$result2){
	$success=false;
}
$sql3="DELETE FROM score WHERE student=$student_id";
$result3=mysqli_query($db,$sql3);
if(!$result3){
	$success=false;
}

if($success){
	echo "<script>alert('删除学生信息成功');window.location.href='deleteStudent.php';</script>";
	mysqli_commit($db);//提交事务 
}
else{
	echo "<script>alert('删除学生信息失败');window.location.href='deleteStudent.php';</script>";
	mysqli_query($db, "ROLLBACK");//失败则回滚
}