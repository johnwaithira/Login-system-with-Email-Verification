<?php
    require_once __DIR__."/php/App.php";

    $app = new App();

    if(isset($_POST['verify']))
    {
        
        
    }
    $app::header();
?>
<title>Verify Account</title>
<div class="body">
    <div class="form m-20">
        <div class="form-box col-4 col-s-8 m-a">
            <div class="p-20 box-shadow1">
                <form id="loginform" method="post" class=" p-10 m-t-20">
                    <div class="form-head p-20-0">
                        <h1 class="color_fade">Verify Account</h1>
                    </div>
                    <div class="b-one p-5-15 m-10-0 ">
                        <input type="text" name="email" placeholder="Email" class="f-s-17 b-n outline-none p-10-15 w-p-100">
                    </div>
                    <div class="b-one p-5-15 m-10-0 display-flex" style="align-items: center;">
                        <input type="text" style="flex: 1;" 
                        id="otp"
                        name="otp" placeholder="otp" class="f-s-17 b-n pass outline-none p-10-15 w-p-100">
                    </div>
                    <div class="btn p-t-30">
                        <button id="btnlogin" type="submit" name="login" class="p-15-25 b-one bg-inherit">Login</button>
                    </div>
                    <div class="prompts p-10-5">
                        <div class="forgot-password p-20-0"></div><hr>
                        <div class="create-account p-10-0">
                            <p>Don't have an account ?<a href="./signup.php" class="a" style="color: blue !important;"> Create</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="./password.js"></script>
</body>
</html>