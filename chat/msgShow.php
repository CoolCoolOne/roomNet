<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
header('content-type: application/json');
require_once '../logic/connectPDO.php';
require_once './classDefenition.php';

$chat = new ChatContent($pdo);

$chat->selectFromDb();
// $chat-> showEach();
$ArrayMessages = $chat-> getArrayMessages();

// echo ($ArrayMessages);
// $tst = json_encode("hellow");
echo $ArrayMessages;