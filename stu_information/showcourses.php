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
		所有课程信息
	</h1>

	<table border="1" cellspacing="0" align="center"><!--表格边框-->
		<tr>
			<td>课号</td>
			<td>课名</td>
			<td>学院</td>
			<td>教师</td>
		</tr>
		<?php
			
			$con=mysqli_connect("localhost","root","1798","stu_information");
			mysqli_query($con,"set names utf8");
			$sql='select * from courses';
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
				</tr>';
			}
		?>
		
	</table>
</body>
</html>