<?php
  $host = 'localhost:8889';
  $db_user = 'root';
  $db_pass = 'root';
  $db_name = 'programming';

  $conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

//Running Queries
  $query = "SELECT * FROM `users` WHERE 1";
  $query_run = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($query_run)){
    echo 'Name = ',$rows['name'];
    echo "<br>";
    echo 'Email =',$rows['email'];
    echo "<hr>";
  }


?>
