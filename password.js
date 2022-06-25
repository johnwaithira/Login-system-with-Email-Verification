let ptoogle = document.getElementById("password");
let ptoogleimg = document.getElementById("passwordimg");
function tooglepassword()
{
    if(ptoogle.type == "password"){
        ptoogleimg.src = `http://127.0.0.1/shoetailor/kicks_files/svgs/eye-slash-solid.svg`;
        ptoogle.type = "text";}else{
        ptoogleimg.src = `http://127.0.0.1/shoetailor/kicks_files/svgs/eye-solid.svg`;
        ptoogle.type = "password";}
}

// Prevent form reload

if(window.history.replaceState)
{
    window.history.replaceState(null, null, window.location.href)
}