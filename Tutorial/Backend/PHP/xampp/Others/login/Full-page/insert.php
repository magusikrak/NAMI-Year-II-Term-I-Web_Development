<?php
if (isset($_POST['login'])) {
    // echo "login was cicked";
    include 'login.php';
    die();
}
include "db.php";
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
echo $email;

$query = "INSERT INTO `users` (`username`,`password`,`email`) VALUES ('$username','$password','$email')";

$result = mysqli_query($conn, $query);
