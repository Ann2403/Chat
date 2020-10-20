<div class='modal' id="modal_user">
    <p class="close" onclick='closeModal(0)'>X</p> 

    <div class="list">
        <ul>
            <?php
            //делаем запрос к БД на выбор всех строк где значение поля user_1 = id авторизованог опоьзователя
            $sql = "SELECT * FROM friends WHERE user_1=" . $_COOKIE["user_id"];
            //выполняем sql запрос 
            $result = mysqli_query($connect, $sql);
            //получаем количество строк
            $col_users = mysqli_num_rows($result);
            $i = 0;
            //выводим информацию о пользователях пока і меньше количества пользователей
            while ($i < $col_users) {
                //преобразуем полученные данные в массив
                $user = mysqli_fetch_assoc($result);
                //делаем запрос к БД на выбор строки где id = 
                $sql1 = "SELECT * FROM `users` WHERE `id` LIKE '" . $user["user_2"] . "'";
                //получаем результат выполнения запроса
                $result1 = mysqli_query($connect, $sql1);
                $friend = mysqli_fetch_assoc($result1);
                ?>
                <li>
                    <a href='/index.php?user=<?php echo $friend["id"]; ?>'>
                        <div class="avatar">
                            <img src='/css/images/<?php echo $friend["photo"]; ?> '>
                        </div>
                        <h3><?php echo $friend["name"]; ?></h3>
                        <div class='online' <?php if ($friend["online"] == "1") {?> style="background: green" <?php } ?> ></div>	
                    </a>
                </li>
                <?php
                $i++;
            }
            ?>
        </ul>	
    </div>
</div>