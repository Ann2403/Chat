let form = document.querySelector('#form'), 
	sms = document.querySelector('.sms');

	scrollTop();
form.onsubmit = function(event) {
	event.preventDefault();

	let user_1 = form.querySelector("input[name='id_user']"),
	user_2 = form.querySelector("input[name='id_user_2']"),
	text = form.querySelector("textarea"),
	data = "text=" + text.value +
	  				"&id_user=" + user_1.value +
	  				"&id_user_2=" + user_2.value +
	  				"&send_sms=1";				

    let ajax = new XMLHttpRequest();
	ajax.open("POST", form.action, false);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send(data);
	sms.innerHTML = ajax.response;
    document.querySelector('textarea').value = "";
};

setInterval(() => {
    var link = "http://chat.local/modules/updateSMS.php",
    user_2 = form.querySelector("input[name='id_user_2']"),
    data = "id_user_2=" + user_2.value,
	//создаем объект для отправки http запроса
	aj = new XMLHttpRequest();
	//открываем объект (ссылку) ajax и передаем метод запроса GET и саму ссылку link
    aj.open("POST", link, false);
    aj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//отправляем запрос
	aj.send(data);
	
	let arrayCookie = document.cookie.split('; '),
	cookie1 = arrayCookie[1].split('=')[1],
	cookie2 = arrayCookie[2].split('=')[1];
	
	if(cookie1 != cookie2) {
		document.cookie = "id_sms=" + cookie2 + "; path=/";
		sms.innerHTML = aj.response;
	}
}, 3000);

function scrollTop() {
	sms.scrollTop = sms.scrollHeight;
}