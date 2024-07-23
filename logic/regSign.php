<?php
session_start();
require_once 'connect.php';
require_once 'message.php';

$login = $_POST['login'];
$name = $_POST['name'];
$addr = $_POST['addr'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];

if ($pass === $pass_confirm) {
    $pass = md5($pass);
    // $_FILES['avatar']['name']
    $loadPath = 'uploads/' . time() . '_' . $_FILES['image']['name'];
    $upToDir = '../';
    $successLoad = move_uploaded_file($_FILES['image']['tmp_name'],  $upToDir . $loadPath);
    if (!$successLoad) {
        Message(1);
    } else {
        mysqli_query($connect, "INSERT INTO 
        `users` (`id`, `login`, `full_name`, `email`, `password`, `avatar`) 
        VALUES (NULL, '$login', '$name', '$addr', '$pass', '$loadPath')");
        Message(2);
    };
} else {
    Message(0);
}


// $connect
