<?php



    require_once "./php/App.php";

    echo $_SERVER['HTTP_REFERER'];
  ;


    $errors = array();
    
    $app = new App();



    if(isset($_POST['create']))
    {
       
      $app::create($_POST);
      echo $error;
        
    }

    $app::header();
?>

   <title>Create Account </title>

   <div class="body">
    <div class="form m-20-10">
        <div class="form-box col-4 col-s-8 m-a">
            <div class="p-10 box-shadow1 ">
                <form id="signinform" class=" p-10 m-t-20" method="post">
                    <div class="logo-box w-p-100 text-center"></div>
                    <div class="form-head p-20-0"><h1 class="color_fade">Create Acc</h1></div>
                    <div class="name-place display-flex">
                        <div class="Firstname col-6 ">
                            <div class="b-one p-5-15 m-t-5 ">
                                <input type="text" class="b-n outline-none p-10-15 w-p-100" placeholder="Firstname" name="firstname" id="name">
                            </div>
                        </div>
                        <div class="Lastname col-6 ">
                             <div class="b-one p-5-15 m-t-5">
                                <input type="text" class="b-n outline-none p-10-15 w-p-100" placeholder="Lastname" name="lastname" id="sname">
                            </div>
                        </div>
                    </div>
                    <div class="b-one p-5-15 m-t-10 ">
                        <input type="text" id="email" placeholder="Email" class="f-s-17 b-n outline-none p-10-15 w-p-100" name="email">
                    </div>
                    <div class="b-one p-5-15 m-10-0 display-flex" style="align-items: center;">
                        <input type="password" style="flex: 1;" id="password" name="password" placeholder="Password" class="f-s-17 b-n pass outline-none p-10-15 w-p-100">
                        <img id="passwordimg"  onclick="tooglepassword()" class="w-25 m-r-10" style="filter:blur(1px); cursor: pointer;" src="http://127.0.0.1/shoetailor/kicks_files/svgs/eye-solid.svg">
                    </div>
                    <div class="btn p-t-30">
                        <button class="p-10-25 bg-inherit b-one" name="create" id="createbtn">Create</button>
                    </div>
                    <div class="prompts p-10-5">
                        <div class="forgot-password p-20-0"></div><hr>
                        <div class="create-account p-10-0">
                            <p>Already have an account ?<a href="./login.php" class="a" style="color: blue !important;"> Login</a></p>
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
