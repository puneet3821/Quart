<!DOCTYPE html>
<html>
<head>
	<title>Quart</title>
</head>
<body>
	<?php
		include 'opendb.php';

		$sql = "SELECT * FROM quart_questions";
		$result = mysql_query($sql);
		if($result){
			while($row = mysql_fetch_array($result)){
				$href = " href = 'answer.php?id=".$row["question_id"] ."'";
				echo "<a".$href.">".$row["question"]."</a>";
				echo "<br><br>";
			}
		} 
	?>
</body>
</html>