
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
    if (ev.target.tagName === 'LI') {
        ev.target.classList.toggle('checked');
    }
}, false);

function Del(name){
    return confirm("Do you want to delete: "+name+" Task?");
}
function Repeat() {
    return confirm("please, enter task");
}

function tik_visible(i) {
    document.getElementsByClassName('tik_check')[i].style.visibility='visible';
    document.getElementsByClassName('id_hidden')[i].style.visibility='hidden';
}