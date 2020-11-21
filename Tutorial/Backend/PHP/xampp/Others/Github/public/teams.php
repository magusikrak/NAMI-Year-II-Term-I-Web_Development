<?php 
require 'databaseconnection.php';

$getTeams = $connectDatabase->prepare('SELECT * FROM teams ORDER BY points DESC');
$getTeams->execute();

require 'header.php'; ?>


<main class="home">
	<h1>Team List</h1>

		<table class="teams">
			<thead>
				<tr>
					<td>Team</td>
					<td>Points</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($getTeams as $key) { ?>
					<tr>
						<td><a href="team_matches.php?teamMatch=<?php echo $key['team_id'] ?>"><?php echo $key['team_name']; ?></a></td>
						<td><?php echo $key['points']; ?></td>
					</tr>
					
				<?php } ?>
				
				
			</tbody>
		</table>

		<hr />
	
</main>

<?php require 'footer.php';?>


