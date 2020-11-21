<?php require 'databaseconnection.php';
 require 'admin_header.php'; 

 	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}



$getTeams = $connectDatabase->prepare('SELECT * FROM teams ORDER BY points DESC');
$getTeams->execute();


$findMatches = $connectDatabase->prepare('SELECT m.*, t.team_name name1, t2.team_name name2 FROM matches m LEFT JOIN teams t ON m.team1_id = t.team_id LEFT JOIN teams t2 ON m.team2_id = t2.team_id ;');
$findMatches->execute();


 ?>

			<div class="admin-main">
				<h1 class="admin-welcome">Welcome, Admin name</h1>
				<div class="admin-main-content">			
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
						<?php foreach ($getTeams as $team) { ?>
							<tr>
							<td><?php echo $team['team_name']; ?></td>
							<td><?php echo $team['points']; ?></td>
						</tr>
							
						<?php } ?>
											
					</tbody>
				</table>

				<hr />
						</main>					
				</div>
			</div>
		</div>
<?php require'footer.php'; ?>
