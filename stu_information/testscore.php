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
		这是你的成绩(*/ω＼*)
	</h1>

	<table border="1" cellspacing="0" align="center"><!--表格边框-->
		<tr>
			<td>学号</td>
			<td>课号</td>
			<td>课程名称</td>
			<td>成绩</td>
		</tr>
		<?php
			
			$con=mysqli_connect("localhost","root","1798","stu_information");
			mysqli_query($con,"set names utf8");
			$student=$_COOKIE['id'];
			$sql='select * from scores where student = '."'{$student}';";
			$result=mysqli_query($con,$sql);
			$num=$result->num_rows;
			//循环打印出该student的每一门课程分数
			for($i=0;$i<$num;$i++){
				$row=$result->fetch_array();
				//row=[student,course,score];
				$sql='select * from courses where id='."'{$row[1]}';";
				$coursename=mysqli_query($con,$sql)->fetch_array()[1];
				//采用html嵌套php的方法以表格的形式输出
				echo
				'<tr>
				<td>'."{$student}".'</td>
				<td>'."{$row[1]}".'</td>
				<td>'."{$coursename}".'</td>
				<td>'."{$row[2]}".'</td>
				</tr>';
			}
		?>
		
	</table>
</body>
</html>