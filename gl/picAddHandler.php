<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
require_once '../logic/connectPDO.php';
require_once '../logic/message.php';
?>
<?php
// print_r($_FILES);
$loadPath = 'gl_uploads/' . time() . '_' . $_FILES['imageGL']['name'];
// $upToDir = '../';

$successLoad = move_uploaded_file($_FILES['imageGL']['tmp_name'], $loadPath);
if (!$successLoad) {
    Message(4);
} else {
    // $pdo = new PDO("mysql:host=localhost;dbname=aleksey199;", "aleksey199", "G621h89GGodkk");
    // SQL-выражение для добавления данных
    $loginDB = $_SESSION['user']['login'];
    $sql = "INSERT INTO pictures (img, author) VALUES ('$loadPath', '$loginDB')";
    $pdo->exec($sql);
    // echo $loadPath;
    // print_r ($_FILES['imageGL']);

    //сжатие фото
    define('WEBSERVICE', 'http://api.resmush.it/ws.php?qlty=30&img=');
    // http://roomneto.ru/gl/ + gl_uploads/1722102865_image_2023_07_21T12_16_17_450Z.png
    $s = 'http://roomneto.ru/gl/' . $loadPath;
    $o = json_decode(file_get_contents(WEBSERVICE . $s));

    if (isset($o->error)) {
        echo '<a href="./gl.php">ГАЛЕРЕЯ</a>';
        die('Error with resizing api..');
    }
    // echo $o->dest; //URL of the optimized picture
    // echo '<br>';

    $file = $s;
    $newfile = $o->dest;
    $savePath = '/home/a/aleksey199/RoomNeto_ru/public_html/gl/' . $loadPath;;
    if (!copy($newfile, $savePath)) {
        echo "Не удалось скопировать $file...\n";
        // echo $_SERVER["DOCUMENT_ROOT"];
        //     echo '<br>';
        // echo '<hr>';
        // echo 'ИСПРАВЛЯЮ, (на память мне- НАДО ОТПРАВЛЯТЬ НА ФОРМУ а не по http грузить)';
        // echo '<br>';
        // echo 'Но фотка загрузилась просто не сжалась';
        die('Error with copy');
    }

    //сжатие фото

    header('Location: ./gl.php');
};


?>
<br>
<a href="./gl.php">ГАЛЕРЕЯ</a>

<?php
// function downloadFile ($URL, $PATH) {
//     $ReadFile = fopen ($URL, "rb");
//     if ($ReadFile) {
//         $WriteFile = fopen ($PATH, "wb");
//         if ($WriteFile){
//             while(!feof($ReadFile)) {
//                 fwrite($WriteFile, fread($ReadFile, 7000000 ));
//             }
//             fclose($WriteFile);
//         }
//         fclose($ReadFile);
//     }
// }
?>