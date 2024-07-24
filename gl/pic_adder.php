<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
?>
<form action="./picAddHandler.php" method="post" enctype="multipart/form-data">
    <label for="">Фото для добавления</label>
    <br>
    <input class="input_file" name="imageGL" type="file" placeholder="Загрузите файл">
    <br>
    <br>
    <button type="submit" >Подтвердить!</button>
</form>

Вёрстка в разработке <br>
<a href="./gl.php">назад</a>