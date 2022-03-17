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
    		<td>课号</td>
    		<td>课名</td>
    		<td>学院</td>
    		<td>教师</td>
		</tr>
		<?php
			require_once('../config/database.php');
			mysqli_query($db,"set names utf8");
			$sql='SELECT * FROM course';
			$result=mysqli_query($db,$sql);
			
			if($result){
				while($row=mysqli_fetch_object($result)){
					?>
					<tr>
						<td><?php echo $row->id ?></td>
						<td><?php echo $row->name ?></td>
						<td><?php echo $row->college ?></td>
						<td><?php echo $row->teacher ?></td>
					</tr>
					<?php
				}
			}
		    mysqli_close($db);
    	?>
	</table>
</body>
</html>