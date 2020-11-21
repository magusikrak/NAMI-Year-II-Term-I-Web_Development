<?php require 'databaseconnection.php'; //acts as the code of the given file is in this page

	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


$selectTeam=$connectDatabase->prepare("SELECT * FROM teams WHERE team_id= :editTeam"); //for selecting the specific team that is selected by the adnin in the edit team page
$selectTeam->execute($_GET); //retrives the ID fron the URL
$teamInfo =$selectTeam->fetch(); //points the first row of the queired table
extract($teamInfo); //gives the value and the key of the table that is fetched above

if(isset($_POST['editTeam'])){//returns true if the update team button is pressed
	unset($_POST['editTeam']); //removes the values of the submit button in the POST array

	$_POST['editTeam'] = $_GET['editTeam'];//making the array key editTeam by getting it through the URL for executing the update command

	$EditTeam = $connectDatabase->prepare('UPDATE teams SET team_name= :team_name, points=:points WHERE team_id = :editTeam');//query for updating the specific row of teams table
	if($EditTeam->execute($_POST)){ //returns true if the POST array is udpated in the database
		header('Location:admin_edit_team.php'); //directs the page to the specified page 
	}	
}
?>
<form action="" method="POST">
	Team Name : <input type="text" name="team_name" value="<?php echo $team_name  ?>"><br>
	Team Point : <input type="number" name="points" value="<?php echo $points ?>"><br><br>
	<input type="submit" value="Update Team" name="editTeam">							
</form>
