<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title></title>
	<style>
		.center{text-align:center;}
		.background{
			background-image: url(lm7.jpg);
			background-repeat: repeat;
		}
	</style>
</head>
<body class="background">
	<h1 align="center">
		所有学生信息
	</h1>

	<table border="1" cellspacing="0" align="center"><!--表格边框-->
		<tr>
			<td>学号</td>
			<td>姓名</td>
			<td>性别</td>
			<td>学院</td>
			<td>专业</td>
		</tr>
		<?php
			
			$con=mysqli_connect("localhost","root","1798","stu_information");
			mysqli_query($con,"set names utf8");
			$sql='select * from students';
			$result=mysqli_query($con,$sql);
			$num=$result->num_rows;
			//循环打印
			for($i=0;$i<$num;$i++){
				$row=$result->fetch_array();
				//在html展示可以采用html嵌套php的方法
				echo
				'<tr>
				<td>'."{$row[0]}".'</td>
				<td>'."{$row[1]}".'</td>
				<td>'."{$row[2]}".'</td>
				<td>'."{$row[3]}".'</td>
				<td>'."{$row[4]}".'</td>
				</tr>';
			}
		?>
		
	</table>
</body>
</html>