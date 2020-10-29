<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

//
$sql = "INSERT INTO friends (user_1, user_2) VALUE ('" . $_COOKIE["user_id"] . "', '" . $_GET["user"] . "')";
if(mysqli_query($connect, $sql)) {
	header ('Location:/index.php?user=' . $_GET["user"]);
} else {
	echo "<h2>Произошла ошибка</h2>";
}
?>