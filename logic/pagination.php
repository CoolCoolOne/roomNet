<?php
function pagination($pdo, $item_on_page, $curr_page)
{
    $offset = ($curr_page - 1) * $item_on_page;
    $reqBody = "SELECT * FROM pictures ORDER BY date DESC LIMIT $item_on_page OFFSET $offset;";
    $content = $pdo->query($reqBody)->fetchAll();
    return $content;
}

?>

