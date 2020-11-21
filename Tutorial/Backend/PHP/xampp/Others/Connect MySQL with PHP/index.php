<?php
  $host = 'localhost';
  $db_user = 'root';
  $db_pass = '';
  $db_name = 'loginapp';

  $conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

//Running Queries
  $query = "SELECT * FROM `users` WHERE 1";
  $query_run = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($query_run)){
    echo 'password = ',$rows['username'];
    echo "<br>";
    echo 'password =',$rows['password'];
    echo "<hr>";
  }


?>
