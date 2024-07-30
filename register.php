<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location: ./room.php');
}
// if(!empty($_SESSION['msg'])) 
//    $message = $_SESSION['msg'];
// Для работы с сессиями на php нужно на каждой странице где будет производиться работа с сессиями написать session_start(), в самом начале, до вывода любой информации на экран.
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>room_reg</title>
    <link rel="stylesheet" href="./styleRoom.css">
</head>

<body>

    <form action="./logic/regSign.php" method="post" enctype="multipart/form-data">
        <label for="">Логин</label>
        <input type="text" name="login" placeholder="Введите логин">

        <!-- <label for="">Полное имя</label>
        <input type="text" name="name" placeholder="Введите имя"> -->

        <label for="">Почта @</label>
        <input type="text" name="addr" placeholder="уКажите почту">

        <label for="">Фото профиля</label>
        <input class="input_file" name="image" type="file" placeholder="Загрузите файл">

        <label for="">Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль">

        <label for="">Повторите пароль</label>
        <input type="password" name="pass_confirm" placeholder="Введите пароль">

        <label for="">ПРИГЛАСИТЕЛЬНЫЙ КОД</label>
        <input type="password" name="code" placeholder="Код">

        <button type="submit" >Регистрация</button>

        <div class="reg">
            Уже есть аккаунт?
            <a href="./index.php">Войти</a>
        </div>

        <?php
        if (isset($_SESSION['msg'])) {
            if ($_SESSION['authSuc'] == True) {
                echo '<p class="SucMessage">';
                echo $_SESSION['msg'];
                echo '</p>';
                unset($_SESSION['msg']);
            } else {
                echo '<p class="message">';
                echo $_SESSION['msg'];
                echo '</p>';
                unset($_SESSION['msg']);
            }
        }
        // if (isset($_SESSION['msg']))
        // {
        //     unset($_SESSION['msg']); //проблема f5
        // }
        ?>




    </form>

</body>

</html>