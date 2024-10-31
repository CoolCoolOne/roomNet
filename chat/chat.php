<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
    header('Content-type: application/json');
}


require_once '../logic/connectPDO.php';
require_once './classDefenition.php';

error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=500">
    <title>RoomNeto.ru</title>
    <link rel="stylesheet" href="./chat_style.css">
    <link rel="icon" href="../logo.ico"><!-- 32×32 -->
</head>

<body>

    <div class="background">
        <div class="row">
            <div class="avatar">
                <img src="<?= '../' . $_SESSION['user']['avatar'] ?>" alt="avatar">
                <a href="../room.php">На главную</a>
            </div>
            <h1 class="header">ЧАТ</h1>
        </div>

        <div class="chat">
            <div id="messagesBody" class="messages">


                </div>

            </div>
            <div class="sender">
                    <textarea id="inputText" name="text" placeholder="текст сообщения"></textarea>
                    <div id="sendBtn" class = "sendBtn"> <img src="../imgs/send.png" alt="send_message"></div>
            </div>
        </div>
    </div>


</body>

</html>
<script type="text/javascript">
    const user_id = '<?php echo $_SESSION["user"]["id"]; ?>';
</script>
<script src="./send.js"></script>
<script src="./messages.js"></script>