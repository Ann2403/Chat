window.addEventListener('unload', function() {
    let aj = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("GET", "http://chat.local/modules/exit.php?exit=", true);
    aj.send();
});

window.addEventListener('load', function() {
    let aj = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("GET", "http://chat.local/modules/online.php?", true);
    aj.send();
});