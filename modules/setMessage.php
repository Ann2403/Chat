<?php 
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

//если существует _POST запрос "text" и он не пустой
if(isset($_POST["text"]) && $_POST["text"] != "" ) {
	//делаем запрос к БД на добавление в таблицу messages полей соответсвующих переданным данным
	$sql = "INSERT INTO messages (`id_user`, `id_user_2`, `text`) VALUES ('" . $_COOKIE["user_id"] . "', '" . $_POST["id_user_2"] . "', '" . $_POST["text"] . "')";
    //выполняем запрос
    mysqli_query($connect, $sql);
    //переходим на главную страницу
    //header("Location: /index.php?user=" . $_POST["id_user_2"] . "");
    include "../parts/listMessage.php";
}
?>