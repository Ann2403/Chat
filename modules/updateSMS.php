<?php
// подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";

$sqlCOOKIE = "SELECT `id_sms` FROM `messages`" . 
        //  где id отправляемому пользователю = $_GET["user"]
        " WHERE (id_user_2=" . $_POST["id_user_2"] . 
        //  и отправлено от пользователя с id авторизованого пользователя
            " AND id_user=" . $_COOKIE["user_id"] . ")" . 
            //  или отправлено пользователю с id авторизованого пользователя от пользователя с id=$_GET["user"]
            " OR (id_user_2=" . $_COOKIE["user_id"] . " AND id_user=" . $_POST["id_user_2"] . ")"; 
//  выполняем запрос к БД
$resultCOOKIE = mysqli_query($connect, $sqlCOOKIE);
// получаем количество результатов
$colSMS = mysqli_num_rows($resultCOOKIE);
// записываем это значение в куки "id_sms_now"
setcookie("id_sms_now", $colSMS, "", '/');
// если значения обеих кук не равны
if($_COOKIE['id_sms_now'] != $_COOKIE['id_sms']) {
    // подключаем список всех сообщений
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/listMessage.php";
}
?>