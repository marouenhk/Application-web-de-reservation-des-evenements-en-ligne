/******************* Index  ******************/

/******************* bienvenue icon  ******************/
function Click() {
    alert ("Welcome to our site")
}

/******************* changer le image mouse in et out  ******************/

function changeimg1(){
    var img1=document.getElementById('img1');
    img1.src="images/band.jpg" ;
}
function returnimg1(){
    var img1=document.getElementById('img1');
    img1.src="images/09-01-2024.jpg" ;
}
function changeimg2(){
    var imag2=document.getElementById('img2');
    imag2.src="images/50off.jpg" ;
}
function returnimg2(){
    var imag2=document.getElementById('img2');
    imag2.src="images/festival.jpg" ;
}
function changeimg3(){
    var imag3=document.getElementById('img3');
    imag3.src="images/platinum.jpg" ;
}
function returnimg3(){
    var imag3=document.getElementById('img3');
    imag3.src="images/samara.jpg" ;
}


/******************* slides images  ******************/

let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const slideWidth = slides[0].clientWidth + 10; // Largeur de chaque slide avec espacement

function showSlides() {
    slideIndex++;
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    document.querySelector('.slider').style.transform = `translateX(-${slideIndex * slideWidth}px)`;
}

function prevSlide() {
    slideIndex--;
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    document.querySelector('.slider').style.transform = `translateX(-${slideIndex * slideWidth}px)`;
}

function nextSlide() {
    slideIndex++;
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    document.querySelector('.slider').style.transform = `translateX(-${slideIndex * slideWidth}px)`;
}

setInterval(showSlides, 2000); // Change d'image toutes les 2 secondes 
