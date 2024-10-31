<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
header('content-type: application/json');
require_once '../logic/connectPDO.php';
require_once './classDefenition.php';

// $post = json_decode($_POST['user_id']);

// $postArr = json_decode($_POST);
$postData = json_decode(file_get_contents('php://input'), true);
// $_SESSION['post']=$data;

$idUser = $postData['user_id'];
$text = $postData['text'];

$message = new MessageSend($text,$pdo,$idUser);
$message->emptymsgIF();
// $message->displayObject();
$message->addToDb();

// if (isset($_POST)){
//     // $postArr = json_decode($_POST);
//     // echo (json_encode ('post'));
//     // echo (json_encode ($_POST['user_id']));
//     // echo (json_encode ($_POST['user_id']));
//     echo($postArr['user_id']);
// } else {
//     echo (json_encode ('nopost'));
// }

// echo (json_encode ('user_id'));
// header('Location: ./chat.php');