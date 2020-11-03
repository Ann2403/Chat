<?php
//  Данные для подключения к БД
$server = "localhost";
$username = "f0476748_chat";
$password = "chat";
$dbname = "f0476748_chat";
//  подключение к базе данных chat
$connect = mysqli_connect($server, $username, $password, $dbname);
// кодировка БД
mysqli_set_charset($connect, "utf8");
?>