<?php
$host = 'localhost:8889';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'programming';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

//insert
$query = "INSERT into `users` (`name`,`email`,`password`) VALUES('Person','email@email1234.com',`password`)";
$query_run = mysqli_query($conn,$query);
if($query_run){
  echo "Data inserted";
}else {
  echo "Not inserted";
}
?>
