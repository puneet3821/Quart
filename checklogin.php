<?php
    session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'opendb.php';
		
		$username = mysql_real_escape_string($_POST["username"]);
		$password = mysql_real_escape_string($_POST["password"]);

		$sql = "SELECT * from quart_users WHERE username='$username'";
		$result = mysql_query($sql);
		if($result == FALSE){
			die(mysql_error()); 
		}
		$count = mysql_num_rows($result);
		if($count > 0){
			while($row = mysql_fetch_array($result)){
				if($row["password"] == $password){
					echo "Valid user";
					$_SESSION["username"] = $row["username"];
					$_SESSION["id"] = $row["id"];
					header("Location:index.php");
				}
				else{
					echo "Invalid username or password";
					echo "<br>";
					echo "<a href='login.php'>Login</a>";
				}
			}
		}
		else{
			echo "Invalid username or password";
			echo "<br>";
			echo "<a href='login.php'>Login</a>";
		}
	}
?>