<?php
if (isset($_POST['login'])) {
    include "db.php";

    $query = "SELECT * FROM `users` where 1";
    
    $query_run = mysqli_query($conn, $query);

    $username = $_POST['username'];
    $password = $_POST['password'];


    while ($row = mysqli_fetch_assoc($query_run)) {
        
        $usernameDB = $row['username'];
        $passwordDB = $row['password'];
        
        if ($usernameDB == $username && $passwordDB == $password) {
            echo "all clear";
            break;
        } else {

            echo "not clear";
            continue;
        }
    }

}

if (isset($_POST['register'])) {
    include 'register.php';
}
