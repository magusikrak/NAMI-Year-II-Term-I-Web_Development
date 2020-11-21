<?php 
require 'databaseconnection.php';
 require 'admin_header.php';

	if(!isset($_SESSION['ADMINID'])){	
	header('Location:index.php');
}


  ?>
	<div class="admin-main">
		<h1 class="admin-welcome">Welcome, admin</h1>
		<div class="admin-main-content">			
				<h1 id="fillText">@ADMIN DASHBOARD</h1>		
		</div>
	</div>
</div>
<?php require'footer.php'; ?>
