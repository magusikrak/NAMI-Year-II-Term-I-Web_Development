<?php

$pathDB = "localhost";
$usernameDB = "root";
$passwordDB = '';
$databaseNameDB='deep';

$connection = mysqli_connect($pathDB, $usernameDB, $passwordDB,$databaseNameDB);

if ( !$connection) {
   echo "error";
}