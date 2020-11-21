<?php
  include 'db.php';

 //Update Queries
 $query = "UPDATE `users` SET `name` = 'Person Human' WHERE `id`=4";
 $query_run=mysqli_query($conn,$query);

 if($query_run){
   echo "updated";
 }else {
   echo "not updated";
 }
?>
