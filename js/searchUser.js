// выбираем элемент(форму поиска) на странице
let search = document.querySelector('.search');
// назначаем еа него событие отправки формы
search.onsubmit = function(event) {
    // отменяем действие по умолчанию(перезагрузка страницы)
    event.preventDefault();
    // выбираем элемент(поле input) в форме поиска
    let text = search.querySelector("input"),
    // обьявляем переменную для хранение данных отправляемых POST-запросом
	data = "poisk_text=" + text.value +
            "&searchContact=1",		
    // создаем объект для отправки http запроса
    ajax = new XMLHttpRequest();
    // открываем объект (ссылку) ajax и передаем метод запроса POST и 
    // саму ссылку хранящуюся в search.action
    ajax.open("POST", search.action, false);
    // задаем значение заголовка HTTP запроса
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // отправляем запрос
    ajax.send(data);
    // выбираем элемент(список пользователей) на странице
    let list = document.querySelector('.list ul');
    // заменяем его содержимое на ответ полученый от ajax
	list.innerHTML = ajax.response;
};