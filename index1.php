<?php
	session_start();
 	if(isset($_SESSION["loginError"])){
 		if(!isset($_SESSION["username"]))
 			echo $_SESSION["loginError"];
 		else
 			echo "Welcome ".$_SESSION["username"];
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
	<div>
		<a href="askQuestion.php">Ask Question</a>
		<a href="login.php">Login</a>
		<a href="register.php">Register</a>
		<a href="logout.php">Log out</a>
		<br><br>
	</div>	
	<h1>Questions</h1>
	<?php
		include 'opendb.php';

		$sql = "SELECT * FROM quart_questions ORDER BY asked_time DESC";
		$result = mysql_query($sql);
		if($result){
			while($row = mysql_fetch_array($result)){
				$href = " href = 'answer.php?id=".$row["question_id"] ."'";
				echo "<a".$href.">".$row["question"]."</a> ";
				if($row["anonymous"] == 1)
					echo "anonymous";
				else
					echo $row["user_asked"];
				echo "<button id='question-". $row["question_id"]. "' class='upvote'>Up</button>";
				echo "<button id='question-". $row["question_id"]. "' class='downvote'>Down</button>";
				echo "<br><br>";
			}
		} 
	?>
	
</body>
<script type="text/javascript">
$(".upvote").click(function(){
	var id = $(this).attr('id');
	var arr = id.split("-");
	$.ajax({
            url: "upvote.php", 
            type: "post", //can be post or get
            data: {question: "yes"}, 
            success: function(response){

            }
        });
	alert(arr[1]);
});
$(".downvote").click(function(){
	var id = $(this).attr('id');
	var arr = id.split("-");
	alert(arr[1]);
});
</script>
</html>