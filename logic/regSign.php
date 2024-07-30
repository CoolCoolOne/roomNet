<?php
session_start();
require_once 'connect.php';
require_once 'message.php';

$login = $_POST['login'];
// $name = $_POST['name'];
$addr = $_POST['addr'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];
$code = $_POST['code'];

if (($pass === $pass_confirm) and ($code === 'NetFriend')){
    $pass = md5($pass);
    // $_FILES['avatar']['name']
    $loadPath = 'uploads/' . time() . '_' . $_FILES['image']['name'];
    $upToDir = '../';
    $successLoad = move_uploaded_file($_FILES['image']['tmp_name'],  $upToDir . $loadPath);
    if (!$successLoad) {
        Message(1);
    } else {
        mysqli_query($connect, "INSERT INTO 
        `users` (`id`, `login`, `email`, `password`, `avatar`) 
        VALUES (NULL, '$login', '$addr', '$pass', '$loadPath')");
        Message(2);
    };
} else {
    Message(0);
}


// $connect
