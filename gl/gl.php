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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>roomGL</title>
    <link rel="stylesheet" href="./gl_style.css">
</head>

<body>
    <div class="avatar">
        <?= $_SESSION['user']['login'] ?>
        <br>
        <img src="<?= '../' . $_SESSION['user']['avatar'] ?>" alt="avatar">
        <a href="../room.php">На главную</a>
    </div>

    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=room;", "root", "123");
    $pics = $pdo->query("SELECT * FROM pictures ORDER BY date DESC")->fetchAll(PDO::FETCH_ASSOC);
    // print_r($pics);
    ?>

    <div class="background" id="backpic">
        <h1 class="header">Общая галерея</h1>
        <h2 class="subheader">
            <a href="./pic_adder.php">+ Добавить картинку</a>
        </h2>
        <div class="rivers-container">

            <?php
            foreach ($pics as $pic) {
            ?>
                <div class="riverpic">
                    <img src="./<?= $pic['img'] ?>" alt="river1">
                    <div class="time">
                        дата: <?= $pic['date'] ?>
                    </div>
                    <div class="author">
                        автор: <?= $pic['author'] ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="pop_up">
            <span>&times;</span>
            <img src="./imgs/rivers/river_01.jpg" alt="river1">
            <!-- <img src="imgs/rivers/river_01.jpg" alt=""> -->
        </div>
    </div>

    <script>
        document.querySelectorAll('.riverpic img').forEach(img => {
            img.onclick = () => {
                document.querySelector('.pop_up').style.display = 'block';
                document.querySelector('.pop_up img').src = img.getAttribute('src');
            }
        });

        document.querySelector('.pop_up span').onclick = () => {
            document.querySelector('.pop_up').style.display = 'none';
        }
    </script>

</body>

</html>