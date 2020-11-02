<?php
//если была нажата кнопка "войти"
if( isset($_POST["account"]) &&
	// и поля email и password не пустые
	$_POST["email"] != "" && $_POST["password"] != ""
) {
	$password = md5($_POST["password"]);
	//делаем запрос к БД на выбор строки где email и password соответствуют введенным
	$sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $password . "'";
	//получаем результат выполнения запроса
	$result = mysqli_query($connect, $sql);
	//инициализируем переменную дя хранения выбранных полей соответствующих запросу
	$col_user = mysqli_num_rows($result);
	//если количество пользователей = 1
	if($col_user == 1) {
		//преобразовуем результат в ассоциативный массив
		$user = mysqli_fetch_assoc($result);
		//создаем куки для хранения данных пользователя
		setcookie("user_id", $user["id"]);
		//делаем запрос к БД на выбор таблицыmessages
		$sql = "SELECT `id_sms` FROM messages"; 
		// выполняем запрос к БД
		$result = mysqli_query($connect, $sql);
		//получаем количество результатов
		$col_sms = mysqli_num_rows($result);
		//создаем куки для хранения общего количества сообщений
		setcookie("id_sms", $col_sms);
		include $_SERVER['DOCUMENT_ROOT'] . "/modules/online.php";
		//если пользователь не 1
	} else {
		//выводим что сообщение
		echo "<h2 class='errorUser'>Логин или пароль введены не верно</h2>";
 	}
}
?>

<div class="modal" id="account_modal">
	<p class="close" onclick='closeModal(0)'>X</p> 

		<form action="#" method="POST">
			<h2>Авторизация</h2>
			<p>
				Введите свой email:<br/>
				<input type="text" name="email">
			</p>

			<p>
				Введите пароль:<br/>
				<input type="password" name="password">
			</p>

			<p>
				<button name='account' type="submit">Войти</button>
				<button id='open' type='button' onclick='openModal(1), closeModal(0)'>Зарегестрироваться</button>		
			</p>
		</form>
</div>