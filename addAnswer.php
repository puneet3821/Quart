<?php
  	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'opendb.php';
		$question_id = $_POST["question_id"];
		$answer = $_POST["answer"];

		$username = $_SESSION["username"];

		if(isset($_POST["anonymous"])){
			$anonymous = 1;
		}
		else{
			$anonymous = 0;			
		}
		$check = "SELECT * FROM quart_answers WHERE question_id";
		$sql = "INSERT INTO `quart_answers`(`question_id`,`answer`, `user_answered`, `anonymous`) VALUES ('$question_id','$answer','$username','$anonymous')";
		$result = mysql_query($sql);
		if($result){
			echo "Answer posted";
			$var = "Location:answer.php?id=".$_SESSION["questionId"];
			header($var);
		}
		else{
			echo "Question not posted. Try again";
		}
	}
?>