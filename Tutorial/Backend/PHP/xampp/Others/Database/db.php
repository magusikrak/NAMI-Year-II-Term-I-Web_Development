<?php
$host = 'localhost:3306';
$db_user = 'root';
$db_pass = '';
$db_name = 'loginapp';
$table_name = 'users';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);
if (!$conn) {
    echo "disconnected";
}
else{
    echo "connected";
}
