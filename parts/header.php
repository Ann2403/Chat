<div class="header">
	<div class="logo">
		<img src="/css/images/logo.png"> <span><b>CAT</b><i>chat</i></span>
	</div>

    <div class="menu">
	<?php if(isset($_COOKIE["user_id"])) { ?>
        <a href="#" id="contact">Контакты</a>
        <a href="#">Настройки</a>
        <?php 
        $sql = "SELECT * FROM users WHERE id=" . $_COOKIE["user_id"];
        $result = mysqli_query($connect, $sql);
        $user = mysqli_fetch_assoc($result);
        ?>
        <!-- Сделать вывод иконки пользователя при авторизации не убирая кнопку выход-->
        <a href="/modules/exit.php"><?php echo $user["name"]; ?></a>
    <?php } else { ?>
        <a href="#" id="open" onclick="openModal(0)">Войти</a>
    <?php } ?>
    </div>
</div>