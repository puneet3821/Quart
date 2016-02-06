<?php
	include 'checkUser.php';
	$question_id = $_GET["id"];
	$_SESSION["questionId"] = $question_id;
	include 'opendb.php';
	$sql = "SELECT * FROM quart_questions WHERE question_id='$question_id'";
	$result = mysql_query($sql);
	if($result){
		while($row = mysql_fetch_array($result)){
			echo "<p>".$row["question"]."</p>";
		}
	}
?>

<?php
	$sql = "SELECT * FROM quart_answers WHERE question_id='$question_id'";
	$result = mysql_query($sql);
	if($result){
		while($row = mysql_fetch_array($result)){
			echo "<p>".$row["answer"]."</p>";
			if($row["anonymous"] == 1)
					echo "anonymous";
			else
				echo $row["user_answered"];
			echo "<br><br>";
		}
	}
?>

	<!DOCTYPE html>
	<html>
		
		<body>
			<form action="addAnswer.php" method="POST">
				Answer : <input type="text" name="answer">
				Answer as anonymous : <input type="checkbox" value="yes" name="anonymous"><br>
				<input type="text" name="question_id" hidden value=<?php echo $question_id;?>>
				<input type="submit" value="Post">
			</form>
		</body>
	</html>