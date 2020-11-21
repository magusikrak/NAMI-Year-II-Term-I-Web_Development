<?php require 'databaseconnection.php';
require 'header.php';



if (isset($_SESSION['ADMINID'])) { 
		header('Location:index.php'); 
}	

if (isset($_POST['adminLogin'])) { 

	unset($_POST['adminLogin']); 
	$admin_password=$_POST['ad_password']; 
	unset($_POST['ad_password']); 


	$findAdmin=$connectDatabase->prepare('SELECT * FROM administrator WHERE ad_email =:ad_email');
	$findAdmin->execute($_POST);

	if ($findAdmin->rowCount() == 1) { 
		$adminVlaues=$findAdmin->fetch();
		if (password_verify($admin_password, $adminVlaues['ad_password'])) { 

			$_SESSION['ADMINID']=$adminVlaues['ad_id'];

			header('Location:admin_dash.php');
		}
		else{ 
		echo "Wrong Credentials";
		}
		
	}
	else{ 
		echo "Wrong Credentials";
	}
}
?>
<main>
	<form class="admin-login-form" action="" method="POST">
		<h1 class="admin-login">Admin login</h1><br>
		Email:<br> <input class="admin-login" type="email" name="ad_email"/><br><br>
		Username:<br> <input class="admin-login" type="password" name="ad_password"/><br><br>
		<input type="submit" value="Admin Login" name="adminLogin">		
	</form>
</main>
<?php require 'footer.php' ?>	