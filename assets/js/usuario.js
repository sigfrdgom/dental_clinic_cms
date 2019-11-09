window.addEventListener('load', recargar);
var formulario=document.getElementById("formUsuario");
var respuesta=document.getElementById("bodyUsuario");

var path = window.location.pathname.split( '/' );
var base_url = window.location.origin;
base_url = base_url+"/"+path[1]+"/";

url= base_url+'Usuario/';

/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch(url+'cargarDatosUsuario')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				// console.log(datos)
				datos.forEach(element => {
					if (element.estado==1) {
						estado="Activo";
					}else{
						estado="Desactivado";
					}
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_usuario}">
    				<td>${element.nombres}</td>
    				<td>${element.apellidos}</td>
    				<td>${element.nombre_usuario}</td>
					<td>${element.tipo_usuario}</td>
					<td>${estado}</td>
					<td class="py-2">`;
						if (element.id_usuario != 1) {
						texto+=`<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_usuario}" data-toggle="modal" data-target="#agregarUsuario">GESTIONAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_usuario}">BLOQUEAR</button>`;	
						}
            		texto += `</td>
    			</tr>`;
				});

						
					respuesta.innerHTML=texto;
					// respuesta.innerHTML="hola";
					asignarEventos();
				})
					
			

}

/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarUsuario').addEventListener('click', function(e){
	e.preventDefault();
	console.log("boton")
	
	if (validarCampo()) {
		console.log("entro al if")
	}else{
		console.log("entro al elfe")
	var datas= new FormData();
    var nombres=document.getElementById('nombres')
   	var apellidos=document.getElementById('apellidos')
	var nombre_usuario=document.getElementById('usuario')
	var pass=document.getElementById('pass')
	var tipo_usuario=document.querySelector('input[name="tipo_usuario"]:checked')
	document.getElementById("nuevo").innerText="Agregar un usuario nuevo"


	usuario = document.getElementById('usuario').value

	var controlador="agregarUsuario";
	var metodo="POST"
	if (this.value=="Modificar") {
		controlador="actualizarUsuario";
		// metodo="PUT"
		var estado=document.querySelector('input[name="estado"]:checked')
		var id_usuario=document.getElementById('id_usuario').value
		datas.append("id_usuario", id_usuario)
		datas.append("estado", estado.value)	
		}

		datas.append("nombres", nombres.value)
		datas.append("apellidos", apellidos.value)
		datas.append("usuario", nombre_usuario.value)
		datas.append("pass", pass.value)
		datas.append("tipo_usuario", tipo_usuario.value)


	fetch(url+'validarUsuario/'+usuario)
		.then(res => res.json())
		.then(datos => {
			if (datos == null ) {
				if (document.getElementById('nombres').value === "" && document.getElementById('apellidos').value === "") {
					document.getElementById('usuario').value = ""
				} else {
					document.getElementById('usuario').value = usuario
				}
				if (nombres.checkValidity() && apellidos.checkValidity() && nombre_usuario.checkValidity() && pass.checkValidity()) {
					document.getElementById('mensaje').innerHTML=""
					metodoIngreso(controlador, metodo, datas)
					
					
				} else {
					document.getElementById('mensaje').innerHTML="Los datos tienen valores invalidos"
				}
			}else{

				if ((datos.id_usuario===document.getElementById('id_usuario').value)&&controlador=="actualizarUsuario") {
					metodoIngreso(controlador, metodo, datas);
		
				}else{
					document.getElementById('mensaje').innerHTML="Parece que el nombre de usuario ya esta en uso"
				}
				
			}
		})
		console.log("lo hago")
	}
});



	function metodoIngreso(controlador, metodo, datas){
		fetch(url+controlador, {
			method: metodo,
			body: datas
		}) 
		.then(data =>{
			if(data=="error"){
			//   console.log(data);
			respuesta.innerHTML=
			`ERROR`;
		}else{
			recargar();
			limpiar();	
			console.log("salio aca")
		}})
			
		
	}










/////////////////////------------------------------------------------DELETE---------------------------------------------------//////////////////	
function eliminar() {
	if(this.value == 1){
		Swal.fire({
		title: 'Error',
		text: "No se puede eliminar al usuario Administrador",
		type: 'warning'
	});
	}else{
		Swal.fire({
		title: '¿Esta seguro de eliminar el usuario?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(url+'/eliminarUsuario/'+this.value, {
				method: 'DELETE'
			})
			.then(() =>{
				Swal.fire(
					'Eliminado',
					'!El usuario ha sido eliminado',
					'success'
					)
				recargar();		
			})
		}
	})
	}
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

			document.getElementById("nuevo").innerText="Modificando un usuario de tabla"

			switch (datos["tipo_usuario"]) {
				case "ADMIN":
					document.getElementById("tipo1").checked = true;	
				break;
				case "GENERATOR":
					document.getElementById("tipo2").checked = true;	
				break;
				case "SIMPLE":
				document.getElementById("tipo3").checked = true;
				break;
			}
	
    
			if (datos["estado"]==1) {
				document.getElementById("estado1").checked = true;
			}else{
				document.getElementById("estado2").checked = true;
			}
            
            
        }};
    peticion.open('GET', url+'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarUsuario')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)

