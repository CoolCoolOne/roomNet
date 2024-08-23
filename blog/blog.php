<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
require_once '../logic/connectPDO.php';
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=500">
    <title>RoomNeto.ru</title>
    <link rel="stylesheet" href="./blog_style.css">
    <link rel="icon" href="../logo.ico"><!-- 32×32 -->
</head>

<body>

    <div class="background">
        <div class="row">
            <div class="avatar">
                <?= $_SESSION['user']['login'] ?>
                <br>
                <img src="<?= '../' . $_SESSION['user']['avatar'] ?>" alt="avatar">
                <a href="../room.php">На главную</a>
            </div>
            <h1 class="header">Блог</h1>
        </div>
        <h2 class="subheader">
            <a href="./blog_manage.php">+ Добавить новость</a>
            |или|
            <a href="./blog_manage.php">- Удалить новость</a>
            <hr>
            <div id="nextPG">Страница</div>
        </h2>

        <?php
        $news = $pdo->query("SELECT * FROM news ORDER BY date DESC ")->fetchAll();
        // $me = $pdo->query("SELECT id FROM news WHERE author_id = '$MyId' ORDER BY date DESC ")->fetchAll();
        ?>

        <?php
        // $myId = $news
        foreach ($news as $new) {
            $author_id = $new['author_id'];
            $sql = "SELECT login, avatar FROM news INNER JOIN users ON users.id = $author_id";
            $usersTab = $pdo->query($sql);
            $usersTab = $usersTab->fetch(PDO::FETCH_ASSOC);
            // echo '<hr>';
            // print_r ($new);
            // echo '<hr>';

            $dateLitl = substr($new['date'], 0, -8);
            $textLitl = substr($new['text'], 0, 200);
        ?>

            <a 
            <?php
            echo ' <a href="./DynPage.php?id=';
            echo $new['id'] . '"';
            ?>
            class="<?php
                        if ($new['color'] === 0) {
                            echo 'publication';
                        } else if ($new['color'] === 1) {
                            echo 'publicationRed';
                        } else if ($new['color'] === 2) {
                            echo 'publicationGrn';
                        } else {
                            echo 'publication';
                        } ?>">
                <div class="avaNew">
                    <img src="<?= '../' . $usersTab['avatar'] ?>" alt="avatar">
                </div>
                <div class="theme">
                <?= $new['theme'] ?>
                </div>
                <div class="beginOFtxt">
                    <?= $textLitl . '...' ?>
                </div>
                <div class="author">
                    <?= $usersTab['login'] ?>
                </div>
                <div class="date">
                    <?= $dateLitl ?>
                </div>

            </a>
        <?php } ?>

</body>

</html>

<script src="./bLogic/reqPage.js" ></script>