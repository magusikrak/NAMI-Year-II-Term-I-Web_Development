<?php
    // {$num1,$num2}=
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    if(isset($_POST['submit'])){
        echo $num1*$num2;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="exc1-2.php" method="post">
            <input type="text" name="num1" placeholder="num1">
            <input type="text" name="num2" placeholder="num2">
            <button type="submit" name="submit"></button>

        </form>
    </body>
</html>