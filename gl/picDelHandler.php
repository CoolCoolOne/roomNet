<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
require_once '../logic/connectPDO.php';
$idDel = $_GET["id"];

// удаляем картинку из директорий
$pic = $pdo->query("SELECT img FROM pictures WHERE `pictures`.`id` = '$idDel'");
$php_pic= $pic->fetch(PDO::FETCH_ASSOC);
$deletePath = '/home/a/aleksey199/RoomNeto_ru/public_html/gl/' . $php_pic['img'];
// $deletePath = 'C:/xampp/htdocs/room/gl/' . $php_pic['img']; // localpath

unlink($deletePath);


// удаляем запись в БД о картинке
$pics = $pdo->query("DELETE FROM pictures WHERE `pictures`.`id` = '$idDel'");


echo 'Удаляем элемент с id=' . $idDel;
header('Location: ./gl.php');
echo '<br>';
echo '<a href="./gl.php">ГАЛЕРЕЯ</a>';
?>