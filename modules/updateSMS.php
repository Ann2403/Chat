<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

$sql = "SELECT `id_sms` FROM messages"; 
// выполняем запрос к БД
$result = mysqli_query($connect, $sql);
//получаем количество результатов
$col_sms = mysqli_num_rows($result);

setcookie("id_sms_now", $col_sms);

if($_COOKIE['id_sms_now'] != $_COOKIE['id_sms']) {
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/listMessage.php";
}
?>
