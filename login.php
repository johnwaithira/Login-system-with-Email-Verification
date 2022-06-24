
<?php
    require_once __DIR__."/php/db.php";

    $db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="http://127.0.0.1/shoetailor/ke/css/style.css">
</head>
<body>
   <div class="body">
    <div class="form m-20">
        <div class="form-box col-4 col-s-8 m-a">
            <div class="p-20 box-shadow1">
                <form id="loginform" class=" p-10 m-t-20">
                    <div class="form-head p-20-0">
                        <h1 class="color_fade">Login</h1>
                    </div>
                    <div class="b-one p-5-15 m-10-0 ">
                        <input type="text" id="email" placeholder="Email" class="f-s-17 b-n outline-none p-10-15 w-p-100">
                    </div>
                    <input name='token' id='token' value='589f8d597e123653739c31246ff392b9' type= 'hidden'>                    <div class="b-one p-5-15 m-10-0 display-flex" style="align-items: center;">
                        <input type="password" style="flex: 1;" id="password" placeholder="Password" class="f-s-17 b-n pass outline-none p-10-15 w-p-100">
                        <img id="passwordimg"  onclick="tooglepassword()" class="w-25 m-r-10" style="filter:blur(1px); cursor: pointer;" src="">
                    </div>
                    <div class="btn p-t-30">
                        <button id="btnlogin" type="submit" class="p-15-25 b-one bg-inherit">Login</button>
                    </div>
                    <div class="prompts p-10-5">
                        <div class="forgot-password p-20-0">
                        </div>
                        <hr>
                        <div class="create-account p-10-0">
                            <p>Don't have an account ?<a href="/signup.php" class="a" style="color: blue !important;"> Create</a></p>
                        </div>
                        <div id="loader">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>

        let ptoogle = document.getElementById("password");
        let ptoogleimg = document.getElementById("passwordimg");

        function tooglepassword()
        {
            if(ptoogle.type == "password")
            {
                ptoogleimg.src = ``;
                ptoogle.type = "text";
            }else{
                ptoogleimg.src = ``;
                ptoogle.type = "password";
            }

        }
       </script>
</body>
</html>
