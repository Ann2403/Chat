<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

$sqlCOOKIE = "SELECT `id_sms` FROM messages"; 
// выполняем запрос к БД
$resultCOOKIE = mysqli_query($connect, $sqlCOOKIE);
//получаем количество результатов
$colSMS = mysqli_num_rows($resultCOOKIE);

setcookie("id_sms_now", $colSMS, "", '/');

if($_COOKIE['id_sms_now'] != $_COOKIE['id_sms']) {
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/listMessage.php";
}
?>