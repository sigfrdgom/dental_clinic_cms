document.getElementById('usuario').addEventListener('input', valBoton)
document.getElementById('pass').addEventListener('input', valBoton)

var boton =document.getElementById('boton')
// boton.style.display = 'none'
boton.className="btn btn-warning btn-block btn-lg login_btn btn-rounded"
boton.value="Ingresa tus datos"

function valBoton() {
    var user=document.getElementById('usuario')
    var pass=document.getElementById('pass')
    
	
		if (user.checkValidity() && pass.checkValidity()){
            // boton.style.display = 'block'
            boton.className="btn btn-success btn-block btn-lg login_btn btn-rounded"
            boton.value="Iniciar Sesión"
        }else{
            // boton.style.display = 'none'
            boton.className="btn btn-warning btn-block btn-lg login_btn btn-rounded"
            boton.value="Ingresa tus datos"
        }
}



    