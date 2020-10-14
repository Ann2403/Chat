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
	include "parts/header.php";
	if (!isset($_COOKIE["user_id"])) { ?>
	<div class='parent'>
		<div class="hello"></div>
	</div>
	<?php include "parts/modalLogin.php";
	include "parts/modalRegistration.php";
	} else { ?>

	<div class="content">
		<div class="user">
			<form action="http://chat.local/contactSearch.php" metod="POST" class="search">
				<input type="text" name="poisk-text">
				<button id="searchContact">
					<img src="/css/images/search.png">
				</button>
			</form>

			<div class="list">			
				<ul>
				<?php
				//Список пользователей
				include "parts/listUsers.php";
				?>
				</ul>
			</div>
		</div>

		<div class="message">
			<div class="sms">
			<?php
			//Вывод сообщений
			include "parts/listMessage.php";
			?>
			</div>

			
				<?php
					if (isset($_GET["user"])) {?>
						<form id="form" action="/modules/setMessage.php" method="POST">
				
				<input type="hidden" name="id_user_2" value="<?php echo $_GET["user"]; ?>" >
				<input type="hidden" name="id_user" value="<?php echo $_COOKIE["user_id"]; ?>" >
				<textarea name="text"></textarea>
				<button type="submit" id="send_sms">
					<img src="/css/images/sent.png">
				</button>
			</form>
				<?php
					} else {

					}
				?>
			
		</div>
	</div>

	<?php
	//подключение модального окна с контактами
	//include 'moduls/contacts.php'; 

	}
	?>
</body>
</html>