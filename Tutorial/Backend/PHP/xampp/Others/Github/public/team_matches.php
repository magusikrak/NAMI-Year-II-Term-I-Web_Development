<?php require 'databaseconnection.php';
require 'header.php';

$displayMatches = $connectDatabase->prepare('SELECT m.*, t.team_name team1, t2.team_name team2 FROM matches m LEFT JOIN teams t ON m.team1_id = t.team_id LEFT JOIN teams t2 ON m.team2_id = t2.team_id WHERE m.team1_id=:teamMatch OR m.team2_id=:teamMatch');
$displayMatches->execute($_GET);


 ?>

<main class="home">
<h1>Matches played by the team</h1>
<table class="matches">
			<tbody>
				<?php foreach ($displayMatches as $matchess) {?>
					<tr>
						<td><?php echo $matchess['team1']; ?></td>
						<td><?php echo $matchess['team1_score']; ?></td>
						<td><?php echo $matchess['team2']; ?></td>
						<td><?php echo $matchess['team2_score']; ?></td>
						<?php if($matchess['team1_score'] > $matchess['team2_score'] ){?>
							<td><?php echo $matchess['team1']?> Wins </td>
						<?php 
						}
						if($matchess['team1_score'] == $matchess['team2_score'] ){ ?>
							<td>Draw</td>

						<?php }if($matchess['team1_score'] < $matchess['team2_score'] ){?>
							<td><?php echo $matchess['team2']?> Wins </td>


						<?php 	}
						?>
						<td><?php echo $matchess['date_of_match'] ?></td>
						<td><a href="user_match.php?matchId=<?php echo $matchess['match_id'] ?>">More</a></td>
						
					</tr>	
				<?php } ?>	
			</tbody>
		</table>
</main>		

<?php require 'footer.php'; ?>