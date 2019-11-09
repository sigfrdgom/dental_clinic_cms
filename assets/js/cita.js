window.addEventListener('load', recargar);
// var formulario=document.getElementById("formCita");
var respuesta=document.getElementById("bodyCita");

var path = window.location.pathname.split( '/' );
var base_url = window.location.origin;
base_url = base_url+"/"+path[1]+"/";

var url_api= base_url+"/api/Cita/";
var url_server= base_url+"Cita/";

/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch(url_api+'cargarDatosCita')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				datos.forEach(element => {
				 texto+=`
				<tr class="p-0 border-bottom border-info ${(element.estado==1)?'mensaje-no-leido':'mensaje-leido'}"" id="tr${element.id_cita}">
					<td>${element.nombre}</td>
					<td>${element.procedimiento}</td>
					<td>${element.fecha}</td>
					<td>${element.hora}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn ${(element.estado==1)?'btn-success':'btn-info'} btn-rounded"  value="${element.id_cita}" data-toggle="modal" data-target="#contactarCita">${(element.estado==1)?'Aceptar solicitud':'Comunicarse'}</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_cita}">${(element.estado==1)?'Rechazar solicitud':'Eliminar solicitud'}</button>
					</td>
    			</tr>`
				});
					respuesta.innerHTML=texto;
					asignarEventos();
				})

				// <td>${element.padecimientos}</td>
				// <td>${element.celular}</td>
				// <td>${element.email}</td>
				// <td>${element.comentario}</td>

			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
// document.getElementById('guardarCita').addEventListener('click', function(e){
// 	e.preventDefault();
// 	var nombre=document.getElementById('nombre').value
// 	// var apellido=document.getElementById('apellido').value
// 	var telefono=document.getElementById('telefono').value
// 	var email=document.getElementById('email').value
// 	var padecimientos=document.getElementById('padecimientos').value
// 	var procedimiento=document.getElementById('procedimiento').value
// 	var fecha=document.getElementById('fecha').value
// 	var hora=document.getElementById('hora').value
// 	var comentario=document.getElementById('comentario').value

// 	var datas= new FormData();
// 	datas.append("nombre", nombre)
// 	// datas.append("apellido", apellido)
// 	datas.append("telefono", telefono)
// 	datas.append("email", email)
// 	datas.append("padecimientos", padecimientos)
// 	datas.append("procedimiento", procedimiento)
// 	datas.append("fecha", fecha)
// 	datas.append("hora", hora)
// 	datas.append("comentario", comentario)

// 	var controlador="agregarCita";
// 	var metodo="POST"
//     if (this.value=="Modificar") {
// 		controlador="actualizarCita";
// 		// metodo="PUT"
// 		var id_cita=document.getElementById('id_cita').value
// 		datas.append("id_cita", id_cita)
			
// 	}
	

// 	fetch(controlador, {
//         method: metodo,
//         body: datas
//     }).then(data =>{
//         //   console.log(data);
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
		title: '¿Esta seguro de desechar esta solicitud?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(url_api+'eliminarCita/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado!',
						'!La solicitud ha sido eliminada!',
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
	
	for (var index = 0; index <btnEditar.length; index++) {
	
		//PARA EMPEZAR A CARGAR
        btnEditar[index].addEventListener('click', accion);
        btnEliminar[index].addEventListener('click', eliminar);
        
    }
}


/////////////////////----------------------------------------PREPARACION DE DATOS EN FORMULARIO------------------------------------//////////////////
function accion() {
    var datos = new Array();
    let peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if(this.readyState==4){
			datos=JSON.parse(this.responseText);
			document.getElementById("id_cita_cct").value=datos["id_cita"];
			document.getElementById('nombre_cct').innerHTML=datos["nombre"];
			// document.getElementById('apellido').value=datos["apellido"];
			document.getElementById('telefono_cct').innerHTML=datos["celular"];
			document.getElementById('email_cct').innerHTML=datos["email"];
			document.getElementById('padecimientos_cct').innerHTML=datos["padecimientos"];
			document.getElementById('procedimiento_cct').innerHTML=datos["procedimiento"];
			document.getElementById('fecha_cct').value=datos["fecha"];
			document.getElementById('hora_cct').value=datos["hora"];
			document.getElementById('comentario_cct').innerHTML=datos["comentario"];
			document.getElementById('fecha_solicitud_cct').innerHTML=datos["fecha_solicitud"];
			document.getElementById('estado_cct').innerHTML=(datos["estado"]==1)?'No leido':'Leido';

			document.getElementById('sendmail_cita').href="mailto:"+datos["email"]+"?subject=Contacto desde pagina WEB"
			document.getElementById('sendwhats_cita').href="http://wa.me/"+datos["celular"]
			document.getElementById('sendcall_cita').href="tel:"+datos["celular"]
	   
			var datas= new FormData();
			datas.append("id_cita", datos["id_cita"])
			fetch(url_server+'actualizarCitaEstado/', {
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
    peticion.open('GET', url_api+'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarCita')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

// document.getElementById("btnReset").addEventListener("click", limpiar)
// document.getElementById("idModal").addEventListener("click", limpiar)

// function limpiar(){
// 	document.getElementById('nombre').value="";
// 	// document.getElementById('apellido').value="";
// 	document.getElementById('telefono').value="";
// 	document.getElementById('email').value="";
// 	document.getElementById('padecimientos').value="";
// 	document.getElementById('procedimiento').value="";
// 	document.getElementById('fecha').value="";
// 	document.getElementById('hora').value="";
// 	document.getElementById('comentario').value="";
    
   
// 	var btn=document.getElementById('guardarCita')
//     btn.removeAttribute("value")
// 	btn.setAttribute("value", "Guardar");
// 	$('#agregarCita').modal('hide');
// }

// document.getElementById("globalBusqueda").addEventListener("keyup", buscarCriterio);

document.getElementById("busqueda").addEventListener("keyup", buscarCriterio);

function buscarCriterio(){
	 var busqueda=document.getElementById("busqueda").value;
	if (busqueda!==""&&busqueda!==" ") {
		var datas= new FormData();
		datas.append(url_server+"busqueda", busqueda)
		fetch('findByCriteria', {
        method: "POST",
        body: datas
    }).then(res => res.json()).then(datos => {
				var texto="";
				datos.forEach(element => {
					if (element.estado==1) {
						estado="Activo";
					}else{
						estado="Desactivado";
					}
				 texto+=`
				<tr class="p-0 border-bottom border-info ${(element.estado==1)?'mensaje-no-leido':'mensaje-leido'}"" id="tr${element.id_cita}">
					<td>${element.nombre}</td>
					<td>${element.procedimiento}</td>
					<td>${element.fecha}</td>
					<td>${element.hora}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn ${(element.estado==1)?'btn-success':'btn-info'} btn-rounded"  value="${element.id_cita}" data-toggle="modal" data-target="#contactarCita">${(element.estado==1)?'Aceptar solicitud':'Comunicarse'}</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_cita}">${(element.estado==1)?'Rechazar solicitud':'Eliminar solicitud'}</button>
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
	
 }
