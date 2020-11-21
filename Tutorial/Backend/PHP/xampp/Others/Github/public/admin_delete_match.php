<?php require 'databaseconnection.php';
 require 'admin_header.php'; 

 	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


 if(isset($_GET['deleteMatch'])){
 	  	$delMatch =$connectDatabase->prepare('DELETE FROM matches WHERE match_id = :deleteMatch');
 	  	$delMatch->execute($_GET);
 	  }


$findMatches = $connectDatabase->prepare('SELECT m.*, t.team_name name1, t2.team_name name2 FROM matches m LEFT JOIN teams t ON m.team1_id = t.team_id LEFT JOIN teams t2 ON m.team2_id = t2.team_id ORDER BY date_of_match ASC;');
$findMatches->execute();


 ?>

			<div class="admin-main">
				<h1 class="admin-welcome">Welcome, Admin name</h1>
				<div class="admin-main-content">			
						<main class="home">
							<h1>Delete Matches</h1>

							<table class="matches">
									<tbody>
										<?php foreach ($findMatches as $matchValues) {?>
										<tr>
											<td><?php echo $matchValues['name1']; ?></td>
											<td><?php echo $matchValues['team1_score']; ?></td>
											<td><?php echo $matchValues['name2']; ?></td>
											<td><?php echo $matchValues['team2_score']; ?></td>
											<?php if($matchValues['team1_score'] > $matchValues['team2_score'] ){?>
												<td><?php echo $matchValues['name1']?> Wins </td>
											<?php 
											}
											if($matchValues['team1_score'] == $matchValues['team2_score'] ){ ?>
												<td>Draw</td>

											<?php }if($matchValues['team1_score'] < $matchValues['team2_score'] ){?>
												<td><?php echo $matchValues['name2']?> Wins </td>


											<?php 	}
											?>
											<td><?php echo $matchValues['date_of_match'] ?></td>
											<td><a href="admin_delete_match.php?deleteMatch=<?php echo $matchValues['match_id']?>">Delete</a></td>
											
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
