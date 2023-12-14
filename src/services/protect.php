<?php
// (A) JWT COOKIE NOT SET! 
  
  if ( !isset($_COOKIE["jwt"])) {
    header("Location: /login");
    exit(); 
    }

// (B) VERIFY JWT
 require "UserService.php";
  $service= new UserService();
  $user = $service->validateJWT($_COOKIE["jwt"]);
  if ($user===false || isset($_POST["logout"])) {
    setcookie("jwt", null, -1);
    header("Location: /login");
    exit();
  }

  
?>
