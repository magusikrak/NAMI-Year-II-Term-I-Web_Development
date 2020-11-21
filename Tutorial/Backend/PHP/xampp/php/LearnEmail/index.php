<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="style.css" /> -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;500;600;700;800&family=Roboto+Slab:wght@200;400;600;900&display=swap" rel="stylesheet" />

    <!-- gives browser instructions about the controlling of the page's dimensions and scaling  -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- linking HTMl file with CSS -->
    <link rel="stylesheet" href="../CSS/contact.css" type="text/css" />

    <!--linking font awesome kit code-->

    <script src="https://kit.fontawesome.com/0f25f5010f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@500&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="../css/loginRegistration.css">
    <!-- Compiled and minified CSS -->



</head>

<body>

    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Account Login</h1>
            </div>
            <div class="form-content">
                <form method="POST" action="send.php">
                    <div class="form-group">
                        <label for="username">Username</label><input type="text" id="username" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><input type="password" id="password" name="password" />
                    </div>
                    <div class="form-group">
                        <label class="form-remember"><input type="checkbox" />Remember Me</label><a class="form-recovery" href="#">Forgot Password?</a>
                    </div>
                    <div class="form-group"><button type="submit" id="loginButton">Log In</button></div>
                </form>
            </div>
        </div>
        <div class="form-panel two">
            <!-- <div class="form-header">
                <h1>Register Account</h1>
            </div> -->
            <div class="form-content">
                <!-- <form method="POST" action="mailto:sugamkarki7058@gmail.com">
                    <div class="form-group">
                        <label for="username">Username</label><input type="text" id="username" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><input type="password" id="password" name="password" />
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label><input type="password" id="cpassword" name="cpassword" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label><input type="email" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <button type="submit" id="registerButton" ">Register</button>
            </div>
          </form> -->
        </div>
      </div>
    </div>

  
                            <script src="../js/jquery.js"></script>
                            <script src="../js/loginRegistration.js"></script>
</body>

</html>