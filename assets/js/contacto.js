window.addEventListener('load', recargar);
// var formulario=document.getElementById("formContacto");
var respuesta=document.getElementById("bodyContacto");

var base_url = "";
if(location.hostname =="localhost"){
	var path = window.location.pathname.split( '/' );
	base_url = window.location.origin;
	base_url = base_url+"/"+path[1]+"/";
}else{
	base_url = location.protocol+"//"+location.hostname+"/";
}

var url_server= base_url+"api/Contacto/";

/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch(url_server+'cargarDatosContacto')
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
						<button class="btnEditar text-center btn ${(element.estado==1)?'btn-success':'btn-info'} btn-rounded"  value="${element.id_contacto}" data-toggle="modal" data-target="#contactarContacto">${(element.estado==1)?'&nbsp;Aceptar mensaje&nbsp;':'&nbsp;&nbsp;&nbsp;&nbsp;Comunicarse&nbsp;&nbsp;&nbsp;'}</button>
						
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
			fetch(url_server+'eliminarContacto/'+this.value, {
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
			
			document.getElementById('sendmail_contacto').href="mailto:"+datos["email"]+"?subject=Contacto desde pagina WEB"
			document.getElementById('sendwhats_contacto').href="http://wa.me/"+datos["telefono"]
			document.getElementById('sendcall_contacto').href="tel:"+datos["telefono"]
			
			var datas= new FormData();
			datas.append("id_contacto", datos["id_contacto"])
			
			if (datos["estado"]==1) {
				fetch(url_server+'actualizarContactoEstado/', {
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
			}
			

			
		}};
		
    peticion.open('GET', url_server+'obtenerRegistro/'+this.value);
	peticion.send();
	
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
// document.getElementById("idModal").addEventListener("click", limpiar)

function limpiar(){
	// document.getElementById('nombre').value="";
	// document.getElementById('telefono').value="";
	// document.getElementById('email').value="";
	// document.getElementById('comentario').value="";
    
   
	// var btn=document.getElementById('guardarContacto')
    // btn.removeAttribute("value")
	// btn.setAttribute("value", "Guardar");
	$('#agregarContacto').modal('hide');
}






document.getElementById("busqueda").addEventListener("keyup", function(){
	
	var busqueda=document.getElementById("busqueda").value;
	if (busqueda!==""&&busqueda!==" ") {
		var datas= new FormData();
		datas.append("busqueda", busqueda)
		fetch(url_server+'findByCriteria', {
        method: "POST",
        body: datas
    }).then(res => res.json()).then(datos => {
				// console.log(datos)
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
					if (datos.length>0) {
						respuesta.innerHTML=texto;
						asignarEventos();	
					}else{
						respuesta.innerHTML="NO HAY REGISTRO COINCIDENTES EN MENSAJES";
					}
					
			})
		



	}else{
		document.getElementById("busqueda").value="";
		recargar();
	}
	
});
