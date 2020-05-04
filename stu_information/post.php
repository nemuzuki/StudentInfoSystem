<?php
$name=$_POST['name'];
$id=$_POST['id'];
$gender=$_POST['gender'];
$major=$_POST['major'];
echo $name;
//connect to database
$con=mysqli_connect("localhost","root","1798","stu_information");
//$con=mysqli_connect(host,user,password,database);
mysqli_query($con,"set names utf8");
//mysqli_query($con,query);

//sql语句的用法：
$sqlString="insert into students(id,name,gender,major)values('$id','$name','$gender','$major')";
$result=mysqli_query($con,$sqlString);
if($result){
	echo "<script>alert('数据插入成功')</script>";
}
else{
	echo "<script>alert('数据插入失败')</script>";
}