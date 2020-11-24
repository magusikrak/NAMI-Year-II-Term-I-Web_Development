<?php

$pathDB = "localhost";
$usernameDB = "root";
$passwordDB = 'root22';
$databaseNameDB='myCheck';

// $connection = mysqli_connect($pathDB, $usernameDB, $passwordDB,$databaseNameDB);
// $connection=PDO()
$connection = new PDO("mysql:host=$pathDB;databaseNameDB=myDB", $usernameDB, $passwordDB);
// if ( !$connection) {
//    echo $mysqli -> error;
// }
// else{
//    echo "correct";
// }