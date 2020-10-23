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
		//делаем запрос к БД на изменение значения поля online на 1,где полу id=полю id полученого пользователя
		$sql = "UPDATE `users` SET `online` = '1' WHERE `id` =" . $user['id'];
		//если запрос был выполнен
		if(mysqli_query($connect, $sql)) {
			//создаем куки для хранения данных пользователя
			setcookie("user_id", $user["id"]);
			$sql = "SELECT `id_sms` FROM messages"; 
			// выполняем запрос к БД
			$result = mysqli_query($connect, $sql);
			//получаем количество результатов
			$col_sms = mysqli_num_rows($result);
			setcookie("id_sms", $col_sms);

			//переходим на главную страницу
			header("Location: /");
			//если нет
		} else {
			//выводим ошибку
			echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
		}
		//если пользователей меньше 1
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