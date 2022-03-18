<?php
$student_id=$_POST['student_id'];
require_once('../config/database.php');

$sql="CALL delete_student({$student_id});";# 使用存储过程来删除
$result=mysqli_query($db,$sql);
if($result){
	echo "<script>alert('删除学生信息成功')</script>";
}
else{
	echo "<script>alert('删除学生信息失败')</script>";
}