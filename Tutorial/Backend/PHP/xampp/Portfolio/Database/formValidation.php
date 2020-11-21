<?php
$username = $_POST["name"];
$password = $_POST['password'];
// $email = $_POST["email"];
// echo $username . $password ;

$host = 'localhost:3306';
$db_user = 'root';
$db_pass = '';
$db_name = 'loginapp';
$table_name = 'users';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);
if($conn)
{
    echo "connected";
}

$query="INSERT INTO `users`(`username`,`password`) VALUES ('$username','$password')";
$result=mysqli_query($conn,$query);
if(!$result)
{
    echo "failed";
}