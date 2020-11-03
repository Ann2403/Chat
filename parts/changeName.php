<?php
// если была нажата кнопка "сменить пароль"
if (isset($_POST["change_name"]) && $_POST['new_name'] != "") {
    //  делаем запрос к БД на изменение имени
    $sql_change = "UPDATE `users` SET `name` = '" . $_POST['new_name'] . "' WHERE `id` =". $_COOKIE['user_id'];
    // если запрос выполнен
    if(mysqli_query($connect, $sql_change)) {   
        // выводим сообщение
        echo "<h2 class='errorUser'>Имя успешно изменено</h2>";
        // в ином случае
    } else {
        // выводим сообщение об ошибке
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
}
?>

<form action="#" method="POST">
    <div>
        <label><b>Введите новое имя:</b></label>
        <input type="text" name="new_name">
    </div>
    <button name='change_name' type="submit" style="bottom: 70px;">Сменить имя</button>
</form>