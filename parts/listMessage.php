<?php
//если выбран пользователь
if (isset($_GET["user"])) {
    echo "<div class=\"user_friend\">";
        //выводим имя конкретного пользователя
        $sql1 = "SELECT * FROM users WHERE id =" . $_GET["user"];
        //выполняем запрос
        $result1 = mysqli_query($connect, $sql1);
        //записываем в переменную массив с данными пользователя
        $friend = mysqli_fetch_assoc($result1); 
        ?>
        <div class="avatar">
            <img src='/css/images/<?php echo $friend["photo"]; ?> '>
        </div>
        <h3><?php echo $friend["name"]; ?></h3>
        <p> <?php
        if ($friend["online"] == "1") {
            echo "online";
        } else {
            $data = explode(" ", $friend["data_online"]);
            if($data[0] == date("Y-m-d")) {
                $time = explode(":", $data[1]);
               echo "в сети: " . $time[0] . ":" . $time[1]; 
            } else {
                $day = explode("-", $data[0]);
                echo "в сети: " . $day[2] . "." . $day[1] . "." . $day[0];
            }
            
        }
        ?> </p>
        <?php
        $sql2 = "SELECT * FROM `friends` WHERE user_1 =" . $_COOKIE["user_id"];
        //выполняем запрос
        $result2 = mysqli_query($connect, $sql2);
        //записываем в переменную массив с данными пользователя
        $friend_user = mysqli_fetch_assoc($result2); 
        if($friend_user['user_2'] != $_GET["user"]) {
        ?>
        <div data-link="http://chat.local/modules/addFriends.php?user=<?php echo $friend["id"]; ?>" onclick="addFriend(this)">Добавить в друзья</div>
        <?php } else { ?>
            <div data-link="http://chat.local/modules/delete_friends.php?user=<?php echo $friend["id"]; ?>" onclick="deleteFriend(this)">Удалить из друзей</div>   
    <?php
    }
    echo "</div>";

    echo "<div class=\"sms\">";
        echo "<ul>";
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
            $i = $col_sms;
            //пока не достигнется количества результатов
            while ($i > 0) {
                //преобразовываем полученный результат в ассоциативный массив
                $sms = mysqli_fetch_assoc($result); ?>
                <li>
                    <div class='contentSMS' <?php if($sms['id_user'] == $_COOKIE['user_id']) {?> style="float: right" <?php } ?> >
                        <p style="margin-left: 10px"> <?php echo $sms["text"]; ?></p>
                        <p class="right"> <?php echo $sms["time"]; ?></p>
                    </div>
                </li> <?php
                $i--;
            }
            echo "</ul>";
        echo "</div>";
    } else { } ?>
