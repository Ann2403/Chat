<?php
// подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT'] . "/configs/bd.php";
// делаем запрос к БД на выбор всех пользователей кроме авторизованого
$sql = "SELECT * FROM users WHERE id!=" . $_COOKIE["user_id"];
//  выполняем sql запрос
$result = mysqli_query($connect, $sql);
// получаем количество результатов
$col_users = mysqli_num_rows($result);
// инициализируем переменную для перебора результатов
$i = 0;
// пока она не достигнет количества результатов
while ($i < $col_users) {
    // преобразовываем полученные данные в массив
    $user = mysqli_fetch_assoc($result);	
    // проверяем содержит ли имя i-го пользователя введенную строку в poisk_text
    $poisk = stripos($user["name"], $_POST["poisk_text"]);
    // если да
    if ($poisk !== false) {
    // выводим данные о пользователе
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
    } 
    // переходм к следующему результату
    $i++;
}
?>