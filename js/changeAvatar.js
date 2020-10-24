function avatarAction(a) {
    let avatar = document.querySelectorAll(".avatar");
    let i = 1;
    while(i < avatar.length) {
        avatar[i].classList.remove('action');
        i++;
    }
    avatar[a].classList.add('action');
}