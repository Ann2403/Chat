//получаем элементы страницы:
//кнопки открытия модального окна
let btnOpenModal = document.querySelectorAll("#open"),
//кнопки закрытия модального окна
btnCloseModal = document.querySelectorAll(".close"),
//сами модальные окна
modal = document.querySelectorAll(".modal");

//функция открытия модального окна
function openModal(num) {
    //делаем видимым окно переданное в функцию
    modal[num].style.display = "block";
}

//функция закрытия модального окна
function closeModal(num) {
    //делаем невидимым окно переданное в функцию
    modal[num].style.display = "none";
}

/*//функция удаления кук с именем "user_id"
function deleteCookieUser() {
    document.cookie = "user_id=null; max-age=0";
}

isClosed = window.closed;
if(isClosed) {
    let data = "exit=1",
    aj = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("POST", "http://chat.local/modules/exit.php", false);
    aj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    aj.send(data);
} else {
    let aj = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("GET", "http://chat.local/modules/online.php", false);
    aj.send();
}
*/