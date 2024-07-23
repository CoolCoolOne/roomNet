    <?php
    session_start();

    require_once 'connect.php';
    require_once 'message.php';

    $loginAuth = $_POST['login'];
    $passAuth = $_POST['pass'];
    $passAuth = md5($passAuth);

    $check_usr = mysqli_query($connect, "SELECT * FROM `users` 
    WHERE (`login`= '$loginAuth' AND `password`= '$passAuth')");
    if (mysqli_num_rows($check_usr) > 0) {
        $user = mysqli_fetch_assoc($check_usr);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "login" => $user['login'],
        ];
        header('Location: ../room.php');
    } else {
        Message(3);
    }
