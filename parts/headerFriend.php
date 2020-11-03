<?php
echo "<div class=\"user_friend\">";
    // делаем запрос к БД на выбор пользователя с id переданным через GET-запрос
    $sql1 = "SELECT * FROM users WHERE id =" . $_GET["user"];
    // выполняем запрос
    $result1 = mysqli_query($connect, $sql1);
    // записываем в переменную массив с данными пользователя
    $friend = mysqli_fetch_assoc($result1); 
    // выводим его данные
    ?>
    <div class="avatar">
        <img src='/css/images/<?php echo $friend["photo"]; ?> '>
    </div>
    <h3><?php echo $friend["name"]; ?></h3>
    <p> 
    <?php // если в столбце "online" таблицы записано значение 1(тоесть пользователь онлайн)
    if ($friend["online"] == "1") {
        // выводим строку
        echo "online";
    // если 0
    } else {
        // разбиваем дату из солбца "data_online" по пробелу
        $data = explode(" ", $friend["data_online"]);
        // если дата(число) совпадаем с текущей
        if($data[0] == date("Y-m-d")) {
            // разбиваем время по :
            $time = explode(":", $data[1]);
            // выводим время в таком формате
            echo "в сети: " . $time[0] . ":" . $time[1]; 
        // если день отличается от текущего    
        } else {
            // разбиваем дату по -
            $day = explode("-", $data[0]);
            // выводим дату в таком формате
            echo "в сети: " . $day[2] . "." . $day[1] . "." . $day[0];
        } 
    }
    ?> 
    </p>
    <?php
    // делаем запрос к БД 
    $sql2 = "SELECT * FROM `friends` WHERE user_1 =" . $_COOKIE["user_id"] . " AND user_2 =" . $friend["id"];
    // выполняем запрос
    $result2 = mysqli_query($connect, $sql2);
    // если количество результатов = 1
    if(mysqli_num_rows($result2) == 1) {
        // выводим ссылку на удаление из друзей
    ?>
        <a class="btn_friend" href="http://f0476748.xsph.ru/modules/deleteFriends.php?user=<?php echo $friend["id"]; ?>" >Удалить из друзей</a>
    <?php // если не = 1
    } else { 
        // выводим ссылку на добавление в друзья
    ?>
        <a class="btn_friend" href="http://f0476748.xsph.ru/modules/addFriends.php?user=<?php echo $friend["id"]; ?>" >Добавить в друзья</a>  
    <?php
    }
echo "</div>";