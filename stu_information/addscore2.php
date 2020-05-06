<?php
$id=$_POST['id'];
$course=$_POST['course'];
$score=$_POST['score'];

//连接数据库：
$con=mysqli_connect("localhost","root","1798","stu_information");
mysqli_query($con,"set names utf8");

//sql语句的用法：字符串必须用双引号+单引号+大括号的形式
$sql="insert into scores(student,course,score)values($id,$course,$score);";
$result=mysqli_query($con,$sql);
if($result){
	echo "<script>alert('添加成绩成功')</script>";
}
else{
	echo "<script>alert('添加成绩失败')</script>";
}