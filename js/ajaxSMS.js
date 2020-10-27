//выбираем элементы на странице:
	//форму отправки сообщения
let form = document.querySelector('#form'), 
	//блок с сообщениями
	sms = document.querySelector('.sms'),
	//выбираем элементы в форме:
	//все скрытые поля input 
	user_1 = form.querySelector("input[name='id_user']"),
	user_2 = form.querySelector("input[name='id_user_2']"),
	//и поле ввода текста
	text = form.querySelector("textarea");

//вызываем функцию передвижения скрола
scrollTop();

//назначаем на форму событие отправки
form.onsubmit = function(event) {
	//отменяем действие по умолчанию(перезагрузка страницы)
	event.preventDefault();

	//обьявляем переменную для хранение данных отправляемых POST-запросом
	data = "text=" + text.value +
			"&id_user=" + user_1.value +
			"&id_user_2=" + user_2.value +
			"&send_sms=1",				
	//создаем объект для отправки http запроса
	ajax = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса POST и 
    //саму ссылку хранящуюся в action формы
	ajax.open("POST", form.action, false);
	//задаем значение заголовка HTTP запроса
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//отправляем запрос
	ajax.send(data);
	//заменяем содержимое блока сообщений на ответ полученый от ajax
	sms.innerHTML = ajax.response;
	//вызываем функцию передвижения скрола
	scrollTop();
	//очищаем поле ввода текста
    document.querySelector('textarea').value = "";
};


//каждые 3 секунды
setInterval(() => {
	//обьявляем переменную для хранение данных отправляемых POST-запросом
    let data = "id_user_2=" + user_2.value,
	//создаем объект для отправки http запроса
	aj = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса POST и саму ссылку 
	aj.open("POST", "http://chat.local/modules/updateSMS.php", false);
	//задаем значение заголовка HTTP запроса
    aj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//отправляем запрос
	aj.send(data);
	
	//создаем массивб выбираем все куки, разделяем их по '; ' и ложим в него
	let arrayCookie = document.cookie.split('; '),
	//создаем переменные хранящие разделенную строку по '='
	//второй ячейки массива с куками и выбираем вторую строку
	cookie1 = arrayCookie[1].split('=')[1],
	//третьей ячейки массива с куками и выбираем вторую строку
	cookie2 = arrayCookie[2].split('=')[1];
	//если эти переменные не равны
	if(cookie1 != cookie2) {
		//перезаписываем значение кук (на главной странице) с именем id_sms соответствующее cookie2
		document.cookie = "id_sms=" + cookie2 + "; path=/";
		//заменяем содержимое блока сообщений на ответ полученый от ajax
		sms.innerHTML = ajax.response;
		//вызываем функцию передвижения скрола
		scrollTop();
	}
}, 3000);

//функция передвижени скрола
function scrollTop() {
	//определяем отступ скрола сверху равный высоте блока прокрутки
	sms.scrollTop = sms.scrollHeight;
}