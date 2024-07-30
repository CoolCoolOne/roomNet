<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
require_once '../logic/message.php';
?>
<form action="./picAddHandler.php" method="post" enctype="multipart/form-data">
    <label for="">Фото для добавления</label>
    <br>
    <input class="input_file" name="imageGL" type="file" placeholder="Загрузите файл">
    <br>
    <br>
    <button type="submit" >Подтвердить!</button>
</form>

<?php
        if (isset($_SESSION['msg'])) {
                echo '<hr>';
                echo '<p class="message">';
                echo $_SESSION['msg'];
                echo '</p>';
                unset($_SESSION['msg']);
                echo '<hr>';
            }
        ?>

Вёрстка в разработке <br>
<a href="./gl.php">назад</a>