
let menuBurger = document.getElementById('burger');

let menuOpen = menuBurger.getElementsByTagName('a')[0];

let overlay = document.getElementById('nav');

let menuClose = overlay.getElementsByTagName('a')[0];

let blur = document.getElementById('blur');

menuOpen.addEventListener('click', function(event){
    event.preventDefault();
});

menuClose.addEventListener('click', function(event){
    event.preventDefault();
});


// Burger nav for small and medium screens
menuOpen.addEventListener('click', menu);
menuClose.addEventListener('click', menu);
blur.addEventListener('click', menu);


function menu(){
    overlay.classList.toggle("overlay");
    blur.classList.toggle("display-none");
}