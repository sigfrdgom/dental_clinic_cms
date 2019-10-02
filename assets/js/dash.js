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
    fetch('contacto_controller/cargarDatosActivos/')
        .then(res => res.json())

        .then(datos => {
            var texto="";
            if (datos.length === 0) {
                texto+=`<h4>No hay mensajes nuevos</h4>`
            } else {
                datos.forEach(element => {
                    texto+=`
                        <div class="sl-item bg-white">
                            <div class="sl-left bg-info">
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
                                    <button class="btn m-t-10 m-r-5 btn-rounded btn-success">Responder</button>
                                    <button class="btnRechazarMsg btn m-t-10 btn-rounded btn-danger" value="${element.id_contacto}">Rechazar</button>
                                </div>
                            </div>
                        </div>  
                    `
                });
            }
            
                respuesta.innerHTML=texto;
                var rechazarMensaje=document.getElementsByClassName('btnRechazarMsg');
                for (var index = 0; index <rechazarMensaje.length; index++) {
                    rechazarMensaje[index].addEventListener('click', rechazarMsg);
                }
            })

}


function recargarCita(){            
    fetch('cita_controller/cargarDatosActivos/')
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
                                <button class="btn m-t-10 m-r-5 btn-rounded btn-success">Responder solicitud</button>
                                <button class="btnRechazar btn m-t-10 btn-rounded btn-danger" value="${element.id_cita}">Rechazar Solicitud</button> 
                        </div>
                    </div>
                    `
                }); 
            }
            
                cita.innerHTML=texto;
                var rechazarCita=document.getElementsByClassName('btnRechazar');
                for (var index = 0; index <rechazarCita.length; index++) {
                    rechazarCita[index].addEventListener('click', rechazar);
                    console.log("hola")
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
			fetch('contacto_controller/eliminarContacto/'+this.value, {
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
			fetch('cita_controller/eliminarCita/'+this.value, {
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
