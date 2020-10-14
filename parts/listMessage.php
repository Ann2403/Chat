<ul>
    <?php
    //если выбран пользователь
    if (isset($_GET["user"])) {
        //делаем запрос к БД на выбор всех сообщений
        $sql = "SELECT * FROM messages" . 
            // где id отправляемому пользователю = $_GET["user"]
            " WHERE (id_user_2=" . $_GET["user"] . 
            // и отправлено от пользователя с id авторизованого пользователя
                " AND id_user=" . $_COOKIE["user_id"] . ")" . 
                // или отправлено пользователю с id авторизованого пользователя от пользователя с id=$_GET["user"]
                " OR (id_user_2=" . $_COOKIE["user_id"] . "  AND id_user=" . $_GET["user"] . ")"; 
        // выполняем запрос к БД
        $result = mysqli_query($connect, $sql);
        //получаем количество результатов
        $col_sms = mysqli_num_rows($result);
        $i = 0;
        //пока не достигнется количества результатов
        while ($i < $col_sms) {
            //преобразовываем полученный результат в ассоциативный массив
            $sms = mysqli_fetch_assoc($result);
            echo "<li>";
                //выводим имя конкретного пользователя
                $sql = "SELECT photo FROM users WHERE id =" . $sms["id_user"];
                //выполняем запрос
                $user = mysqli_query($connect, $sql);
                //записываем в переменную массив с данными пользователя
                $user = mysqli_fetch_assoc($user);
                echo "<div class=\"avatar\">
                    <img src='/css/images/" . $user["photo"] . "'>
                </div>";
                echo "<p>" . $sms["text"] . "</p>";
                echo "<div class=\"time\">" . $sms["time"] . "</div>";	
            echo "</li>";
            $i++;
        }
    } else { } ?>
</ul>