<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">


<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=700">
    <title>RoomNeto.ru</title>
    <link rel="stylesheet" href="./MyRoom.css">
    <link rel="icon" href="logo.ico"><!-- 32×32 -->
</head>


<body>
    <div class="avatar">
        <img src="<?= $_SESSION['user']['avatar'] ?>" alt="avatar">
        <?= $_SESSION['user']['login'] ?>
    </div>

    <div class="contain">
        <div class="room">
            <!-- $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
        ]; -->



            <?php
            echo 'Добро пожаловать, ' . $_SESSION['user']['login'];
            //  <img class="picGif" src="./imgs/computer.gif" alt="animeComputer"> 
            ?>
            <main>
                <script src="./jsRand/p5.min.js"></script>
                <script src="./jsRand/top.js"></script>
            </main>
            <?php
            echo '<div class="email">';
            echo 'Привет! Алексей приветствует тебя здесь, <br> и благодарит за посещение! <br> Сверху это скрипт на графической библиотеке)';
            echo '</div>';
            ?>



            <a href="logic/logOut.php"> Выход!</a>
        </div>


    </div>
    <div class="menu_container">
        <a href="./gl/gl.php" style="display: block;">
            <div class="hosting">Галерея картинок</div>
        </a>
        <a href="./uzrs_table/uzrs_table.php" style="display: block;">
            <div class="hosting">Другие пользователи</div>
        </a>
        <a href="./blog/blog.php" style="display: block;">
            <div class="hosting">Блог<!-- <a href="./uzrs_table/uzrs_table.php">Блог</a> --></div>
        </a>
        <?php
            if ($_SESSION['user']['is_invited']=='1'){
                ?>

                <a href="./chat/chat.php" style="display: block;">
                <div class="hosting">ЧАТ</div>
                </a>

                <?php
            }
        ?>
        
    </div>


</body>

</html>