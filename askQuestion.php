<?php
	include 'checkUser.php';  
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

<div class="wrap">
	<div class="w3-card-4" style="width:100%;">
 		
		<header class="w3-container w3-blue">
		<div class="head">
		  <h1 href="index.php" class="logo">Quart</h1>
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
	<form class="w3-container w3-card-4" action="addQuestion.php" method="POST" style="padding: 10px;">
				<p>
				<label class="w3-label">Type your question here</label>
				<textarea class="w3-input w3-border" name="question"></textarea>
				<input id="anonymous" class="w3-check" type="checkbox" name="anonymous">
				    <label class="w3-validate">Ask as anonymous</label>
				    <br>
				</p>
				<br>
				  <div class="w3-row">
				  <h3>Tags</h3>
				  <div class="w3-half">
				    <input id="milk" class="w3-check" type="checkbox">
				    <label class="w3-validate">HTML</label>
				    <br>
				    <input id="sugar" class="w3-check" type="checkbox">
				    <label class="w3-validate">CSS</label>
				    <br>
				    <input id="lemon" class="w3-check" type="checkbox">
				    <label class="w3-validate">Lemon</label>
				    <br><br>
				  </div>

				  <div class="w3-half">
				    <input id="male" class="w3-radio" name="gender" value="male" type="checkbox">
				    <label class="w3-validate">Male</label>
				    <br>
				    <input id="female" class="w3-radio" name="gender" value="female" type="checkbox">
				    <label class="w3-validate">Female</label>
				    <br>
				    <input id="unknown" class="w3-radio" name="gender" value="" type="checkbox">
				    <label class="w3-validate"> Don't know (Disabled)</label>
				  </div>
				  </div>

				  <button type="submit" class="btn btn-info btn-lg">SUBMIT</button>
				  
			</form>

</div>

<footer id="footer" class="w3-container w3-blue" style="margin-top: 4%;">
	<p>Copyright &#169 Quart</p>
</footer>
</div>

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

</body>
</html>