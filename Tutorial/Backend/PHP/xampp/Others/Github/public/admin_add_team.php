<?php require 'databaseconnection.php';
	require 'admin_header.php';
	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


	if(isset($_POST['Add'])){
		unset($_POST['Add']);	
		$addTeam = $connectDatabase->prepare("INSERT INTO teams (team_id,team_name,points) VALUES('',:teamname,:points)");
		$criteria=[
			'teamname' => $_POST['team_name'],
			'points' => $_POST['points']
		];

		// $addTeam->execute($criteria);
		if($addTeam->execute($criteria)){
		header('Location:admin_team.php');
	}
	}
 ?>

			<div class="admin-main">
				<h1 class="admin-welcome">Welcome, Admin name</h1>
				<div class="admin-main-content">			
					<main class="home">
						<h1>Add Teams</h1><br>
						<form action="" method="POST">
							Team Name : <input type="text" name="team_name"><br>
							Team Point : <input type="number" name="points"><br><br>
							<input type="submit" value="Add Team" name="Add">

							
						</form>

				

				
					</main>					
				</div>
			</div>
		</div>
<?php require'footer.php'; ?>
