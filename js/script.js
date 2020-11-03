// получаем элементы страницы:
// кнопки открытия модального окна
let btnOpenModal = document.querySelectorAll("#open"),
// кнопки закрытия модального окна
btnCloseModal = document.querySelectorAll(".close"),
// сами модальные окна
modal = document.querySelectorAll(".modal");

// функция открытия модального окна
function openModal(num) {
    // делаем видимым окно переданное в функцию
    modal[num].style.display = "block";
}

// функция закрытия модального окна
function closeModal(num) {
    // делаем невидимым окно переданное в функцию
    modal[num].style.display = "none";
}