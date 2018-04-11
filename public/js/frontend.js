var upload = document.querySelector('.uploadForm');
var uploadform = document.querySelector('#uploadForm');
// var updateForm = $('.formUpdate');
var updateForm = document.querySelectorAll('.formUpdate');
var btnEdit = document.querySelectorAll('.btnEdit');
var cancleBtn = document.querySelectorAll('.cancleBtn');




//show upload form
var form = document.querySelector('#showForm');
upload.addEventListener('click', () => {
    alert('clicked');
    uploadform.toggle('modal fade');
});





//show update from

for (let i = 0; i < btnEdit.length; i++) {
    btnEdit[i].addEventListener('click', (e) => {
        var win = window.scrollY;
        console.log(btnEdit[i])
        updateForm[i].classList.add('active');
        updateForm[i].style.top = win;





    })
}


// hide form
for (let i = 0; i < cancleBtn.length; i++) {
    cancleBtn[i].addEventListener('click', (e) => {

        updateForm[i].classList.remove('active');


    });
}