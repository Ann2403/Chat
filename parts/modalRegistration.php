<?php
//если была нажата кнопка "регистрация"
if( isset($_POST["registration"]) &&
	// и поля email, name и password не пустые
	&& $_POST["email"] != "" && $_POST["password"] != "" && $_POST["name"] != ""
) {
    //делаем запрос к БД на выбор строки где email соответствуют введенным
    $sql = "SELECT * FROM `users` WHERE `email` LIKE '" . $_POST["email"] . "'";
    //получаем результат выполнения запроса
    $result = mysqli_query($connect, $sql);
    //инициализируем переменную дя хранения выбранных полей соответствующих запросу
    $col_user = mysqli_num_rows($result);
    //если количество пользователей больше 0
    if($col_user > 0) {
        //выводим сообщение
        echo "<h2 class='errorUser'>Пользователь уже существует!</h2>";
        //в ином случае
    } else {
        //делаем запрос к БД на добавление новой строки с значениями полей соответствующими введенным
        $sql = "INSERT INTO users (email, password, name) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["name"] . "')";
        //если запрос был выполнен
        if(mysqli_query($connect, $sql)) {
            //выводим сообщение
            echo "<h2 class='errorUser'>Регистрация прошла успешно!</h2>";
            //если нет
        } else {
            //выводим сообщение об ошибке
            echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
        }
    }
	
}
?>

<div class='modal' id="registration_modal">
    <form action="#" method="POST">
        <p class="close" onclick='closeModal(1)'>X</p> 

        <h2>Регистрация</h2>
        <p>
            Введите ваше имя:<br/>
            <input type="text" name="name">
        </p>
        <p>
            Введите свой email:<br/>
            <input type="text" name="email">
        </p>

        <p>
            Введите пароль:<br/>
            <input type="password" name="password">
        </p>

        <p>
            <button name='registration' type="submit">Зарегистрироваться</button>
        </p>
    </form>
</div>
