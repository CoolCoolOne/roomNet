<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
require_once '../logic/connectPDO.php';
$idDel = $_GET["id"];

// удаляем запись в БД о картинке
$pics = $pdo->query("DELETE FROM news WHERE `news`.`id` = '$idDel'");


echo 'Удаляем элемент с id=' . $idDel;
header('Location: ./blog.php');
echo '<br>';
echo '<a href="./blog.php">ГАЛЕРЕЯ</a>';
?>