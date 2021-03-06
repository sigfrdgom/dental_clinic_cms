var base_url = "";
if(location.hostname =="localhost"){
	var path = window.location.pathname.split( '/' );
	base_url = window.location.origin;
	base_url = base_url+"/"+path[1]+"/";
}else{
	base_url = location.protocol+"//"+location.hostname+"/";
}

window.addEventListener('DOMContentLoaded', listener);

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
        // load the image in the view
        reader.onloadend = function () {
            document.querySelectorAll('.img-upload')[imgNumber - 1].setAttribute("src", reader.result);
        }
        // show text message error
        reader.onerror=function(e) {
            document.querySelectorAll('.img-upload')[imgNumber - 1].setAttribute("src", base_url+"assets/images/default/error1.png");
        }
        // show image as preloader in the view
        reader.onprogress= function(e){
            document.querySelectorAll('.img-upload')[imgNumber - 1].setAttribute("src", base_url+"assets/images/default/preloader.gif");
        }
        // important this instruction must be at the end because must be the methods first
		reader.readAsDataURL(archivo);
    }
}