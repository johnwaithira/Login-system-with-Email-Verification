let ptoogle = document.getElementById("password");
let ptoogleimg = document.getElementById("passwordimg");
function tooglepassword()
{
    if(ptoogle.type == "password"){
        ptoogleimg.src = `https://johnwaithira.github.io/kicks_files/svgs/eye-slash-solid.svg`;
        ptoogle.type = "text";}else{
        ptoogleimg.src = `http://johnwaithira.github.io/kicks_files/svgs/eye-solid.svg`;
        ptoogle.type = "password";}
}

// Prevent form reload

if(window.history.replaceState)
{
    window.history.replaceState(null, null, window.location.href)
}