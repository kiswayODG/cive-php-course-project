<?php
class Config{
public function getConnect()
{
    $dbms='mysql';
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'shanghai_journey_db';
    $conn = new PDO($dbms,$dbhost,$db, $dbuser, $dbpass);

    if (!$conn) {
        return 'error';
    }
    return $conn;
}
}