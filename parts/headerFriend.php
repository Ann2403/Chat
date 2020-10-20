<?php
//если выбран пользователь
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
    $sql2 = "SELECT * FROM `friends` WHERE user_1 =" . $_COOKIE["user_id"] . " AND user_2 =" . $friend["id"];
    //выполняем запрос
    $result2 = mysqli_query($connect, $sql2);
    if(mysqli_num_rows($result2) == 1) {
    ?>
        <a class="btn_friend" href="http://chat.local/modules/delete_friends.php?user=<?php echo $friend["id"]; ?>" >Удалить из друзей</a>
    <?php } else { ?>
        <a class="btn_friend" href="http://chat.local/modules/addFriends.php?user=<?php echo $friend["id"]; ?>" >Добавить в друзья</a>  
<?php
}
echo "</div>";