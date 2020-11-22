<?php

$pathDB = "localhost";
$usernameDB = "root";
$passwordDB = 'root22';
$databaseNameDB='myCheck';

$connection = mysqli_connect($pathDB, $usernameDB, $passwordDB,$databaseNameDB);

if ( !$connection) {
   echo $mysqli -> error;
}
else{
   echo "correct";
}