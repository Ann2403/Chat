<div class="header">
	<div class="logo">
		<img src="/css/images/logo.png"> <span><b>CAT</b><i>chat</i></span>
	</div>

    <div class="menu">
    <?php //если пользователь авторизован
    if(isset($_COOKIE["user_id"])) {
        //проверяем открыта ли страница с настройками
        if (!isset($_GET['settings'])) { 
            //если нет выводим ссылки открывающие модальное окно с друзьями и настройки
            ?>
            <a href="#" id="open" onclick="openModal(0)">Друзья</a>
            <a href="settings.php?settings=">Настройки</a>
        <?php 
        } 
        //делаем запрос к БД на выбор авторизованого пользователя
        $sql = "SELECT * FROM users WHERE id=" . $_COOKIE["user_id"];
        //обрабатываем результат
        $result = mysqli_query($connect, $sql);
        //преобразовываем его в массив
        $user = mysqli_fetch_assoc($result);
        //выводим аватарку пользователя и вешаем на нее ссылку для выхода
        ?>
        <a href="/modules/exit.php" style="padding: 10px 0 0">
            <div class="avatar">
                <img src='/css/images/<?php echo $user["photo"]; ?>'>
            </div>
        </a>
    <?php //если не авторизован
    } else { 
    //выводим ссылку на открытие модального окна авторизации
    ?>
        <a href="#" id="open" onclick="openModal(0)">Войти</a>
    <?php } ?>
    </div>
</div>