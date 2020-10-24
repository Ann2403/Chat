<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

//делаем запрос к БД на изменение значения поля online на 0 в строке где id=значению с кук
$sql = "UPDATE `users` SET `online` = '0', `data_online` = NOW() WHERE `id` =" . $_COOKIE["user_id"];
//если запрос был выполнен
if(mysqli_query($connect, $sql)) {
    if(isset($_GET['exit'])) {

    } else {
        //очищаем куки на главной странице
        setcookie("user_id", "", 0, "/");
        setcookie("id_sms", "", 0, "/");
        setcookie("id_sms_now", "", 0, "/");
    }
    //переходим на главную страницу
    header("Location: /");
    //если нет
} else {
    //выводим ошибку
    echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
}
?>