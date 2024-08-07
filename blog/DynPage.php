<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1000">
    <title>RoomNeto.ru</title>
    <link rel="stylesheet" href="./dyn_style.css">
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
        $idNew = $_GET["id"];

        $news = $pdo->query("SELECT * FROM news WHERE id = '$idNew' ")->fetchAll();

        if ($news['0']['color'] === 0) {
            $colorDB = 'blk';
        } else if ($news['0']['color'] === 1) {
            $colorDB = 'red';
        } else if ($news['0']['color'] === 2) {
            $colorDB = 'grn';
        } else {
            $colorDB = 'blk';
        }
        ?>


        <br>
        <a href="./blog.php">
            <= НАЗАД В БЛОГ</a>
            <br><br>

                <div class="
                <?= $colorDB ?>
                ">

                    <hr>


                    <?php


                    // Добавим переносы
                    $textOrig     = $news['0']['text'];
                    $aims   = array("\r\n", "\n\n", "\n", "\r");
                    $replace = '<br>';
                    $textFormat = str_replace($aims, $replace, $textOrig);
                    ?>


                    <h2>
                        <div class="theme">
                            <?= $news['0']['theme'] ?>
                        </div>
                    </h2>
                    <div class="txt">
                        <?= $textFormat ?>
                    </div>
                    <div class="date">
                        <?= $news['0']['date'] ?>
                    </div>


                    <hr>
                </div>
</body>