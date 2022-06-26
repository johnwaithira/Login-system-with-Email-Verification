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
    <link rel="stylesheet" href="http://127.0.0.1/shoetailor/ke/css/style.css">

</head>
<body> 
    <div class="p-t-50">
        <div class="b_x w-p-40 m-a">
            <div class="box-shadow">
                <div class="p-10-20">
                    <h3>Welcome <i style="color:green !important;"> @<?php $app::user()?></i></h3>
                    <div class="details">
                        <div class="p-10-0">
                            <hr>
                             <?php 
                                $app::details();
                             ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btns p-t-20">
                <a href="./logout.php"><button class="p-5-15 b-one bg-inherit">
                </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>