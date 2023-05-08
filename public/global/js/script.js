const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}

const icon = document.querySelector('.icon');
const search = document.querySelector('.search');
icon.onclick = function() {
    search.classList.toggle('active');
}

$(document).ready(function(){
    $('#birth-date').mask('00/00/0000');
    $('#phone-number').mask('0000-0000');
   })