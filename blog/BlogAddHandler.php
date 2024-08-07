<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
require_once '../logic/connectPDO.php';
require_once '../logic/message.php';
?>
<?php

$longText = $_POST['longText'];
$aims   = ("'");
$replace = '"';
$longText = str_replace($aims, $replace, $longText);

$color = $_POST['color'];
$theme = $_POST['theme'];
$theme = mb_convert_case($theme, MB_CASE_UPPER, "UTF-8");

if ($color === 'blk') {
    $colorDB = 0;
} else if ($color === 'red') {
    $colorDB = 1;
} else if ($color === 'grn') {
    $colorDB = 2;
} else {
    $colorDB = 0;
}

if ((!$longText) or (!$theme)) {
    Message(6);
} else {
    $idDB = $_SESSION['user']['id'];
    $sql = "INSERT INTO news (author_id, text, color, theme) VALUES ('$idDB', '$longText', '$colorDB', '$theme')";
    $pdo->exec($sql);
    header('Location: ./blog.php');
};


?>
<br>
<a href="./blog.php">Блог</a>