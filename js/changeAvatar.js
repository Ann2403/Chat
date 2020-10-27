//функция изменения аватарки пользователя
function avatarAction(a) {
    //выбираем элемент(блок со всеми аварками) на странице
    let avatar = document.querySelectorAll(".avatar"),
    //переменная для перебора всех блоков
    i = 1;
    //пока не переберутся все блоки
    while(i < avatar.length) {
        //удаляем класс 'action' у блока
        avatar[i].classList.remove('action');
        //переходим к следующему
        i++;
    }
    //добавляем класс 'action' блоку с аватаркой под номером переданным в функцию
    avatar[a].classList.add('action');
}