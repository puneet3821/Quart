<?php
 	session_start();
 	if(isset($_SESSION["username"])){

 	}else{
 		$_SESSION["loginError"] = "Login To See Other Pages";
 		header("Location:index.php");
 	}
?>