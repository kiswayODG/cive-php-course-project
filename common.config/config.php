<?php
function getConnect()
{

    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'shanghai_journey_db';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    if (!$conn) {
        return 'error';
    }
    return $conn;
}