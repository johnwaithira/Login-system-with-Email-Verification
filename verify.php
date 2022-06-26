<?php
    require_once __DIR__."/php/App.php";

    $app = new App();

    if(isset($_POST['login']))
    {
        
    $app::login($_POST);
        
    }
?>
<title>Verify Account</title>
    
</body>
</html>