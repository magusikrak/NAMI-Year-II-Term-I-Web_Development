<?php
$name=$_POST['fname'];
if (isset($_POST['submit'])) {
    echo "hi".$name;
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
    <form action="exc1.php" method="post">
        <input type="text" name="fname" id="" placeholder="your name">
        <button type="submit" name="submit">Submit</button>
    </form>
    <script src="" async defer></script>
</body>

</html>