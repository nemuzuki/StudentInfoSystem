<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title>所有课程信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>

<body class="background">
	<h1>选课信息</h1>
	<table>
		<tr>
			<td>学号</td>
			<td>姓名</td>
			<td>课号</td>
			<td>课名</td>
		</tr>
		<?php
			require_once('../config/database.php');
			mysqli_query($db,"set names utf8");
			$sql='SELECT * FROM registInfo';
			$result=mysqli_query($db,$sql);
			$num=$result->num_rows;
			while($row=mysqli_fetch_object($result)){
				?>
					<td><?php echo $row->student_id ?></td>
					<td><?php echo $row->student_name ?></td>
					<td><?php echo $row->course_id ?></td>
					<td><?php echo $row->course_name ?></td>
				<?php
			}
		?>
		
	</table>
</body>
</html>