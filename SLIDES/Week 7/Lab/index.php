<?php
$host = 'localhost';
$username = 'root';
$password = '';

$dbname = 'week7';
// id name address number
$pdo=new PDO('mysql:host='. $host. ';dbname=' . $dbname, $username, $password,
          [ PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
$newName="sugam";
$newAddress="KTM";
$newNumber=0000000000;          
$result=$pdo->query('SELECT * FROM users');
$pdo->query("INSERT INTO `users`(`id`, `name`, `address`, `number`) VALUES (101,'$newName','$newAddress','$newNumber')");

// foreach ($result as $key){
//     echo $key['id'].'<br>';

// }