<?php 
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'opendb.php';

		$question = $_POST["question"];
		$tags = $_POST["tags"];
		
		$username = $_SESSION["username"];
		if(isset($_POST["anonymous"])){
			$anonymous = 1;
		}else{
			$anonymous = 0;
		}

		$sql = "INSERT INTO `quart_questions`(`question`,`category`, `user_asked`, `anonymous`) VALUES ('$question','$tags','$username','$anonymous')";
		$result = mysql_query($sql);
		if($result){
			echo "Question posted";
			header("Location:index.php");
		}
		else{
			echo "Question not posted. Try again";
		}
	}
?>