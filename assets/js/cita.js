window.addEventListener('load', recargar);
var formulario=document.getElementById("formCita");
var respuesta=document.getElementById("bodyCita");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('cargarDatosCita')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				datos.forEach(element => {
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_cita}">
					<td>${element.nombre+" "+element.apellido}</td>
					
					<td>${element.padecimientos}</td>
					<td>${element.procedimiento}</td>
					<td>${element.fecha}</td>
					<td>${element.hora}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded" style="width:49%; margin:0px;" value="${element.id_cita}" data-toggle="modal" data-target="#agregarCita">EDITAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded" style="width:49%; margin:0px;" value="${element.id_cita}">ELIMINAR</button>
					</td>
    			</tr>`
				});
					respuesta.innerHTML=texto;
					asignarEventos();
				})
				// <td>${element.celular}</td>
				// <td>${element.email}</td>
				// <td>${element.comentario}</td>

			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarCita').addEventListener('click', function(e){
	e.preventDefault();
	var nombre=document.getElementById('nombre').value
	var apellido=document.getElementById('apellido').value
	var telefono=document.getElementById('telefono').value
	var email=document.getElementById('email').value
	var padecimientos=document.getElementById('padecimientos').value
	var procedimiento=document.getElementById('procedimiento').value
	var fecha=document.getElementById('fecha').value
	var hora=document.getElementById('hora').value
	var comentario=document.getElementById('comentario').value

	var datas= new FormData();
	datas.append("nombre", nombre)
	datas.append("apellido", apellido)
	datas.append("telefono", telefono)
	datas.append("email", email)
	datas.append("padecimientos", padecimientos)
	datas.append("procedimiento", procedimiento)
	datas.append("fecha", fecha)
	datas.append("hora", hora)
	datas.append("comentario", comentario)

	var controlador="agregarCita";
	var metodo="POST"
    if (this.value=="Modificar") {
		controlador="actualizarCita";
		// metodo="PUT"
		var id_cita=document.getElementById('id_cita').value
		datas.append("id_cita", id_cita)
			
	}
	

	fetch(controlador, {
        method: metodo,
        body: datas
    }).then(data =>{
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
			fetch('eliminarCita/'+this.value, {
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
			document.getElementById("id_cita").value=datos["id_cita"];
			document.getElementById('nombre').value=datos["nombre"];
			document.getElementById('apellido').value=datos["apellido"];
			document.getElementById('telefono').value=datos["celular"];
			document.getElementById('email').value=datos["email"];
			document.getElementById('padecimientos').value=datos["padecimientos"];
			document.getElementById('procedimiento').value=datos["procedimiento"];
			document.getElementById('fecha').value=datos["fecha"];
			document.getElementById('hora').value=datos["hora"];
			document.getElementById('comentario').value=datos["comentario"];
	   
        }};
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarCita')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)
function limpiar(){
	document.getElementById('nombre').value="";
	document.getElementById('apellido').value="";
	document.getElementById('telefono').value="";
	document.getElementById('email').value="";
	document.getElementById('padecimientos').value="";
	document.getElementById('procedimiento').value="";
	document.getElementById('fecha').value="";
	document.getElementById('hora').value="";
	document.getElementById('comentario').value="";
    
   
	var btn=document.getElementById('guardarCita')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarCita').modal('hide');
}
