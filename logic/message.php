<?php
function Message($type)
{
    switch ($type) {
        case 0:
            $_SESSION['authSuc'] = False;
            $_SESSION['msg'] = 'пароли не совпадают!';
            header('Location: ../register.php');
            break;
        case 1:
            $_SESSION['authSuc'] = False;
            $_SESSION['msg'] = 'ошибка при загрузке картинки!';
            header('Location: ../register.php');
            break;
        case 2:
            $_SESSION['authSuc'] = True;
            $_SESSION['msg'] = 'Регистрация прошла успешно! <br> <br> 
            <a href="./index.php"> войти! </a> ';
            header('Location: ../register.php');
            break;
        case 3:
            $_SESSION['authSuc'] = False;
            $_SESSION['msg'] = 'Не верный логин или пароль!';
            header('Location: ../index.php');
            break;
        default:
            $_SESSION['authSuc'] = False;
            $_SESSION['msg'] = 'неизвестная ошибка!';
            header('Location: ../register.php');
    }
}
