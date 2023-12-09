<?php
require_once('src/model/User.php');
require_once('src/services/UserService.php');
require_once('src/services/administration/AdminService.php');
require_once('AltoRouter.php');

$router = new AltoRouter();
$page = $_GET['page'] ?? '404';
$admincontroller = new AdminService();

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->map('GET','/',function(){
    $ucontroller = new UserService();
    $ucontroller->index();
});

$router->map('GET','/index',function(){
    $ucontroller = new UserService();
    $ucontroller->index();
});

$match = $router->match();
if ($match!==null){
    $match['target']();
}