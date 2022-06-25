<?php

require_once "./php/App.php";

$app = new App();
$app::session();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./logout.php">Logout</a>

    <h1>Welcome <?php $app::user()?></h1>
</body>
</html>