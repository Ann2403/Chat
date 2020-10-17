function addFriend(element) {
    var friendsList = document.querySelector('.message');
	//создаем переменную link и присваиваем ей нашу ссылку 
	var link = element.dataset.link;
	//создаем объект для отправки http запроса
	var ajax = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
	ajax.open("GET", link, false);
	//отправляем запрос
	ajax.send();
	//получаем результат (меняем контентв блоке #friend_list)
    friendsList.innerHTML = ajax.response;
}

function deleteFriend(element) {
	var friendsList = document.querySelector('.message');
	//создаем переменную link и присваиваем ей нашу ссылку 
	var link = element.dataset.link;
	//создаем объект для отправки http запроса
	var ajax = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
	ajax.open("GET", link, false);
	//отправляем запрос
	ajax.send();
	//получаем результат (меняем контент в блоке #friend_list)
	friendsList.innerHTML = ajax.response;
}