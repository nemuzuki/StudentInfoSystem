<?php
$deleteid=$_POST['deleteid'];
//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");
$sql="call delete_student({$deleteid});";
$result=mysqli_query($con,$sql);
if($result){
	echo "<script>alert('删除学生信息成功')</script>";
}
else{
	echo "<script>alert('删除学生信息失败')</script>";
}