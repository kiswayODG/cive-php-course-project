<?php 
    if(isset($_POST["logout"])){
        //unset($_COOKIE["jwt"]);
        setcookie("jwt", null, -1);
        header("Location: ../views/administration/login_page.php");
        exit();

    }

?>