function limpiar(){
    document.getElementById("oculto").setAttribute("hidden", "true")
    document.getElementById('nombres').value="";
    document.getElementById('apellidos').value="";
	document.getElementById('usuario').value="";
	document.getElementById('pass').value="";
	document.getElementById("tipo3").checked = true;
	document.getElementById("nuevo").innerText="Agregar un usuario nuevo"
	document.getElementById('mensaje').innerText=``;
	 
    
    radio1= document.getElementById("estado1");
    radio2= document.getElementById("estado2");
    radio2.removeAttribute("checked")
	radio1.setAttribute("checked", "");
	var btn=document.getElementById('guardarUsuario')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarUsuario').modal('hide');
}





document.getElementById("busqueda").addEventListener("keyup", function(){
	
	var busqueda=document.getElementById("busqueda").value;
	if (busqueda!==""&&busqueda!==" ") {
		var datas= new FormData();
		datas.append("busqueda", busqueda)
		
		fetch(url+'findByCriteria', {
        method: "POST",
        body: datas
		})
		.then(res => res.json()).then(datos => {
			// console.log(datos)
			var texto="";
			datos.forEach(element => {
				
				if (element.estado==1) {
					estado="Activo";
				}else{
					estado="Desactivado";
				}
				texto+=`
					<tr class="p-0 border-bottom border-info" id="tr${element.id_usuario}">
						<td>${element.nombres}</td>
						<td>${element.apellidos}</td>
						<td>${element.nombre_usuario}</td>
						<td>${element.tipo_usuario}</td>
					    <td>${estado}</td>
					    <td class="py-2">`;
						if (element.id_usuario != 1) {
						texto+=`<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_usuario}" data-toggle="modal" data-target="#agregarUsuario">GESTIONAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_usuario}">BLOQUEAR</button>`;	
						}
            		texto += `</td>
    			</tr>`;
					});
				if (datos.length>0) {
					respuesta.innerHTML=texto;
					asignarEventos();	
				}else{
					respuesta.innerHTML="NO HAY REGISTRO COINCIDENTES";
				}
				
		})
		
	}else{
		document.getElementById("busqueda").value="";
		recargar();
	}
	
});


/////////--------------------------------- Para mostrar automaticament el usuario recomendado ----------------------------///////////
document.getElementById('nombres').addEventListener('input', genUsuario)
document.getElementById('apellidos').addEventListener('input', genUsuario)

function genUsuario() {
	var n= document.getElementById('nombres').value.split(" ")
	var a= document.getElementById('apellidos').value.split(" ")
	
	usuario=n[0].toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"")+"."+a[0].toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"")
	document.getElementById('usuario').value= usuario
}


	function validarCampo(){
		var comprobador=false;
		var nombres=document.getElementById('nombres')
   		var apellidos=document.getElementById('apellidos')
		var nombre_usuario=document.getElementById('usuario')
		var pass=document.getElementById('pass')
		var mensaje=document.getElementById('mensaje')

		// console.log($.trim(nombres.value).length+"_"+$.trim(nombres.value))
		if (($.trim(nombres.value)=="")||(!nombres.checkValidity)||($.trim(nombres.value).length<=4)) {
			comprobador=true;
			
			if (nombres.validationMessage=="") {
				mensaje.innerHTML=`Ingrese datos correctos en nombres por favor`
			}else{
				mensaje.innerHTML=`${nombres.validationMessage+" nombres"}`;
			}
			nombres.value="";
			nombres.focus();

			// console.log("nombre "+comprobador+nombres.validationMessage)
			
		}else if (($.trim(apellidos.value)=="")||(!apellidos.checkValidity)||($.trim(apellidos.value).length<=4)) {
			comprobador=true;
			
			if (apellidos.validationMessage=="") {
				mensaje.innerHTML=`Ingrese datos correctos en apellidos por favor`
			}else{
				mensaje.innerHTML=`${apellidos.validationMessage+" apellidos"}`;
			}
			apellidos.value="";
			apellidos.focus();
			
		} else if (($.trim(nombre_usuario.value)=="")||(!nombre_usuario.checkValidity)||($.trim(nombre_usuario.value).length<=4)) {
			comprobador=true;
			
			if (nombre_usuario.validationMessage=="") {
				mensaje.innerHTML=`Ingrese datos correctos en usuario por favor`
			}else{
				mensaje.innerHTML=`${nombre_usuario.validationMessage+" Usuario"}`;
			}
			nombre_usuario.value="";
			nombre_usuario.focus()

		}
		else if (($.trim(pass.value)=="")||(!pass.checkValidity)||($.trim(pass.value).length<=5)) {
			comprobador=true;
			
			if (pass.validationMessage=="") {
				mensaje.innerHTML=`Ingrese datos correctos en password por favor`
			}else{
				mensaje.innerHTML=`${pass.validationMessage+" password"}`;
			}
			pass.value="";
			pass.focus();
		}
		return comprobador;
    	
	}

	 function sololetras(e) {
        key=e.keyCode || e.which;
 
        teclado=String.fromCharCode(key).toLowerCase();
 
        letras="qwertyuiopasdfghjklñzxcvbnm ";
 
        especiales="8-37-38-46-164";
 
        teclado_especial=false;
 
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
                break;
            }
        }
 
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }
    }
