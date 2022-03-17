<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
	<title>所有课程信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./table.css">
</head>

<body class="background">

	<table>
		<tr>
			<td>学号</td>
			<td>课号</td>
		</tr>
		<?php
			require_once('../config/database.php');
			mysqli_query($db,"set names utf8");
			$sql='SELECT * FROM regist';
			$result=mysqli_query($db,$sql);
			$num=$result->num_rows;
			//循环打印
			for($i=0;$i<$num;$i++){
				$row=$result->fetch_array();
				?>
					<td><?php echo $row->student ?></td>
					<td><?php echo $row->course ?></td>
				<?php
			}
		?>
		
	</table>
</body>
</html>