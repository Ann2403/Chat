<div class="sms">
    <ul>
        <?php
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
            $sms = mysqli_fetch_assoc($result); ?>
            <li>
                <div class='contentSMS' <?php if($sms['id_user'] == $_COOKIE['user_id']) {?> style="float: right" <?php } ?> >
                    <p style="margin-left: 10px"> <?php echo $sms["text"]; ?></p>
                    <p class="right"> <?php echo $sms["time"]; ?></p>
                </div>
            </li> <?php
            $i++;
        } ?>
    </ul>
</div>