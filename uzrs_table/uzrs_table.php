<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
require_once '../logic/connectPDO.php';
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=500">
    <title>roomUzrs</title>
    <link rel="stylesheet" href="./table_style.css">
</head>

<body>

    <?php

    $uzrs = $pdo->query("SELECT `login`,`avatar` FROM `users`")->fetchAll();
    // SELECT DATE_FORMAT('2007-10-04 22:23:00', '%H:%i:%s');
    ?>

    <div class="background">
        <div class="row">
            <div class="avatar">
                <?= $_SESSION['user']['login'] ?>
                <br>
                <img src="<?= '../' . $_SESSION['user']['avatar'] ?>" alt="avatar">
                <a href="../room.php">На главную</a>
            </div>
            <h1 class="header">Все пользователи</h1>

        </div>
        <h2 class="subheader">вообще все...</h2>
        <div class="rivers-container">

            <?php
            foreach ($uzrs as $uzr) {
            ?>
                <div class="riverpic">
                    <img src="../<?= $uzr['avatar'] ?>" alt="avatar">
                    <div class="login">
                        _ <?= $uzr['login'] ?> _
                    </div>
                    <hr>
                </div>
            <?php } ?>


</body>

</html>