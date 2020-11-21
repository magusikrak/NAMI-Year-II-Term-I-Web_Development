<?php  require 'databaseconnection.php';
	   require 'admin_header.php'; 


	   	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}

?>
		<div class="admin-main">
			<h1 class="admin-welcome">Welcome, Admin name</h1>
			<div class="admin-main-content">			
				<main class="home">
					<h1>Edit Teams</h1><br>
					<table class="teams">
						<thead>
							<tr>
								<td>Team</td>
								<td>Points</td>
								<td>Edit</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$editTeams = $connectDatabase->prepare('SELECT * FROM teams ORDER BY points DESC');
							$editTeams->execute(); 
							foreach ($editTeams as $teamValues) { ?>
								<tr>
								<td><?php echo $teamValues['team_name']; ?></td>
								<td><?php echo $teamValues['points']; ?></td>
								<td><a href="edit_team.php?editTeam=<?php echo $teamValues['team_id']?>">Edit</a></td>
							</tr>
								
							<?php } ?>
												
						</tbody>
					</table>
				</main>					
			</div>
		</div>
</div> 	


<?php require 'footer.php' ?>