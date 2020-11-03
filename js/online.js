// вешаем на окно обработчик события (покинул ли пользователь страницу)
window.addEventListener('unload', function() {
    // создаем объект для отправки http запроса
    let aj = new XMLHttpRequest();
	// открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("GET", "http://f0476748.xsph.ru/modules/exit.php?exit=", true);
    // отправляем запрос
    aj.send();
});

// вешаем на окно обработчик события (что браузер загрузил HTML и внешние ресурсы)
window.addEventListener('load', function() {
    // создаем объект для отправки http запроса
    let aj = new XMLHttpRequest();
	// открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("GET", "http://f0476748.xsph.ru/modules/online.php?", true);
    // отправляем запрос
    aj.send();
});