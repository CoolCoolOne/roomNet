<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=300">
    <title>RoomNeto.ru</title>
    <link rel="stylesheet" href="./manage.css">
    <link rel="icon" href="../logo.ico"><!-- 32×32 -->
</head>

<body>
    <div>
        <?php
        session_start();
        if (!$_SESSION['user']) {
            header('Location: ../index.php');
        }
        $nameUsr = $_SESSION['user'];
        require_once '../logic/message.php';
        require_once '../logic/connectPDO.php';
        $author = $_SESSION['user']['login'];
        // print_r ($author);
        // $pics = $pdo->query("SELECT * FROM blog WHERE author = '$author' ORDER BY date DESC ")->fetchAll();
        ?>
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
        <h3>Добавление новости:</h3>
        <form action="./BlogAddHandler.php" method="post">
            <!-- <label for="">Фото для добавления</label> -->
            <br>
            <input type="text" name="theme" placeholder=" ЗАГОЛОВОК">
            <br><br>
            <textarea name="longText" placeholder=" Ваш текст. До 2 000 символов! Теперь переносы и кавычки работают, ура"></textarea>
            <br><br>
            <h4>Выберете цвет блока:</h4>

            <div class="radioBb"><input type="radio" id="Choice1" name="color" value="blk" checked /></div>
            <div class="radioBr"><input type="radio" id="Choice2" name="color" value="red" /></div>
            <div class="radioBg"><input type="radio" id="Choice3" name="color" value="grn" /></div>

            <br><br><br>
            <button type="submit">Отправить!</button>
        </form>

        <br>
        <a href="./blog.php">
            <= НАЗАД В БЛОГ</a>

                <hr>
                <h3>Удаление новостей _<?= $author ?>_</h3>

                <?php

                $MyId = $_SESSION['user']['id'];

                $sql = "SELECT login FROM news INNER JOIN users ON $MyId = news.author_id";
                $usersTab = $pdo->query($sql);
                $usersTab = $usersTab->fetch(PDO::FETCH_ASSOC);

                $news = $pdo->query("SELECT theme,date,id FROM news WHERE author_id = '$MyId' ORDER BY date DESC ")->fetchAll();

                foreach ($news as $new) {
                    $themeDel = $new['theme'];
                    $dateLitl = substr($new['date'], 0, -3);
                    // $imgLitl = $pic['img'];
                    echo 'Добавлено: |' . $dateLitl . '| Имя: |';
                    echo $themeDel . '|';
                    // print_r ($pic);
                    echo ' <a href="./BlogDelHandler.php?id=';
                    echo $new['id'];
                    echo '">=> УДАЛИТЬ</a> ';
                    echo '<br>';
                }
                ?>

                <hr>
    </div>
</body>