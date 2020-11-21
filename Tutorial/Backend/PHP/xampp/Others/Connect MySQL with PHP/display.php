<?php
  include 'db.php';

//Running Queries
  $query = "SELECT * FROM `users` WHERE 1";
  $query_run = mysqli_query($conn, $query);

?>
