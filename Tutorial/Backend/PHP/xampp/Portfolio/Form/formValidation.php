<?php
$nameArr = ["sugam", "don", "mua"];
if (isset($_POST['chicken'])) {
    $name = $_POST["name"];
    // echo $name;
    $password = $_POST['password'];
    $email = $_POST["email"];
    if (in_array(!$name, $nameArr)) {
        echo "name not defined";
    }
    else{
        echo "name Yes";
    }
    // echo $name . $password . $email;
}
