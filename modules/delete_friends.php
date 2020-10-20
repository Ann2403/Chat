<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

if(isset($_GET["user"])){
	$sql = "DELETE FROM friends WHERE user_1=" . $_COOKIE["user_id"] . " AND user_2=" . $_GET["user"];
	if(mysqli_query($connect, $sql)) {
		header ('Location:/index.php?user=' . $_GET["user"]);
	} else {
		echo "<h2>Произошла ошибка</h2>";
	}
}
?>