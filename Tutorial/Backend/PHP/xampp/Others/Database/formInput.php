<?php
include "db.php";
$username = $_POST["name"];
$password = $_POST['password'];
if($isset=="submit")
{

}
$queryInsert = "INSERT INTO `users`(`username`,`password`) VALUES ('$username','$password')";
$resultInsert = mysqli_query($conn, $queryInsert);

$queryDisplay = "SELECT * FROM users";
$resultDisplay = mysqli_query($conn, $queryDisplay);

while ($result = mysqli_fetch_row($resultDisplay)) {
?>
  <pre>
  <?php
  print_r($result);
  ?>
    </pre>
<?php
}
?>