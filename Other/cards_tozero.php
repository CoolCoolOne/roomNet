<?php

require_once '../logic/connectPDO.php';
$count = 0;
$sql = "UPDATE `cards` SET `count` = '$count' WHERE `cards`.`id` = 1;";
$pdo->exec($sql);

header("Location: ./cards.php");