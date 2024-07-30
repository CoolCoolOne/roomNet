<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
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
    <title>roomGL</title>
    <link rel="stylesheet" href="./gl_style.css">
</head>

<body>

    <?php
    // $pdo = new PDO("mysql:host=localhost;dbname=aleksey199;", "aleksey199", "G621h89GGodkk");
    // $pics = $pdo->query("SELECT * FROM pictures ORDER BY date DESC")->fetchAll(PDO::FETCH_ASSOC);
    // print_r($pics);

    $pics = $pdo->query("SELECT * FROM pictures ORDER BY date DESC ")->fetchAll();
    // SELECT DATE_FORMAT('2007-10-04 22:23:00', '%H:%i:%s');
    ?>

    <div class="background" id="backpic">
        <div class="row">
            <div class="avatar">
                <?= $_SESSION['user']['login'] ?>
                <br>
                <img src="<?= '../' . $_SESSION['user']['avatar'] ?>" alt="avatar">
                <a href="../room.php">На главную</a>
            </div>
            <h1 class="header">Общая галерея</h1>
        </div>
        <h2 class="subheader">
            <a href="./pic_adder.php">+ Добавить картинку (видос пока не добавляется)</a>
        </h2>

        <div class="rivers-container">

            <?php
            foreach ($pics as $pic) {
                $dateLitl = substr($pic['date'], 0, -8);
            ?>
                <div class="riverpic">
                    <img src="./<?= $pic['img'] ?>" alt="river1">
                    <div class="time">
                        <?= $dateLitl ?>
                    </div>
                    <div class="author">
                        автор:
                        <?php
                        if (strlen($pic['author']) > 10) {
                            echo '<br>';
                        }
                        ?>
                        <?= $pic['author'] ?>
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