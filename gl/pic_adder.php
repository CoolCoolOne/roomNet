<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=300">
    <title>managePics</title>
    <link rel="stylesheet" href="./manage.css">
    <link rel="icon" href="../logo.ico"><!-- 32×32 -->
</head>

<body>
    <div>
    <?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: ./index.php');
    }
    $nameUsr = $_SESSION['user'];
    require_once '../logic/message.php';
    require_once '../logic/connectPDO.php';
    $author = $_SESSION['user']['login'];
    // print_r ($author);
    $pics = $pdo->query("SELECT * FROM pictures WHERE author = '$author' ORDER BY date DESC ")->fetchAll();
    ?>
    <h3>Добавление фоток:</h3>
    <form action="./picAddHandler.php" method="post" enctype="multipart/form-data">
        <!-- <label for="">Фото для добавления</label> -->
        <br>
        <input class="input_file" name="imageGL" type="file" placeholder="Загрузите файл">
        <br>
        <br>
        <button type="submit">Подтвердить!</button>
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
    <br>
    <a href="./gl.php">
        <= НАЗАД В ГАЛЕРЕЮ</a>

            <hr>
            <h3>Удаление фоток _<?= $author ?>_</h3>

            <?php
            foreach ($pics as $pic) {
                $imgLitl = substr($pic['img'], 22);
                $dateLitl = substr($pic['date'], 0, -3);
                // $imgLitl = $pic['img'];
                echo 'Добавлено: |' . $dateLitl . '| Имя: |';
                echo $imgLitl . '|';
                $imgGET = $pic['id'];
                // print_r ($pic);
                echo ' <a href="./picDelHandler.php?id=';
                echo $pic['id'];
                echo '">=> УДАЛИТЬ</a> ';
                echo '<br>';
            ?>

            <?php } ?>

            <hr>
        </div>
</body>