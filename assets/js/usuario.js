window.addEventListener('load', recargar);
var formulario=document.getElementById("formUsuario");
var respuesta=document.getElementById("bodyUsuario");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    let peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        

        if(this.readyState==4){
            document.getElementById('bodyUsuario').innerHTML=this.responseText;
            asignarEventos();
        }};
    peticion.open('GET', 'cargarDatosUsuario');
    peticion.send();
}


/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarUsuario').addEventListener('click', function(e){
	e.preventDefault();
    var nombres=document.getElementById('nombres').value
   	var apellidos=document.getElementById('apellidos').value
	var nombre_usuario=document.getElementById('usuario').value
	var pass=document.getElementById('pass').value
	var tipo_usuario=document.querySelector('input[name="tipo_usuario"]:checked')

	var datas= new FormData();
	datas.append("nombres", nombres)
	datas.append("apellidos", apellidos)
	datas.append("usuario", nombre_usuario)
	datas.append("pass", pass)
	datas.append("tipo_usuario", tipo_usuario.value)


	var metodo="agregarUsuario";
    if (this.value=="Modificar") {
		metodo="actualizarUsuario";
		let estado=document.querySelector('input[name="estado"]:checked')
		var id_usuario=document.getElementById('id_usuario').value
		datas.append("id_usuario", id_usuario)
		datas.append("estado", estado.value)
    }


	
	fetch(metodo, {
        method: 'POST',
        body: datas
    }).then(res => res)
      .then(data =>{
        //   console.log(data);
          if(data=="error"){
            respuesta.innerHTML=
          `ERROR`;
          }else{
			recargar();
			limpiar();	
          }})

});


/////////////////////------------------------------------------------DELETE---------------------------------------------------//////////////////	


	function eliminar() {
    var peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
       if(this.readyState==4){
            recargar();
        }};
    peticion.open('GET', 'eliminarUsuario/'+this.value);
    peticion.send()
}

/////////////////////----------------------------------------PREPARACION DE EVENTOS--------------------------------------//////////////////

function asignarEventos(){
    var btnEditar=document.getElementsByClassName('btnEditar');
	var btnEliminar=document.getElementsByClassName('btnEliminar');
	
	for (var index = 0; index <btnEditar.length; index++) {
	
		//PARA EMPEZAR A CARGAR
        btnEditar[index].addEventListener('click', accion);
        btnEliminar[index].addEventListener('click', eliminar);
        
    }
}


/////////////////////----------------------------------------PREPARACION DE DATOS EN FORMULARIO------------------------------------//////////////////
function accion() {
    var datos = new Array();
    document.getElementById("oculto").removeAttribute("hidden")
	
	let peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if(this.readyState==4){
			datos=JSON.parse(this.responseText);
			document.getElementById("id_usuario").value=datos["id_usuario"];
    		document.getElementById('nombres').value=datos["nombres"];
   			document.getElementById('apellidos').value=datos["apellidos"];
			document.getElementById('usuario').value=datos["nombre_usuario"];
			document.getElementById('pass').value=datos["contrasenia"]; 

			switch (datos["tipo_usuario"]) {
				case "Administrador":
					document.getElementById("tipo1").checked = true;	
				break;
				case "Generador de contenido":
					document.getElementById("tipo2").checked = true;	
				break;
				case "Usuario normal":
				document.getElementById("tipo3").checked = true;
				break;
			}
	
    
			if (datos["estado"]==1) {
				document.getElementById("estado1").checked = true;
			}else{
				document.getElementById("estado2").checked = true;
			}
            
            
        }};
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarUsuario')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
function limpiar(){
    document.getElementById("oculto").setAttribute("hidden", "true")
    document.getElementById('nombres').value="";
    document.getElementById('apellidos').value="";
    document.getElementById('usuario').value=""; 
    
    radio1= document.getElementById("estado1");
    radio2= document.getElementById("estado2");
    radio2.removeAttribute("checked")
	radio1.setAttribute("checked", "");
	var btn=document.getElementById('guardarUsuario')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");

	// document.getElementById('agregarUsuario').style.display="none";
	$('#agregarUsuario').modal('hide');
	
    
}
