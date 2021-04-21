<<<<<<< HEAD
function previewImage(){
    const foto = document.querySelector('#foto');
    const fotoLabel = document.querySelector('#label-gambar');
    const imgPreview = document.querySelector('.img-preview');

    fotoLabel.textContent = foto.files[0].name;

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function (e) {
        imgPreview.src = e.target.result;
    }
}

function addShadow(){
    document.querySelector(".nav-profile").classList.add("shadow")
}
function removeShadow(){
    document.querySelector(".nav-profile").classList.remove("shadow")
}
=======
// JS untuk Navbar ketika di scroll hilang
// (function() {
//     var documentElem = $(document),
//     nav = $('nav'),
//     lastScrollTop = 0;

//     documentElem.on('scroll', function() {
//     var currentScrollTop = $(this).scrollTop();

//     // scroll down
//     if(currentScrollTop > lastScrollTop) nav.addClass('hidden');
//     // scrollTop
//     else nav.removeClass('hidden');

//     lastScrollTop = currentScrollTop;
//     });

//     })();
>>>>>>> 620fe1de5487ddcae1531960622adc43ff8399d4
