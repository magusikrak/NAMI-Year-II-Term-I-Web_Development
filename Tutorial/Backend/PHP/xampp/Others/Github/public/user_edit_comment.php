<?php require 'databaseconnection.php';

$editComment = $connectDatabase->prepare("SELECT * FROM comments WHERE comment_id=:cmtId");
$editComment->execute($_GET);
$commentValues = $editComment->fetch();
extract($commentValues);

if(isset($_POST['editComment'])){
	unset($_POST['editComment']);
$_POST['cmtId'] = $_GET['cmtId'];
	$updateComment= $connectDatabase->prepare("UPDATE comments SET comment=:userComment WHERE comment_id=:cmtId");
	if($updateComment->execute($_POST)){
		header('Location:user_match.php?matchId='.$match_id);
		exit();
	} 


}

 ?>


<form action="" method="POST">
	<h3>Edit Comment</h3> 
	<textarea name="userComment" rows="25" cols="55"><?php echo $comment ?></textarea>
	<input id="commentBtn" type="submit" name="editComment" value="Edit Comment">
</form>