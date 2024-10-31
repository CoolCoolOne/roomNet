<?php
require_once '../logic/connectPDO.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./manage.css">
    <link rel="icon" href="../logo.ico"><!-- 32×32 -->
    <title>RoomNeto.ru</title>
</head>

<body>

    <?php
    $visit = $pdo->query("SELECT count FROM cards WHERE id=1")->fetchAll();
    if (!isset($_GET["id"])) {
    ?>
    <div>
        <h4>_____ Техническая страница для портала <a href="https://sun-port.ru/">SUNPORT</a> _____ </h4>
        <h5>_____ размещена на сайте: <a href="http://roomneto.ru/">RoomNeto.ru</a> (сайт Алексея) </h5>
        <hr>
        <h5>Пример ссылки для обращению к картинке c обработкой запроса:</h5>
        <br>
        <!-- <a href="http://room.loft:8888/Other/cards.php?id=01">...cards.php?id=01</a> -->
        <a href="https://roomneto.ru/Other/cards.php?id=01">...cards.php?id=01</a>
        <hr>
        <!-- <h4><a href="http://room.loft:8888/Other/cards.php">__Обновить данные!__</a></h4> -->
        <h4><a href="https://roomneto.ru/Other/cards.php">__Обновить данные!__</a></h4>
        <hr>
        <h4>Количество обращений к коллекции картинок (1 клик по рубашке = 1 обращение):</h4>
        <h3><?= '_____ ' . $visit[0]['count'] . ' _____' ?></h3>
        <hr>
        <hr>
        <h4><a href="https://roomneto.ru/Other/cards_tozero.php">__Сброс данных!__</a></h4>
    </div>
    <?php
    } else {

        $count = $visit[0]['count'] + 1;
        $sql = "UPDATE `cards` SET `count` = '$count' WHERE `cards`.`id` = 1;";
        $pdo->exec($sql);

        // $name = $_GET["id"];
        // $name = $name . '.jpg';
        // $loc = $name;
        // header("Location: $loc");
    }

    ?>

</body>

</html>