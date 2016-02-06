<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<title>Quart</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<body>


	<div class="w3-card-4" style="width:100%;">
 		
		<header class="w3-container w3-blue">
		<div class="head">
		  <a href="index.php"><h1 class="logo">Quart</h1></a>
		  <?php
		  	if(isset($_SESSION["loginError"])){
	 		if(!isset($_SESSION["username"]))
	 			echo "<p class='error'>".$_SESSION["loginError"]."</p>";
	 			unset($_SESSION["loginError"]);
	 		}  
		  ?>
		  <ul class="login">
		  	<li class="ask">
		  		<a href="askQuestion.php">Ask Question</a>
		  	</li>
		  	<li class="userlogin">
		  	<?php
		  		if(isset($_SESSION["username"])){
		  			echo '<a class="logi">'.$_SESSION["username"].'</a>';
		  		}
		  		else{
		  			echo '<a data-toggle="modal" data-target="#login">LOGIN</a>';
		  		}
		  	?>
		  	</li>

		  	<li class="register">
		  	<?php
		  		if(isset($_SESSION["username"])){
		  			echo '<a class="logi" href="logout.php">LOGOUT</a>';
		  		}
		  		else{
		  			echo '<a data-toggle="modal" data-target="#register">REGISTER</a>';
		  		}
		  	?>
		  	</li>
		  </ul>
		  </div>
		</header>
	</div>


<div class="wraper">
	<div class="w3-card" style="width:100%;">
		<header class="w3-container w3-blue">
			<h1>Question</h1>
		</header>
		<div class="w3-container q">
		<?php
			include 'checkUser.php';
			$question_id = $_GET["id"];
			$_SESSION["questionId"] = $question_id;
			include 'opendb.php';
			$sql = "SELECT * FROM quart_questions WHERE question_id='$question_id'";
			$result = mysql_query($sql);
			if($result){
				while($row = mysql_fetch_array($result)){
					echo '<div class="w3-card" style="width: 96%; margin: 10px auto;">';
					echo '<a href="#"><h3 class="question">';
					echo $row["question"].'</h3></a>';
					echo '<p><span>upvote '.$row["upvote"];
						if($row["anonymous"] == 1)
							$user_asked = "anonymous";
						else
							$user_asked = $row["user_asked"];
						echo '</span><span> Asked By - '.$user_asked.'</span></p>';
						echo '</div></div>';
				}
			}
		?>

		<header class="w3-container w3-blue">
			<h2>Answers</h2>
		</header>
		<?php
			$sql = "SELECT * FROM quart_answers WHERE question_id='$question_id'";
			$result = mysql_query($sql);
			if($result){
				while($row = mysql_fetch_array($result)){
					echo '<div class="w3-card" style="width: 90%; margin: 10px auto;">';
					echo '<h3 class="question">';
					echo $row["answer"];
					echo '</h3></a>';
					echo '<p><span>upvote '.$row["upvote"];
					if($row["anonymous"] == 1)
							$user_answered = "anonymous";
						else
							$user_answered = $row["user_answered"];
					echo '</span><span> Answered By - '.$user_answered.'</span></p>';
					echo '</div>';
				}
			}
		?>
			<header class="w3-container w3-blue">
			<h2>Write Answer</h2>
		</header>
			<form action="addAnswer.php" method="POST" class="w3-container w3-card">
				<label class="label">Answer :</label>
				<!-- <input type="text" name="answer"> -->
				<textarea class="w3-input" name="answer" placeholder="Write Your Answer"></textarea>
				<label>Answer as anonymous :</label> 
				<input type="checkbox" value="yes" name="anonymous"><br>
				<input type="text" name="question_id" hidden value=<?php echo $question_id;?>>
				<input type="submit" value="Post">
			</form>
		</div>
	</div>
</div>

<footer id="footer" class="w3-container w3-blue">
	<p>Copyright &#169 Quart</p>
</footer>

<!-- Login Modal -->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form>
          	Username: <input type="text"><br><br>
          	Password: <input type="text">
          	<button type="submit" class="btn btn-info btn-lg">Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
          <form>
          	Username: <input type="text"><br><br>
          	Password: <input type="text"><br><br>
          	Email Id: <input type="text">
          	<button type="submit" class="btn btn-info btn-lg">Register me</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
	$( document ).ready(function() {
		$(".q > div").mouseover(function(){
        	$( this ).addClass("w3-card-2");
	    });
	    $(".q > div").mouseout(function(){
	        $( this ).removeClass("w3-card-2");
	    });
});
</script>

</body>
</html> 
