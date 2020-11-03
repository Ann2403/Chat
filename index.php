<?php
include "configs/bd.php";
?>
<script defer src="/js/script.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Cat_chat</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>

<body>
	<?php 
	// подключаем шапку сайта
	include "parts/header.php";
	// если пользователь не аворизован(не существуют куки "user_id")
	if (!isset($_COOKIE["user_id"])) { 
	// выводим окно приветсвия
	?>
		<div class='parent'>
			<div class="hello"></div>
		</div>
	<?php 
		// подключаем модальное окно для авторизации
		include "parts/modalLogin.php";
		// и регистрации
		include "parts/modalRegistration.php";
	// если авторизован 
	} else { 
	// выводим основной контент
	?>
		<div class="content">
			<div class="user">
				<form action="/parts/userSearch.php" metod="POST" class="search">
					<input type="text" name="poisk-text">
					<button id="searchContact">
						<img src="/css/images/search.png" alt='Search'>
					</button>
				</form>

				<div class="list">			
					<ul>
					<?php
					// подключаем список пользователей
					include "parts/listUsers.php";
					?>
					</ul>
				</div>
			</div>

			<div class="message">
				<?php // если существует выбранный пользователь(отправленый через GET-запрос)
				// выводим блок с перепиской и подключаем скрипт с ajax-запросами для отправки сообщений
				if (isset($_GET["user"])) {
					// подключаем шапку блока с перепиской
					include "parts/headerFriend.php"; ?>
					<div class="sms">
						<?php // подключаем вывод сообщений
						include "parts/listMessage.php"; 
						?>
					</div>

					<form id="form" action="/modules/setMessage.php" method="POST">
						<input type="hidden" name="id_user_2" value="<?php echo $_GET["user"]; ?>" >
						<input type="hidden" name="id_user" value="<?php echo $_COOKIE["user_id"]; ?>" >
						<textarea name="text"></textarea>
						<button type="submit" id="send_sms">
							<img src="/css/images/sent.png">
						</button>
					</form>
					<script src='js/ajaxSMS.js'></script>
				<?php // если нет то не выводим ничего
				} else { }
				?>
			</div>
		</div>

		<script src='js/searchUser.js'></script>
		<script src='js/online.js'></script>
	<?php
		// подключаем модальное окна с друзьями
		include 'parts/modalFriends.php'; 
	}
	?>
</body>
</html>