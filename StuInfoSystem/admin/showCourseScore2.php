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
			<td>姓名</td>
			<td>课号</td>
			<td>课名</td>
			<td>成绩</td>
		</tr>
		<?php
			require_once('../config/database.php');
			mysqli_query($db,"set names utf8");
			$courseid=$_POST['course_id'];
			$sql="SELECT a.id AS studentId,
					a.name AS studentName,
					b.id AS courseId,
					b.name AS courseName,
					c.score AS score
						FROM student a,course b,score c
							WHERE b.id=c.course
							AND a.id = c.student
							AND c.course = '$courseid'";
			$result=mysqli_query($db,$sql);
			while($row=mysqli_fetch_object($result)){
				?>
				<tr>
					<td><?php echo $row->studentId ?></td>
					<td><?php echo $row->studentName ?></td>
					<td><?php echo $row->courseId ?></td>
					<td><?php echo $row->courseName ?></td>
					<td><?php echo $row->score ?></td>
				</tr>
				<?php
			}
		?>
		
	</table>
</body>
</html>