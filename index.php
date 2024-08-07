<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location: ./room.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomNeto.ru</title>
    <link rel="stylesheet" href="./styleRoom.css">
    <link rel="icon" href="logo.ico"><!-- 32×32 -->
</head>

<body>

    <form action="./logic/authSign.php" method="post">
        <label for="">Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label for="">Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль">
        <button type="submit">Войти!</button>

        <div class="reg">
            Нет аккаунта?
            <a href="./register.php">Зарегистрироваться</a>
        </div>

        <?php
        if (isset($_SESSION['msg'])) {
                echo '<p class="message">';
                echo $_SESSION['msg'];
                echo '</p>';
                unset($_SESSION['msg']);
            }
        ?>


    </form>

</body>

</html>