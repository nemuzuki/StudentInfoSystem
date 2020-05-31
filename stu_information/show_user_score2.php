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
		学生成绩
	</h1>

	<table border="1" cellspacing="0" align="center"><!--表格边框-->
		<tr>
			<td>学号</td>
			<td>姓名</td>
			<td>课号</td>
			<td>课名</td>
			<td>学分</td>
			<td>成绩</td>
		</tr>
		<?php
			
			$con=mysqli_connect("localhost","root","1798","stu_information");
			mysqli_query($con,"set names utf8");
			if($_POST['stu_id']!=null){
				$stu_id=$_POST['stu_id'];
			}
			$sql='select * from stu_score where stu_id='."'{$stu_id}'".';';
			$result=mysqli_query($con,$sql);
			$num=$result->num_rows;
			//循环打印
			for($i=0;$i<$num;$i++){
				$row=$result->fetch_array();
				echo
				'<tr>
				<td>'."{$row[0]}".'</td>
				<td>'."{$row[1]}".'</td>
				<td>'."{$row[2]}".'</td>
				<td>'."{$row[3]}".'</td>
				<td>'."{$row[4]}".'</td>
				<td>'."{$row[5]}".'</td>
				</tr>';
			}
		?>
		
	</table>
</body>
</html>