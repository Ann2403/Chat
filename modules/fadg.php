<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

//делаем запрос к БД на изменение значения поля online на 0 в строке где id=значению с кук
$sql = "UPDATE `users` SET `online` = '0', `data_online` = NOW() WHERE `id` =" . $_COOKIE["user_id"];
mysqli_query($connect, $sql);
?>