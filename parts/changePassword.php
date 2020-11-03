<?php
// если была нажата кнопка "сменить пароль"
if (isset($_POST["change_password"])) {
    // зашифровываем пароль
    $password = md5($_POST["now_password"]);
    // делаем запрос к БД на выбор текущего пользователя
    $sql_password = "SELECT * FROM `users` WHERE `id` =". $_COOKIE["user_id"];
    // выполняем запрос
    $result_password = $connect->query($sql_password);
    // преобразовываем полученные данных в массив
    $user = mysqli_fetch_assoc($result_password);
    // если пароль совпадает с введеным пользователем
    if ($user['password'] == $password) {
        // проверяем совпадают ли новые пароли между собой
        if ($_POST["new_password1"] == $_POST["new_password2"]) {
            // зашифровываем новый пароль
            $password_new = md5($_POST['new_password1']);
            // если пароли введени одинаковы делаем запрос к БД на изменение пароля
            $sql_change = "UPDATE `users` SET `password` = '" . $password_new . "' WHERE `password` ='". $password . "'";
            // если запрос выполнен
            if(mysqli_query($connect, $sql_change)) {   
                // выводим сообщение
                echo "<h2 class='errorUser'>Пароль успешно изменен</h2>";
                // в ином случае
            } else {
                // выводим сообщение об ошибке
                echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
            }
        } else {
            echo "<h2 class='errorUser'>Пароли не совпадают!</h2>"; 
        }
    } else {
        echo "<h2 class='errorUser'>Текущий пароль введен не верно!</h2>";
    }
}
?>

<form action="#" method="POST">
    <div>
        <label><b>Введите текущий пароль:</b></label>
        <input type="password" name="now_password">
    </div>
    <div>
        <label><b>Введите новый пароль:</b></label>
        <input type="password" name="new_password1">
    </div>
    <div>
        <label><b>Повторите новый пароль:</b></label>
        <input type="password" name="new_password2">
    </div>
    <button name='change_password' type="submit">Сменить пароль</button>
</form>