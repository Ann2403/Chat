<?php
//если была нажата кнопка "сменить пароль"
if (isset($_POST["change_avatar"]) && $_POST['avatar'] != "") {
    // делаем запрос к БД на изменение имени
    $sql_change = "UPDATE `users` SET `photo` = '" . $_POST['avatar'] . "' WHERE `id` =". $_COOKIE['user_id'];
    //если запрос выполнен
    if(mysqli_query($connect, $sql_change)) {   
        //выводим сообщение
        echo "<h2 class='errorUser'>Аватар успешно изменен</h2>";
        //в ином случае
    } else {
        //выводим сообщение об ошибке
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
}
?>

<form action="#" method="POST">
    <label style='margin-left: 40px'><b>Выберите картинку из представленых:</b></label>
    <div id="avatarSettings">
        <?php
        $a = 1;
        while ($a < 10) { ?>
            <div class="avatar" style="margin: 10px">
                <img src='../css/images/user<?php echo $a;?>.png'>
                <input type='radio' onclick="avatarAction(<?php echo $a; ?>)" value='user<?php echo $a;?>.png' name='avatar'>
            </div>
        <?php 
        $a++;
    } ?>
    </div>
    <button name='change_avatar' type="submit">Сменить</button>
</form>
