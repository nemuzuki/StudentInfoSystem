<?php
//这就是连接串？

$host="localhost";
$user="root";
$pw="1798";
$db="stu_information";

$con=mysqli_connect($host,$user,$pw,$db);

$id=$_POST['id'];
$password=$_POST['password'];

if($id==null||$password==null){
    die("账号和密码不能为空!");
}


$sql='select * from users where id='."'{$id}'and password="."'$password';";
$result=mysqli_query($con,$sql);//将获取到的用户名和密码拿到数据库里面去查找匹配

if($result instanceof mysqli_result){
	if(!$result->num_rows){
		echo "<h1>用户名或密码错误</h1>";
	}
	else{
		echo "<h1>登录成功，用户&nbsp{$id}</h1>";
		$sql='select * from scores where student='."'{$id}'";
		$result=mysqli_query($con,$sql);
		while($row=$result->fetch_array()){//按行获得sql查询结果的标准语句
			for($i=0;$i<3;$i++){
				setcookie('result'."{$i}",$row[$i]);
			}
		}
		$url="testscore.php";
		setcookie('id',$id);
		
		header("Location:$url");
	}		
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息系统</title>
    <style>
		.center{text-align:center}
		.background{
			background-image: url(lm7.jpg);
			background-repeat: repeat;
		}
	</style>
</head>
<body class="background"></body>