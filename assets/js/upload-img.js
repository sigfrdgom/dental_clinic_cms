window.addEventListener('load', listener);

function listener() {
    var images = document.querySelectorAll('input[type="file"]');
    for (let i = 0; i < images.length; i++) {
        images[i].addEventListener('change', showImages);
    }
}

function showImages(e) {
    console.log(e);
    var name = e.target.name;
    var imgNumber = name.substr(name.length - 1, name.length);

    var archivo = e.target.files[0];
    var reader = new FileReader();
    if (archivo) {
        reader.onloadend = function () {
            document.querySelectorAll('.img-upload')[imgNumber - 1].setAttribute("src", reader.result);
        }
        reader.onerror=function(e) {
            document.querySelectorAll('.img-upload')[imgNumber - 1].innerHTML="Error de lectura";
        }
        reader.onprogress= function(e){
            document.querySelectorAll('.img-upload')[imgNumber - 1].setAttribute("src", "./../assets/images/default/preloader.gif");
        }
        // important this instruction must be at the end because must be the methods firts
		reader.readAsDataURL(archivo);
    }
}