// onscroll change navbar color
var navbar = document.querySelector('.navbar-inverse');
var brandName = document.querySelector('.brandName');
document.addEventListener('scroll', (event) => {


    if (event.pageY >= 650) {
        navbar.classList.add('navbar-reverse');
        brandName.classList.add('brandName_show');
    } else {
        navbar.classList.remove('navbar-reverse');
        brandName.classList.remove('brandName_show');

    }
});


// .classList.toggle('showInner');
// open list items on ul click 
var ul = document.querySelectorAll('.outer');
var innerDeep = document.querySelectorAll('.innerDeep');
for (let i = 0; i < ul.length; i++) {
    ul[i].addEventListener('click', function() {

        this.children[1].classList.toggle('showInner');
    })
}