<?php require 'databaseconnection.php';
require 'header.php';

$displayMatches = $connectDatabase->prepare('SELECT m.*, t.team_name team1, t2.team_name team2 FROM matches m LEFT JOIN teams t ON m.team1_id = t.team_id LEFT JOIN teams t2 ON m.team2_id = t2.team_id WHERE match_id=:matchId ORDER BY date_of_match ASC;');
$displayMatches->execute($_GET);

if(isset($_POST['addComment'])){
	unset($_POST['addComment']);

	$commentFields=[
		'match_id'=>$_GET['matchId'],
		'users_id'=>$_SESSION['userSession'],
		'comment'=>$_POST['userComment'],
		'date_of_comment'=>date('Y-m-d'),		
	];

	$insertComment = $connectDatabase->prepare("INSERT INTO comments(comment_id,match_id,user_id,comment,date_of_comment) VALUES('',:match_id,:users_id,:comment,:date_of_comment) ");
	$insertComment->execute($commentFields);
}


if(isset($_GET['deleteCmt'])){
	$deleteComment = $connectDatabase->prepare("DELETE FROM comments WHERE comment_id=:deleteCmt");
	if($deleteComment->execute($_GET)){
		header('Location:matches.php');	
	};
}

 ?>


<main class="home">

<h1>Match Page</h1>
		<?php foreach ($displayMatches as $matchess) {?>
		<h2><?php echo $matchess['team1']; ?> - <?php echo $matchess['team1_score']; ?> <?php echo $matchess['team2']; ?> -<?php echo $matchess['team2_score']; ?></h2>
		<?php if($matchess['team1_score'] > $matchess['team2_score'] ){?>
							<h4><?php echo $matchess['team1']?> Wins </h4>
						<?php 
						}
						if($matchess['team1_score'] == $matchess['team2_score'] ){ ?>
							<h4>Draw</h4>

						<?php }if($matchess['team1_score'] < $matchess['team2_score'] ){?>
							<h4><?php echo $matchess['team2']?> Wins </h4>

						<?php } ?>

	<?php } ?>
			<ul class="comments">
			<?php if (isset($_GET['matchId'])){ ?>
				<li>
					<?php $commentsQuery= $connectDatabase->prepare("SELECT * FROM comments INNER JOIN users ON comments.user_id=users.user_id WHERE comments.match_id=:matchId AND Status='T'");
					$commentsQuery->execute($_GET);
					foreach ($commentsQuery as $cmt) { ?>					
						<blockquote>					
							<?php 	echo $cmt['comment']  ?>
						</blockquote>
						<p class="commentator"><a href="comments.php?userCommentId=<?php echo $cmt['user_id'] ?>">By: <?php echo $cmt['user_firstname']; ?></a></p>
						<?php
						if(isset($_SESSION['userSession'])){ 	
						if($cmt['user_id'] == $_SESSION['userSession']){ ?>
							<a href="user_edit_comment.php?cmtId=<?php echo $cmt['comment_id'] ?>">Edit</a>
							<a href="user_match.php?deleteCmt=<?php echo $cmt['comment_id']?>">Delete</a><br><br>
								<?php } } ?>

			</li>
			<?php }	}
			if(empty($cmt)){
					echo 'Be the first one to comment';
				} ?>
		</ul><br>

		<script type="text/javascript">
			function displayMsg(){
				alert("You comment will be posted once it is approved");
			}

		</script>


			
		<?php if(isset($_SESSION['userSession'])){ ?>
		<form class="cmt" action="" method="POST">
			<h3>Add Comment</h3> 
			<textarea name="userComment"></textarea>
			<input id="commentBtn" type="submit" name="addComment" value="Post Comment" onclick="displayMsg()">			
		</form>		
		<hr />
	<?php } ?>
</main>	

 <?php require 'footer.php' ?>