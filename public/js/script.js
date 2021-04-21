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