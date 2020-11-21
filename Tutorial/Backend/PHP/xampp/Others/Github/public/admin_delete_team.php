<?php require 'databaseconnection.php';
 	  require 'admin_header.php'; 

 	  	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}

 	  if(isset($_GET['deleteTeam'])){
 	  	$delTeam =$connectDatabase->prepare('DELETE FROM teams WHERE team_id = :deleteTeam');
 	  	$delTeam->execute($_GET);
 	  }
?>
	<div class="admin-main">
		<h1 class="admin-welcome">Welcome, Admin name</h1>
		<div class="admin-main-content">			
			<main class="home">
				<h1>Delete Teams</h1><br>
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
						$getTeams = $connectDatabase->prepare('SELECT * FROM teams ORDER BY points DESC');
						$getTeams->execute(); 
						foreach ($getTeams as $rows) { ?>
							<tr>
							<td><?php echo $rows['team_name']; ?></td>
							<td><?php echo $rows['points']; ?></td>
							<td><a href="admin_delete_team.php?deleteTeam=<?php echo $rows['team_id']?>">Delete</a></td>
						</tr>							
						<?php } ?>											
					</tbody>
				</table>				
			</main>					
		</div>
	</div>
</div> 	
<?php require 'footer.php' ?>