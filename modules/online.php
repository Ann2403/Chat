<?php
// подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

// делаем запрос к БД на изменение значения поля online на 1,где полу id=полю id полученого пользователя
$sql = "UPDATE `users` SET `online` = '1' WHERE `id` =" . $_COOKIE['user_id'];
// выполняем запрос
mysqli_query($connect, $sql);
// переходим на главную страницу
header("Location: /");
?>