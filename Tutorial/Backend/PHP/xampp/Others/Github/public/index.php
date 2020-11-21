<?php require 'databaseconnection.php';
require 'header.php';

$displayTeams = $connectDatabase->prepare('SELECT * FROM teams ORDER BY points DESC');
$displayTeams->execute();

$displayMatches = $connectDatabase->prepare('SELECT m.*, t.team_name name1, t2.team_name name2 FROM matches m LEFT JOIN teams t ON m.team1_id = t.team_id LEFT JOIN teams t2 ON m.team2_id = t2.team_id ORDER BY date_of_match ASC ;');
$displayMatches->execute();

?>
<img src="images/randombanner.php"/>
	<main class="home">
		

		<h1>Home Page</h1>

		<p>Welcome to the KickOff League. See how your favourite team is doing and comment on matches.</p>

		<hr />

		<h1>Matches</h1>

		<table class="matches">
			<tbody>
				<?php $counter = 0; ?>
				<?php foreach ($displayMatches as $matchess){
				$counter++ ?>
					<tr>
						<td><?php echo $matchess['name1']; ?></td>
						<td><?php echo $matchess['team1_score']; ?></td>
						<td><?php echo $matchess['name2']; ?></td>
						<td><?php echo $matchess['team2_score']; ?></td>
						<?php if($matchess['team1_score'] > $matchess['team2_score'] ){?>
							<td><?php echo $matchess['name1']?> Wins </td>
						<?php 
						}
						if($matchess['team1_score'] == $matchess['team2_score'] ){ ?>
							<td>Draw</td>

						<?php }if($matchess['team1_score'] < $matchess['team2_score'] ){?>
							<td><?php echo $matchess['name2']?> Wins </td>


						<?php 	}
						?>
						<td><?php echo $matchess['date_of_match'] ?></td>
						<td><a href="user_match.php?matchId=<?php echo $matchess['match_id'] ?>">More</a></td>
						
					</tr>	
				<?php 
					if ($counter == 10) break;
				 } ?>	
			</tbody>
		</table>

		<hr />

		<h1>Team List</h1>

		<table class="teams">
			<thead>
				<tr>
					<td>Team</td>
					<td>Points</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($displayTeams as $teamss) { ?>
							<tr>
							<td><?php echo $teamss['team_name']; ?></td>
							<td><?php echo $teamss['points']; ?></td>
						</tr>							
				<?php } ?>				
			</tbody>
		</table>

		<hr />

		
	</main>

<?php require 'footer.php' ?>

