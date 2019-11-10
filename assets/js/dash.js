var base_url = "";
if(location.hostname =="localhost"){
	var path = window.location.pathname.split( '/' );
	base_url = window.location.origin;
	base_url = base_url+"/"+path[1]+"/";
}else{
	base_url = location.protocol+"//"+location.hostname+"/";
}
base_url = base_url+"/"+"api/";

// var base_url="http://admin.clidesadentistas.com/api/";

window.addEventListener('load', recargarCita);
window.addEventListener('load', recargarMsg);

var respuesta=document.getElementById("msg_inbox");
var cita=document.getElementById("cita_inbox");

setInterval(() => {
   recargarMsg()
   recargarCita()
}, 180000);

/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargarMsg(){
    fetch(base_url+'Contacto/cargarDatosActivos/')
        .then(res => res.json())

        .then(datos => {
            var texto="";
            if (datos.length === 0) {
                texto+=`<h4>No hay mensajes nuevos</h4>`
            } else {
                datos.forEach(element => {
                    texto+=`
                        <div class="sl-item bg-white">
                            <div class="sl-left bg-danger">
                                <i class="fa fa-user mt-1" style="font-size:2em;"></i>
                            </div>
                            <div class="sl-right">
                                <div class="font-medium pt-3">
                                    ${element.nombre}
                                    <br>
                                    <span class="sl-date">Recibido. ${element.fecha}</span>
                                </div>
                                <div class="desc">
                                    ${element.comentario}
                                    <br>
                                    <button class="btnContactoMsg btn m-t-10 m-r-5 btn-rounded btn-success" value="${element.id_contacto}" data-toggle="modal" data-target="#contactarMsg">Responder</button>
                                    <button class="btnRechazarMsg btn m-t-10 btn-rounded btn-danger" value="${element.id_contacto}">Rechazar</button>
                                </div>
                            </div>
                        </div>  
                    `
                });
            }
            
                respuesta.innerHTML=texto;
                var rechazarMensaje=document.getElementsByClassName('btnRechazarMsg');
                var contactoMsg=document.getElementsByClassName('btnContactoMsg');
                for (var index = 0; index <rechazarMensaje.length; index++) {
                    rechazarMensaje[index].addEventListener('click', rechazarMsg);
                    contactoMsg[index].addEventListener('click', mostrarMsg);
                }
            })

}


function recargarCita(){  
    fetch(base_url+'Cita/cargarDatosActivos/')
        .then(res => res.json())

        .then(datos => {
            var texto="";
            if (datos.length === 0) {
                texto+=`<h4>No hay solicitudes nuevas</h4>`
            } else {
                datos.forEach(element => {
                    texto+=`
                    <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                        <div class="mail-contnet">
                            <h5 class="text-dark"> ${element.nombre}</h5>
                            <span class="mail-desc text-dark"> ${element.comentario}</span>
                            <br>
                            <span class="sl-date">Recibido. ${element.fecha_solicitud}</span>
                            <br>
                            <div class="mt-2 mb-1">
                                <span class="font-medium">Fecha Solicitada</span>
                                <span class="time"> ${element.fecha}</span> 
                                <br>
                                <span class="font-medium">Hora Solicitada</span>
                                <span class="time"> ${element.hora}</span>
                            </div> 
                                <button class="btnContactoCita btn m-t-10 m-r-5 btn-rounded btn-success" value="${element.id_cita}" data-toggle="modal" data-target="#contactarCita">Responder solicitud</button>
                                <button class="btnRechazar btn m-t-10 btn-rounded btn-danger" value="${element.id_cita}">Rechazar Solicitud</button> 
                        </div>
                    </div>
                    `
                }); 
            }
            
                cita.innerHTML=texto;
                var rechazarCita=document.getElementsByClassName('btnRechazar');
                var contactoCita=document.getElementsByClassName('btnContactoCita');
                for (var index = 0; index <rechazarCita.length; index++) {
                    rechazarCita[index].addEventListener('click', rechazar);
                    console.log("hola")
                    contactoCita[index].addEventListener('click', mostrarCita);
                }
            })
}


                
function rechazarMsg() {
    Swal.fire({
		title: '¿Esta seguro de rechazar este mensaje?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(base_url+'Contacto/eliminarContacto/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'¡Rechazado!',
						'!El mensaje fue rechazado y eliminado!',
						'success'
					  )
					recargarMsg();		
				})
		}
	})
}


function rechazar() {
    Swal.fire({
		title: '¿Esta seguro de rechazar esta solicitud?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(base_url+'Cita/eliminarCita/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'¡Rechazada!',
						'!La solicitud fue rechazada y eliminada!',
						'success'
					  )
					recargarCita();		
				})
		}
	})
}


function mostrarMsg() {
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
			
			// var datas= new FormData();
			// datas.append("id_contacto", datos["id_contacto"])
			// fetch('actualizarContactoEstado/', {
			// 	method: 'POST',
			// 	body: datas
			// }).then(data =>{
			// 	//   console.log(data);
			// 	  if(data=="error"){
			// 		respuesta.innerHTML=
			// 	  `ERROR`;
			// 	  }else{
			// 		recargar()
			// 	  }
			// 	})

			
		}};
		
    peticion.open('GET', base_url+'Contacto/obtenerRegistro/'+this.value);
	peticion.send();
	// btn= document.getElementById('guardarContacto')
    // btn.removeAttribute("value")
	// btn.setAttribute("value", "Modificar")
    
}


function mostrarCita() {
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
	   
			// var datas= new FormData();
			// datas.append("id_cita", datos["id_cita"])
			// fetch('actualizarCitaEstado/', {
			// 	method: 'POST',
			// 	body: datas
			// }).then(data =>{
			// 	//   console.log(data);
			// 	  if(data=="error"){
			// 		respuesta.innerHTML=
			// 	  `ERROR`;
			// 	  }else{
			// 		recargar()
			// 	  }
			// 	})

        }};
    peticion.open('GET', base_url+'Cita/obtenerRegistro/'+this.value);
	peticion.send();
	// btn= document.getElementById('guardarCita')
    // btn.removeAttribute("value")
    // btn.setAttribute("value", "Modificar")
    
    
}
