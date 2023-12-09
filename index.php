<?php
require_once('src/model/User.php');
require_once('src/services/UserService.php');

$ucontroller = new UserService();

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($requestPath) {
    case '/index.php':
        $ucontroller->index();
    case '/':
        $ucontroller->index();
}
