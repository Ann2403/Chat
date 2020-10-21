<div class="header">
	<div class="logo">
		<img src="/css/images/logo.png"> <span><b>CAT</b><i>chat</i></span>
	</div>

    <div class="menu">
    <?php if(isset($_COOKIE["user_id"])) {
        if (!isset($_GET['settings'])) { ?>
            <a href="#" id="open" onclick="openModal(0)">Друзья</a>
            <a href="settings.php?settings=">Настройки</a>
        <?php } 
        $sql = "SELECT * FROM users WHERE id=" . $_COOKIE["user_id"];
        $result = mysqli_query($connect, $sql);
        $user = mysqli_fetch_assoc($result);
        ?>
        <!-- Сделать вывод иконки пользователя при авторизации не убирая кнопку выход-->
        <a href="/modules/exit.php" style="padding: 10px 0 0">
            <div class="avatar">
                <img src='/css/images/<?php echo $user["photo"]; ?>'>
            </div>
        </a>
    <?php } else {?>
        <a href="#" id="open" onclick="openModal(0)">Войти</a>
    <?php } ?>
    </div>
</div>