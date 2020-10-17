<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

if(isset($_GET["user"])){
	$sql = "INSERT INTO friends (user_1, user_2) VALUE ('" . $_COOKIE["user_id"] . "', '" . $_GET["user"] . "')";
	if(mysqli_query($connect, $sql)) {
		include $_SERVER['DOCUMENT_ROOT'] . '/parts/listMessage.php';
	} else {
		echo "<h2>Произошла ошибка</h2>";
	}
}
?>