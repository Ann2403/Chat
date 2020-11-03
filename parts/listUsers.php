<?php
$sql = "SELECT * FROM users WHERE id!=" . $_COOKIE["user_id"];
//  выполнить sql запрос в БД
$result = mysqli_query($connect, $sql);
// получить количество результатов
$col_users = mysqli_num_rows($result);
$i = 0;
//  выводим информацию о пользователе пока і меньше количества пользователей
while ($i < $col_users) {
    // преобразовуем полученные данные в массив
    $user = mysqli_fetch_assoc($result);
    ?>
    <a href='/index.php?user= <?php echo $user["id"]; ?>' >
        <li>
            <div class="avatar">
                <img src='/css/images/<?php echo $user["photo"]; ?> '>
            </div>
            <h3><?php echo $user["name"]; ?></h3>
            <div class='online' <?php if ($user["online"] == "1") {?> style="background: green" <?php } ?> ></div>
        </li>
    </a>
    <?php
    $i++;
}
?>