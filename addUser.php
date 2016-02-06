<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
{
		
		include 'opendb.php';
		
		$username = mysql_real_escape_string($_POST["username"]);
		$email = mysql_real_escape_string($_POST["email"]);
		$password = mysql_real_escape_string($_POST["password"]);

		$sql = "SELECT * from quart_users WHERE username='$username' OR email='$email'";
		$result = mysql_query($sql);
		if($result == FALSE){
			die(mysql_error()); 
		}
		$count = mysql_num_rows($result);
		if($count > 0){
			echo "username or email already taken.";
		}
		else{
			$sql = "INSERT INTO `quart_users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
			$check = mysql_query($sql);
			if($check){
				echo "Registered";
				$_SESSION["registered"] = "Registered";
				header("Location:index.php");
			}
			else{
				echo "Try again";
			}
		}
		
	}
?>