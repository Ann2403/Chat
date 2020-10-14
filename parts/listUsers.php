<?php
$sql = "SELECT * FROM users WHERE online = 1 AND id!=" . $_COOKIE["user_id"];
// выполнить sql запрос в БД
$result = mysqli_query($connect, $sql);
//получить количество результатов
$col_users = mysqli_num_rows($result);

$i = 0;
// выводим информацию о пользователе пока і меньше количества пользователей
while ($i < $col_users) {
    //преобразовуем полученные данные в массив
    $user = mysqli_fetch_assoc($result);
    echo "<li>";
        echo "<a href='/index.php?user=" . $user["id"] . "'>";
            echo "<div class=\"avatar\">
                <img src='/css/images/" . $user["photo"] . "'>
            </div>";
            echo "<h2>" . $user["name"] . "</h2>";
        echo "</a>";
    echo "</li>";
    $i++;
}
?>