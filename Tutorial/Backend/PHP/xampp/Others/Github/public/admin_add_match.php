<?php require 'databaseconnection.php';
	require 'admin_header.php';

	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


	if(isset($_POST['AddMatch'])){
		unset($_POST['AddMatch']);	
		$addMatch = $connectDatabase->prepare("INSERT INTO matches (match_id,team1_id,team2_id,team1_score,team2_score,date_of_match) VALUES('',:team1,:team2,:team1_points,:team2_points,:date_of_match)");
		$criteria=[
			'team1' => $_POST['team1'],
			'team2' => $_POST['team2'],
			'team1_points' => $_POST['team1_points'],
			'team2_points' => $_POST['team2_points'],
			'date_of_match' => $_POST['dateOfMatch']

		];

		// $addMatch->execute($criteria);
		if($addMatch->execute($criteria)){
		header('Location:admin_match.php');
	}
	}
 ?>

			<div class="admin-main">
				<h1 class="admin-welcome">Welcome, Admin name</h1>
				<div class="admin-main-content">			
					<main class="home">
						<h1>Add Matches</h1><br>
						<form action="" method="POST">
							Select Team 1: <select name="team1">
						<?php
							$getTeams=$connectDatabase->prepare('SELECT * FROM teams');
							$getTeams->execute();

							foreach($getTeams as $teamName){?>
								
							<option value="<?php echo $teamName['team_id']?>"><?php echo $teamName['team_name']?></option>
					
				 		<?php } ?>	
				 			</select>

							Team 1 Points : <input type="number" name="team1_points"><br>
							Select Team 2: <select name="team2">

							<?php
							$getTeams=$connectDatabase->prepare('SELECT * FROM teams');
							$getTeams->execute();

							foreach($getTeams as $teamName){?>
								
							<option value="<?php echo $teamName['team_id']?>"><?php echo $teamName['team_name']?></option>
					
				 			<?php } ?>
				 			</select>
							Team 2 Points : <input type="number" name="team2_points"><br><br>
							Date of Match : <input type="date" name="dateOfMatch">


							<input type="submit" value="Add Match" name="AddMatch">

							
						</form>

				

				
					</main>					
				</div>
			</div>
		</div>
<?php require'footer.php'; ?>
