<?php
	include 'checkUser.php';  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ask Question</title>
</head>
<body>
	<form action="addQuestion.php" method="POST">
		Question : <input type="text" name="question"><br>
		Tags : <input type="text" name="tags"><br>
		Answer as anonymous : <input type="checkbox" value="yes" name="anonymous"><br>
		<input type="submit" value="Ask Question">
	</form>
</body>
</html>