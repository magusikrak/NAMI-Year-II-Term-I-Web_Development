<?php require 'databaseconnection.php'; //acts as the code of the given file is in this page

	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


$findMatch=$connectDatabase->prepare("SELECT * FROM matches WHERE match_id= :editMatch"); //for selecting the specific team that is selected by the adnin in the edit team page
$findMatch->execute($_GET); //retrives the ID fron the URL
$matchInfo =$findMatch->fetch(); //points the first row of the queired table
extract($matchInfo); //gives the value and the key of the table that is fetched above

if(isset($_POST['editMatch'])){//returns true if the update team button is pressed
	unset($_POST['editMatch']); //removes the values of the submit button in the POST array

	$_POST['editMatch'] = $_GET['editMatch'];//making the array key editMatch by getting it through the URL for executing the update command

	$editMatch = $connectDatabase->prepare('UPDATE matches SET team1_id= :team1, team1_score=:team1_points, team2_id= :team2, team2_score= :team2_points WHERE match_id= :editMatch');//query for updating the specific row of matches table
	if($editMatch->execute($_POST)){ //returns true if the POST array is udpated in the database
		header('Location:admin_edit_match.php'); //directs the page to the specified page 
	}	
}
?>
<form action="" method="POST">
	Select Team 1: <select name="team1">
	<?php
	$getTeams=$connectDatabase->prepare('SELECT * FROM teams');
	$getTeams->execute();
	foreach($getTeams as $teamName){
		if($team1_id == $teamName['team_id']){?>								
	<option value="<?php echo $teamName['team_id']?>" selected><?php echo $teamName['team_name']?></option>					
		<?php } 
		 else{?>
		 	<option value="<?php echo $teamName['team_id'] ?>"><?php echo $teamName['team_name'] ?></option>
		 <?php } } ?>	
		</select>

	Team 1 Points : <input type="number" name="team1_points" value="<?php echo $team1_score ?>"><br>


	Select Team 2: <select name="team2">
	<?php
	$getTeams=$connectDatabase->prepare('SELECT * FROM teams');
	$getTeams->execute();
	foreach($getTeams as $teamName){
		if($team2_id == $teamName['team_id'] ){?>								
	<option value="<?php echo $teamName['team_id']?>" selected><?php echo $teamName['team_name']?></option>					
		<?php } else{?>
		<option value="<?php echo $teamName['team_id'] ?>"><?php echo $teamName['team_name'] ?></option>
		 <?php } } ?>
		</select>


	Team 2 Points : <input type="number" name="team2_points" value="<?php echo $team2_score ?>"><br><br>
	Date of Match : <input type="date" name="dateOfMatch" value="<?php echo $date_of_match ?>">

	<input type="submit" value="Update Match" name="editMatch">							
</form>
