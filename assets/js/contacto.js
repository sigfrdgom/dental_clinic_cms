window.addEventListener('load', recargar);
var formulario=document.getElementById("formContacto");
var respuesta=document.getElementById("bodyContacto");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('cargarDatosContacto')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				datos.forEach(element => {
				 texto+=`
				<tr class="p-0" id="tr${element.id_contacto}">
					<td>${element.nombre+" "+element.apellido}</td>
					<td>${element.telefono}</td>
					<td>${element.email}</td>
					<td>${element.comentario}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded" style="width:49%; margin:0px;" value="${element.id_contacto}" data-toggle="modal" data-target="#agregarContacto">EDITAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded" style="width:49%; margin:0px;" value="${element.id_contacto}">ELIMINAR</button>
					</td>
    			</tr>`
				});
					respuesta.innerHTML=texto;
					asignarEventos();
				})
					
			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarContacto').addEventListener('click', function(e){
	e.preventDefault();
	var nombre=document.getElementById('nombre').value
	var apellido=document.getElementById('apellido').value
	var telefono=document.getElementById('telefono').value
	var email=document.getElementById('email').value
	var comentario=document.getElementById('comentario').value

	var datas= new FormData();
	datas.append("nombre", nombre)
	datas.append("apellido", apellido)
	datas.append("telefono", telefono)
	datas.append("email", email)
	datas.append("comentario", comentario)

	var controlador="agregarContacto";
	var metodo="POST"
    if (this.value=="Modificar") {
		controlador="actualizarContacto";
		// metodo="PUT"
		var id_contacto=document.getElementById('id_contacto').value
		datas.append("id_contacto", id_contacto)
			
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
		title: '¿Esta seguro de eliminar el mensaje?',
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
						'!El mensaje ha sido eliminado',
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
			document.getElementById("id_contacto").value=datos["id_contacto"];
			document.getElementById('nombre').value=datos["nombre"];
			document.getElementById('apellido').value=datos["apellido"];
			document.getElementById('telefono').value=datos["telefono"];
			document.getElementById('email').value=datos["email"];
			document.getElementById('comentario').value=datos["comentario"];
	   
        }};
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarContacto')
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
	document.getElementById('comentario').value="";
    
   
	var btn=document.getElementById('guardarContacto')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarContacto').modal('hide');
}
