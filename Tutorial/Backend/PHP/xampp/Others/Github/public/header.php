<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<meta charset="utf-8" />
		<title>Kick⚽ff - Home</title>
	</head>
	<body>
	<header>
		<section>
			<h1>Kick⚽ff</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="teams.php">Teams</a></li>
			<li><a href="matches.php">Matches</a></li>					
			<?php 
				if(isset($_SESSION['ADMINID'])){?>
				<li><a href="admin_dash.php">Admin Dash</a></li>
				<li><a href="logout.php">Logout</a></li>
			<?php }else{
				if(isset($_SESSION['userSession'])){ 
					$activeUser=$connectDatabase->prepare("SELECT * FROM users WHERE user_id = ".$_SESSION['userSession']);
					$activeUser->execute();	
					$userData=$activeUser->fetch();
					extract($userData); ?>

				<li><a href="index.php"><?php echo $user_firstname ?>'s Account</a></li>
				<li><a href="logout.php">Logout</a></li>
			<?php } else { ?>
					<li><a href="user_login_register.php">Login/Register</a></li>
					<li><a href="admin_login.php">Admin login</a></li>

			<?php } } ?>
		</ul>
 
	</nav>