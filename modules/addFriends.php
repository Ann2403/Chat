<?php
// подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

// делаем запрос к БД на добавление в таблицу friends к авторизованому пользователю выбраного
$sql = "INSERT INTO friends (user_1, user_2) VALUE ('" . $_COOKIE["user_id"] . "', '" . $_GET["user"] . "')";
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