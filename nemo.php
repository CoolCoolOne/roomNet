<?php
$host = 'localhost';
$db   = 'aleksey199';
$user = 'aleksey199';
$pass = 'G621h89GGodkk';

// $db   = 'room';
// $user = 'root';
// $pass = '123';


// $port = "3306";
$charset = 'utf8mb4';
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new \PDO($dsn, $user, $pass, $options);