<?php require 'databaseconnection.php';
require 'header.php';


if (isset($_SESSION['userSession'])) {
		header('Location:index.php');
}	

//for checking wether any important field is left empty or not
if(isset($_POST['registerUser'])){ //return true if the button named 'registerUser' is pressed
	unset($_POST['registerUser']); //removes the value of the key in the arreay

	global $errMsg; //declaring the global variable
	$errMsg='';

	if(($_POST['user_firstname']=='' )){ 
		$errMsg.='<p> Please fill out the firstname </p>'; //appends the $errMsg variable with the given message if the user_firstname is empty
	}
	if(($_POST['user_surname']=='' )){
		$errMsg.= '<p>Please fill out the surname</p>';//appends the $errMsg variable with the given message if the user_surname is empty
	}
	if(($_POST['user_password']=='' )){
		$errMsg.= '<p>Please fill out the password</p>';//appends the $errMsg variable with the given message if the user_password is empty
	}
	if(($_POST['user_email']=='' )){
		$errMsg.= '<p>Please fill out the email</p>';//appends the $errMsg variable with the given message if the user_email is empty
	}
	if(($_POST['user_address']=='' )){
		$errMsg.= '<p>Please fill out the address</p>';//appends the $errMsg variable with the given message if the user_address is empty
	}
	if(($_POST['user_phonenumber']=='' )){
		$errMsg.= '<p>Please fill out the Phone Number</p>';//appends the $errMsg variable with the given message if the user_phonenumber is empty
	}



	$findEmailWhenBtnPressed =$connectDatabase->prepare("SELECT * FROM users WHERE user_email =:user_email");
	$userEmail=[
		'user_email' =>$_POST['user_email']
	];

	$findEmailWhenBtnPressed->execute($userEmail);
	if($findEmailWhenBtnPressed->rowCount() == 1){
		$errMsg.='<p> Sorry, you already have an account</p>';
	}

	if(empty($errMsg)){
		$registerUserQuery="INSERT INTO users(user_id,user_firstname,user_surname,user_email,user_password,user_address,user_phone_Number) VALUES('',:user_firstname,:user_surname,:user_email,:user_password,:user_address,:user_number)";
		$register =$connectDatabase->prepare($registerUserQuery);

		$registerField =[

			'user_firstname' => $_POST['user_firstname'],
			'user_surname' => $_POST['user_surname'],
			'user_email' => $_POST['user_email'],
			'user_password' => password_hash($_POST['user_password'], PASSWORD_DEFAULT),
			'user_address' => $_POST['user_address'],
			'user_number' => $_POST['user_phonenumber'],
		];

		if($register->execute($registerField)){
			echo "Succesfuly account registered!";
		}
	}
		else{
			echo $errMsg;
		}
}

if (isset($_POST['loginButton'])) {
	unset($_POST['loginButton']);
	$key=$_POST['user_password'];
	unset($_POST['user_password']);

	$checkLogin=$connectDatabase->prepare('SELECT * FROM users WHERE user_email =:user_email');

	$checkLogin->execute($_POST);

	if ($checkLogin->rowCount() == 1) {
		$findUser=$checkLogin->fetch();
		if (password_verify($key, $findUser['user_password'])) {
			$_SESSION['userSession']=$findUser['user_id'];
			header('Location:index.php');
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

	<div class="main_login_register">
		<div class="left_register">
			<form action="user_login_register.php" method="POST">
			<h1>Register an Account</h1><br>
			Firstname: <input class="login_register" type="text" name="user_firstname"/> <br><br>
			Surname: <input class="login_register"  type="text" name="user_surname"/> <br><br>
			Email: <input class="login_register"  type="email" name="user_email"/> <br><br>
			Password: <input class="login_register"  type="password" name="user_password"/> <br><br>			
			Address: <input class="login_register"  type="text" name="user_address"/> <br><br>
			Phone Number: <input class="login_register"  type="number" name="user_phonenumber"/> <br><br>
			<input  type="submit" value="Register" name="registerUser">
			
		</form>
		</div>
		<hr>
		<div class="right_login">
			<form action="" method="POST">
			<h1>User Login</h1><br>
			Email: <input class="login_register"  type="email" name="user_email"/><br><br>
			Password: <input class="login_register"  type="password" name="user_password"/><br><br>			
			<input  type="submit" value="login" name="loginButton">			
		</form>
		</div>
	</div>
<?php require 'footer.php'?>
