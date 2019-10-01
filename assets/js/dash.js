window.addEventListener('load', recargar);
var respuesta=document.getElementById("msg_inbox");
var cita=document.getElementById("cita_inbox");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('contacto_controller/cargarDatosContacto/')
            .then(res => res.json())

            .then(datos => {
				var texto="";
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
                                    <span class="sl-date">${element.fecha_solicitud}</span>
                                </div>
                                <div class="desc">
                                    ${element.comentario}
                                    <br>
                                    <button class="btn m-t-10 m-r-5 btn-rounded btn-success">Responder</button>
                                    <button class="btn m-t-10 btn-rounded btn-danger">Rechazar</button>
                                </div>
                            </div>
                        </div>  
                    `
				});
					respuesta.innerHTML=texto;
				})
            
    fetch('cita_controller/cargarDatosCita/')
        .then(res => res.json())

        .then(datos => {
            var texto="";
            datos.forEach(element => {
                texto+=`
                <div class="bg-white p-4 my-2" style="border-radius: 10px;">
                    <div class="mail-contnet">
                        <h5 class="text-dark"> ${element.nombre}</h5>
                        <span class="mail-desc text-dark"> ${element.comentario}</span>
                        <br>
                        <div class="mt-2 mb-1">
                            <span class="font-medium">Fecha Solicitada</span>
                            <span class="time"> ${element.fecha}</span> 
                            <br>
                            <span class="font-medium">Hora Solicitada</span>
                            <span class="time"> ${element.hora}</span>
                        </div> 
                            <button class="btn m-t-10 m-r-5 btn-rounded btn-success">Responder solicitud</button>
                            <button class="btn m-t-10 btn-rounded btn-danger">Rechazar Solicitud</button> 
                    </div>
                </div>
                `
            });
                cita.innerHTML=texto;
            })
}




                