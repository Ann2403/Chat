<?php
// подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

// делаем запрос к БД на удаление в таблице friends от авторизованому пользователю выбраного
$sql = "DELETE FROM friends WHERE user_1=" . $_COOKIE["user_id"] . " AND user_2=" . $_GET["user"];
// если запрос обработан
if(mysqli_query($connect, $sql)) {
	// переходим на главную страницу сохраняя переданого пользователя через GET-запрос
	header ('Location:/index.php?user=' . $_GET["user"]);
	// если нет
} else {
	// выводим ошибку
	echo "<h2>Произошла ошибка</h2>";
}
?>