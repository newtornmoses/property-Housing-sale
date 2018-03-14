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