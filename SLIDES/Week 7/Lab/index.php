<?php 
$host='localhost';
$user="root";
$password="";
$dbName="formCheck";

// SET DSH

$dsn='mysql:host='.$host.';dbname='.$dbName;

// create a PDO instance
$pdo=new PDO($dsn,$user,$password);

# PDO query
$stmt=$pdo->query('Select * from users');

// output
while($row=$stmt->fetch(PDO::FETCH_ASSOC))

{
    echo $row['id'].'<br>';
} 
