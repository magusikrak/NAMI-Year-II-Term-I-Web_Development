<?php
$username = $_POST['username'];
$password = $_POST['password'];
$conn = mysqli_connect('localhost:3306', 'root', '', 'phpupdate');
if (!$conn) {
    echo "error";
}
// $query="INSERT INTO `users`(`username`,`password`) VALUES ('$username','$password')";
$query = "UPDATE users SET password='gogo' WHERE id=2 ";


$run=mysqli_query($conn, $query);
if($run)
{
    echo "connected";
}
else
{
    echo "not";
}
