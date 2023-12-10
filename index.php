<?php
session_start();
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

$router->map('GET','/admin',function(){
    $admincontroller = new AdminService();
    $admincontroller->index();
});


$router->map('GET','/admin/users',function(){
    $admincontroller = new AdminService();
    $admincontroller->showUsers();
});

$router->map('GET|POST','/user/[i:id]/edition',function(){
    $admincontroller = new AdminService();
    $admincontroller->editUser();
});

$router->map('GET|POST','/admin/store-user',function(){
    $admincontroller = new AdminService();
    $admincontroller->createUserFromForm();
});

$match = $router->match();
if ($match!==null){
    call_user_func_array($match['target'],$match['params']);
    $match['target']();
}