<?php require 'databaseconnection.php';
require 'header.php';

$displayMatches = $connectDatabase->prepare('SELECT m.*, t.team_name team1, t2.team_name team2 FROM matches m LEFT JOIN teams t ON m.team1_id = t.team_id LEFT JOIN teams t2 ON m.team2_id = t2.team_id ORDER BY date_of_match ASC;');
$displayMatches->execute();

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

		<ul class="comments">
			<?php if (isset($_GET['matchId'])){ ?>
				<li>
					<?php $commentsQuery= $connectDatabase->prepare("SELECT * FROM comments INNER JOIN users ON comments.user_id=users.user_id WHERE comments.match_id= AND Status='T'");
					$commentsQuery->execute($_GET);
					foreach ($commentsQuery as $cmt) { ?>					
						<blockquote>					
							<?php 	echo $cmt['comment']  ?>
						</blockquote>
						<p class="commentator"><a href="comments.php?userCommentId=<?php echo $cmt['user_id'] ?>">By: <?php echo $cmt['user_firstname']; ?></a></p>
			</li>
		<?php } } ?>
		</ul>
		<a href="user_match.php?matchId=<?php echo $matchess['match_id'] ?>" class="expand"> More </a>
		<hr />
	<?php } ?>
</main>		

<?php require 'footer.php'; ?>