<?php
require_once '../../logic/connectPDO.php';
$action = $_GET['action'];
$curr = $_GET['curr'];
$item_on_page = 1;

switch($action) {
    case 'next':
        $news = pagination($pdo,$item_on_page,$curr);
        $cont = json_encode($news);
        echo $cont;
        break;
     case 'pre':
         // Делаем что-то
        break;
}


function pagination($pdo, $item_on_page, $curr_page)
{
    $offset = ($curr_page - 1) * $item_on_page;
    $reqBody = "SELECT * FROM news ORDER BY date DESC LIMIT $item_on_page OFFSET $offset;";
    $content = $pdo->query($reqBody)->fetchAll();
    return $content;
}

?>