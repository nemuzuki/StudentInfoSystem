<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title>所有课程信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>

<body class="background">
	<h1>
		学生成绩
	</h1>

	<table>
		<tr>
			<td>学号</td>
			<td>课号</td>
			<td>成绩</td>
		</tr>
		<?php
			require_once('../config/database.php');
			mysqli_query($db,"set names utf8");
			if($_POST['stu_id']!=null){
				$stu_id=$_POST['stu_id'];
			}
			$sql="SELECT * from score where student='$stu_id'";
			$result=mysqli_query($db,$sql);
			while($row=mysqli_fetch_object($result)){
				?>
				<tr>
					<td><?php echo $row->student ?></td>
					<td><?php echo $row->course ?></td>
					<td><?php echo $row->score ?></td>
				</tr>
				<?php
			}
		?>
		
	</table>
</body>
</html>