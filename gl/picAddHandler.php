<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
?>
<?php
// print_r($_FILES);
$loadPath = 'gl_uploads/' . time() . '_' . $_FILES['imageGL']['name'];
// $upToDir = '../';
move_uploaded_file($_FILES['imageGL']['tmp_name'], $loadPath);

$pdo = new PDO("mysql:host=localhost;dbname=room;", "root", "123");
// SQL-выражение для добавления данных
$loginDB=$_SESSION['user']['login'];
$sql = "INSERT INTO pictures (img, author) VALUES ('$loadPath', '$loginDB')";
     
$affectedRowsNumber = $pdo->exec($sql);
// echo "В галерею добавлена картинка: $loadPath";
?>
<br>
<a href="./gl.php">ГАЛЕРЕЯ</a>
<?php 
header('Location: ./gl.php');
?>