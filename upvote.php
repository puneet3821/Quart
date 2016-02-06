<?php
   // session started in checkuser.php
    include 'checkUser.php';
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'opendb.php';
		$type = $_POST["type"];
		$id = $_POST["id"];
		if($type == "question"){
			$sql = "SELECT `downvote`, `upvote`, `upvotedBy`, `downvotedBy` FROM `quart_questions` WHERE `question_id`='$id'";
			$result = mysql_query($sql);
			if($result){
				while($row = mysql_fetch_array($result)){
					$user_id = $_SESSION["id"];
					$upvotes = $row["upvote"];
					$downvotes = $row["downvote"];
					$upvotedBy = $row["upvotedBy"];
					$downvotedBy = $row["downvotedBy"];
					$upvoteList = explode(", ", $upvotedBy);
					$downvoteList = explode(", ", $downvotedBy);
					if (($key = array_search($user_id, $downvoteList)) !== false) {
						unset($downvoteList[$key]);
						$downvotes -= 1;
						array_push($upvoteList, $user_id);
						$upvotes += 1;
					}
					else{
						if (($key = array_search($user_id, $upvoteList)) !== false) {
	    					unset($upvoteList[$key]);
	    					$upvotes -= 1; 

						}
						else{
							array_push($upvoteList, $user_id);
							$upvotes += 1;
						}
					}

					$upvotedBy = implode(", ", $upvoteList);
					$downvotedBy = implode(", ", $downvoteList);

					$query = "UPDATE `quart_questions` SET `upvote`='$upvotes', `downvote`='$downvotes', `upvotedBy`='$upvotedBy' , `downvotedBy`='$downvotedBy' WHERE `question_id` = '$id'";
					$res = mysql_query($query);
					if($res){
					}
					else{
						echo "Could Not vote some error occured";
					}
				
				}
			}
		}


		else if($type == "answer"){
			$sql = "SELECT `downvote`, `upvote`, `upvotedBy`, `downvotedBy` FROM `quart_answers` WHERE `answer_id`='$id'";
			$result = mysql_query($sql);
			if($result){
				while($row = mysql_fetch_array($result)){
					$user_id = $_SESSION["id"];
					$upvotes = $row["upvote"];
					$downvotes = $row["downvote"];
					$upvotedBy = $row["upvotedBy"];
					$downvotedBy = $row["downvotedBy"];
					$upvoteList = explode(", ", $upvotedBy);
					$downvoteList = explode(", ", $downvotedBy);
					if (($key = array_search($user_id, $downvoteList)) !== false) {
						unset($downvoteList[$key]);
						$downvotes -= 1;
					}
					else{
						if (($key = array_search($user_id, $upvoteList)) !== false) {
	    					unset($upvoteList[$key]);
	    					$upvotes -= 1; 

						}
						else{
							array_push($upvoteList, $user_id);
							$upvotes += 1;
						}
					}

					$upvotedBy = implode(", ", $upvoteList);
					$downvotedBy = implode(", ", $downvoteList);

					$query = "UPDATE `quart_answers` SET `upvote`='$upvotes', `upvotedBy`='$upvotedBy' , `downvotedBy`='$downvotedBy' WHERE `answer_id` = '$id'";
					$res = mysql_query($query);
					if($res){
					}
					else{
						echo "Could Not vote some error occured";
					}
				
				}
			}
		}
	}  
?>