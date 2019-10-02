window.addEventListener('load', recargar);
// var formulario=document.getElementById("formContacto");
var respuesta=document.getElementById("bodyContacto");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('cargarDatosContacto')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				datos.forEach(element => {
				 texto+=`
				<tr class="p-0 border-bottom border-info ${(element.estado==1)?'mensaje-no-leido':'mensaje-leido'}" id="tr${element.id_contacto}" >
					<td>${element.nombre}</td>
					<td>${element.comentario}</td>
					<td>${element.fecha}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn ${(element.estado==1)?'btn-success':'btn-info'} btn-rounded"  value="${element.id_contacto}" data-toggle="modal" data-target="#contactarContacto">${(element.estado==1)?'Aceptar mensaje':'Comunicarse'}</button>
						
						<button value="${element.id_contacto}" class="text-center btn btn-danger btn-rounded btnEliminar">${(element.estado==1)?'Rechazar mensaje':'Eliminar mensaje'}</button>
					</td>
    			</tr>`
				});
					respuesta.innerHTML=texto;
					asignarEventos();
				})
				
				// <td>${(element.estado==1)?'No visto':'Visto'}</td>	
				// <td>${element.telefono}</td>
				// <td>${element.email}</td>

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
// document.getElementById('guardarContacto').addEventListener('click', function(e){
// 	e.preventDefault();
// 	var nombre=document.getElementById('nombre').value
// 	var telefono=document.getElementById('telefono').value
// 	var email=document.getElementById('email').value
// 	var comentario=document.getElementById('comentario').value

// 	var datas= new FormData();
// 	datas.append("nombre", nombre)
// 	datas.append("telefono", telefono)
// 	datas.append("email", email)
// 	datas.append("comentario", comentario)
// 	datas.append("estado", 1)

// 	var controlador="agregarContacto";
// 	var metodo="POST"
//     if (this.value=="Modificar") {
// 		controlador="actualizarContacto";
// 		var id_contacto=document.getElementById('id_contacto').value
// 		datas.append("id_contacto", id_contacto)
			
// 	}
	

// 	fetch(controlador, {
//         method: metodo,
//         body: datas
//     }).then(data =>{
//           if(data=="error"){
//             respuesta.innerHTML=
//           `ERROR`;
//           }else{
// 			recargar();
// 			limpiar();	
//           }})

// });


/////////////////////------------------------------------------------DELETE---------------------------------------------------//////////////////	
function eliminar() {
	Swal.fire({
		title: '¿Esta acción eliminara el mensaje, esta seguro de realizarla?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch('eliminarContacto/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado',
						'!El mensaje ha sido rechazado',
						'success'
						)
					recargar();		
				})
		}
	})
}

/////////////////////----------------------------------------PREPARACION DE EVENTOS--------------------------------------//////////////////

function asignarEventos(){
    var btnEditar=document.getElementsByClassName('btnEditar');
	var btnEliminar=document.getElementsByClassName('btnEliminar');
	// var btnRechazar=document.getElementsByClassName('btnRechazar');
	
	for (var index = 0; index <btnEditar.length; index++) {
	
		//PARA EMPEZAR A CARGAR
		btnEditar[index].addEventListener('click', accion);
		btnEliminar[index].addEventListener('click', eliminar);
		// btnRechazar[index].addEventListener('click', rechazar);
        
    }
}


/////////////////////----------------------------------------PREPARACION DE DATOS EN FORMULARIO------------------------------------//////////////////
function accion() {
    var datos = new Array();
    let peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if(this.readyState==4){
			datos=JSON.parse(this.responseText);
			document.getElementById("id_contacto_contacto").value=datos["id_contacto"];
			document.getElementById('nombre_contacto').innerHTML=datos["nombre"];
			document.getElementById('comentario_contacto').innerHTML=datos["comentario"];
			document.getElementById('telefono_contacto').innerHTML=datos["telefono"];
			document.getElementById('email_contacto').innerHTML=datos["email"];
			document.getElementById('fecha_contacto').innerHTML=datos["fecha"];
			document.getElementById('estado_contacto').innerHTML=(datos["estado"]==1)?'No leido':'Leido';
			
			document.getElementById('sendmail_cita').href="mailto:"+datos["email"]+"?subject=Contacto desde pagina WEB"
			document.getElementById('sendwhats_cita').href="http://wa.me/"+datos["telefono"]
			document.getElementById('sendcall_cita').href="tel:"+datos["telefono"]
			
			var datas= new FormData();
			datas.append("id_contacto", datos["id_contacto"])
			fetch('actualizarContactoEstado/', {
				method: 'POST',
				body: datas
			}).then(data =>{
				//   console.log(data);
				  if(data=="error"){
					respuesta.innerHTML=
				  `ERROR`;
				  }else{
					recargar()
				  }
				})

			
		}};
		
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarContacto')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
// document.getElementById("idModal").addEventListener("click", limpiar)

function limpiar(){
	document.getElementById('nombre').value="";
	document.getElementById('telefono').value="";
	document.getElementById('email').value="";
	document.getElementById('comentario').value="";
    
   
	var btn=document.getElementById('guardarContacto')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarContacto').modal('hide');
}






document.getElementById("busqueda").addEventListener("keyup", function(){
	
	var busqueda=document.getElementById("busqueda").value;
	if (busqueda!==""&&busqueda!==" ") {
		var datas= new FormData();
		datas.append("busqueda", busqueda)
		fetch('findByCriteria', {
        method: "POST",
        body: datas
    }).then(res => res.json()).then(datos => {
				// console.log(datos)
				var texto="";
				datos.forEach(element => {
				texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_contacto}">
					<td>${element.nombre}</td>
					<td>${element.telefono}</td>
					<td>${element.email}</td>
					<td>${element.comentario}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-success btn-rounded"  value="${element.id_contacto}" data-toggle="modal" data-target="#agregarContacto">Aceptar mensaje</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_contacto}">Rechazar mensaje</button>
					</td>
    			</tr>`
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
