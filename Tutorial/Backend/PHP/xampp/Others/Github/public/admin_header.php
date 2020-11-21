<?php 
	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<meta charset="utf-8" />
		<title>Kick⚽ff - Admin Dashboard</title>
	</head>
	<body>
<div class="admin-content">
	<div class="admin-aside-menu">
		<p class="admin-tittle">Logged In As Admin</p>
		<ul class="admin-dash-menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="admin_team.php">Teams</a></li>
			<li><a href="admin_add_team.php">Add Teams</a></li>
			<li><a href="admin_edit_team.php">Edit Teams</a></li>
			<li><a href="admin_delete_team.php">Delete Teams</a></li>
			<li><a href="admin_match.php">Matches</a></li>
			<li><a href="admin_add_match.php">Add Match Result</a></li>
			<li><a href="admin_edit_match.php">Edit Match Result</a></li>
			<li><a href="admin_delete_match.php">Delete Match Result</a></li>
			<li><a href="admin_comment.php">Approve Comments</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>

	</div>
