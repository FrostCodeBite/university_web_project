const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById('close');

var MainImg = document.getElementById("MainImg");
var smalling = document.getElementsByClassName("small-img");

// change nav icon

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active')
    })
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active')
    })
}

// change images

smalling[0].onclick = function() {
    MainImg.src = smalling[0].src;
}

smalling[1].onclick = function() {
    MainImg.src = smalling[1].src;
}

smalling[2].onclick = function() {
    MainImg.src = smalling[2].src;
}

smalling[3].onclick = function() {
    MainImg.src = smalling[3].src;
}




