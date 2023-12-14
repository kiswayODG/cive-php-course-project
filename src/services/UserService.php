<?php


require_once('src/model/User.php');
require_once('src/repository/UserRepository.php');
require_once('src/repository/NewRepository.php');
require_once('common.config/Connection.php');

class UserService
{
   private  $conect;
   private  $userRepo;
   private $newsRepo;
   public $error = "";

   public function __construct()
   {
      $this->conect = new Connection();
      $this->userRepo = new UserRepository($this->conect->conn());
      $this->newsRepo = new NewRepository($this->conect->conn());

   }

   public function index(){
      $recent_news =  $this->newsRepo->getRecentNews();
      include('src/home.php');
   }

   public function news_details(){

      include('src/news-details.php');
   }
   //use Firebase\JWT\JWT;
public function login($username,$password){
   
   $username=$this->conect->test_input($username);
   $password=$this->conect->test_input($password);
    //$password=password_hash($password , PASSWORD_DEFAULT);
    $user=$this->userRepo->getUserByUsername($username);
    $valid=false;
    //  CHECK PASSWORD
    if(isset($user) ){
       $valid= $user->getPassword()==$password ? true :false;
       var_dump($user);
    }
    //  RETURN JWT IF OK, FALSE IF NOT
    if($valid){
       require "vendor/autoload.php"; 
       $now = strtotime("now"); 
       return Firebase\JWT\JWT::encode([
           "iat" => $now, // Issued at: time when the token was generated
           "nbf" => $now, //  not before - when this token is considered valid
           "exp" => $now + 3600, // expiry - 1 hr (3600 secs) from now in this example
           "jti" => base64_encode(random_bytes(16)), // Json Token Id: an unique identifier for the token
           "iss" => JWT_ISSUER, // issuer "aud" like "your.domain.name" 
           "aud" => JWT_AUD, // audience
           "data" => ["userid" => $user->getId(),"username" => $user->getUsername()] // Data related to the signer user
          ], JWT_SECRET, JWT_ALGO);
    }else{
       $this->error = "Invalid user/password";
       return false;
    }      
   

}

// (G) VALIDATE JWT // RETURN USER IF VALID // RETURN FALSE IF INVALID
public function validateJWT($jwt){
    // (G1) "UNPACK" ENCODED JWT 
    require "vendor/autoload.php";
    try { 
          $jwt = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(JWT_SECRET, JWT_ALGO));
          $valid = is_object($jwt);
     }catch (Exception $e) { 
          $this->error = $e->getMessage();
          return false; 
       }
       // GET USER
       if ($valid) {
          $user = $this->userRepo->getUserById($jwt->data->userid);
          $valid=false;
          if(isset($user) ){
            $valid= $user->getPassword()==$password ? true :false; 
          }
       }
       // (G3) RETURN RESULT
        if ($valid) {
             //unset($user["password"]);
             return $user;
        } else {
             $this->error = "Invalid JWT";
             return false;
        }
}
public function user_login(){

   include_once("src/views/administration/login_page.php");
}

public function login_final(){
   if (isset($_COOKIE["jwt"])) {
           $user = $this->validateJWT($_COOKIE["jwt"]);
           if ($user===false) { setcookie("jwt", null, -1); }
           else { 
             header("Location: /admin"); 
             exit(); 
           }
       }
     // (A2) PROCESS SIGN IN
       if (isset($_POST["username"]) && isset($_POST["password"])) {
         $jwt = $this->login($_POST["username"], $_POST["password"]);
         
         if ($jwt!=false) {
           setcookie("jwt", $jwt);
           header("Location: /admin"); 
           exit();
         }
        //header("Location: /login"); 
        
      }
      
   }   
}

// ( JWT STUFF - CHANGE TO YOUR OWN!
define("JWT_SECRET", "bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=");
define("JWT_ISSUER", "www.luban2.com");
define("JWT_AUD", "www.luban.com");
define("JWT_ALGO", "HS512");

