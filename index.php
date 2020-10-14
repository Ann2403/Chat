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

	<div id="content">
		<div id="user">
			<form action="http://chat.local/contactSearch.php" metod="POST" id="search">
				<input type="text" name="poisk-text">
				<button id="searchContact">
					<img src="images/search.png">
				</button>
			</form>

			<div id="list">			
				<ul>
				<?php
				//Список пользователей
				include "list.php";
				?>
				</ul>
			</div>
		</div>

		<div id="message">
			<div id="sms">
			<?php
			//Вывод сообщений
			include "add_sms.php";
			?>
			</div>

			<form id="form" action="http://chat.local/add_sms.php" method="POST">
				<?php
					if (isset($_GET["user"])) {
				?>
				<input type="hidden" name="id_user_2" value="<?php echo $_GET["user"]; ?>" >
				<input type="hidden" name="id_user" value="<?php echo $_COOKIE["user_id"]; ?>" >
				<textarea name="text"></textarea>
				<button type="submit" id="send_sms">
					<img src="images/sent.png">
				</button>
				<?php
					} else {

					}
				?>
			</form>
		</div>
	</div>

	<?php
	//подключение модального окна с контактами
	include 'moduls/contacts.php'; 

	}
	?>
</body>
</html>