// file form toggle
const postfileUpload = document.querySelector('.postfileUpload');
const photo = document.querySelector('.fa-photo');

photo.addEventListener('click', toggleForm);

function toggleForm() {

    postfileUpload.classList.toggle('showform');
    this.classList.toggle('active');
}


//on-hover upload buttons
const upload = document.querySelectorAll('.upload');

for (let i = 0; i < upload.length; i++) {

    upload[i].addEventListener('mouseover', changeLook);
    upload[i].addEventListener('mouseleave', NormalLook);


}

function changeLook(e) {

    e.target.classList.add('hovered');
}

function NormalLook(e) {
    e.target.classList.remove('hovered')
}