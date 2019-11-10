window.addEventListener('load', recargar);
// var formulario=document.getElementById("formBitacora");
var respuesta=document.getElementById("bodyBitacora");

var base_url = "";
if(location.hostname =="localhost"){
	var path = window.location.pathname.split( '/' );
	base_url = window.location.origin;
	base_url = base_url+"/"+path[1]+"/";
}else{
	base_url = location.protocol+"//"+location.hostname+"/";
}

var url_api= base_url+"api/Bitacora/";
var url_server= base_url+"Bitacora/";

/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch(url_api+'cargarBitacora')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				datos.forEach(element => {
				//     var estado;
				// 	if (element.estado==1) {
				// 		estado="Activo";
				// 	}else{
				// 		estado="Desactivado";
				// 	}
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_bitacora}">
    				<td>${element.usuario}</td>
					<td>${element.accion}</td>
					<td>${element.fecha}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_bitacora}" data-toggle="modal" data-target="#agregarBitacora">VER A DETALLE</button>
				
						</td>
    			</tr>`
				});
					// document.getElementById('oculto').style.display = 'none';
					respuesta.innerHTML=texto;
					asignarEventos();

					var p = new Paginador(
						document.getElementById('paginador'),
						document.getElementById('ajaxTabla'),
						5); p.Mostrar(); 
				})
					
			

}



/////////////////////------------------------------------------------DELETE---------------------------------------------------//////////////////	
// function eliminar() {
	
// 	if (document.getElementById(this.value).innerText==="ACTIVAR") {
// 			fetch(url_server+'activarBitacora/'+this.value)
// 				.then(() =>{
// 					recargar();		
// 				})
				
// 	}else{
// 	Swal.fire({
// 		title: 'Esta seguro de dar de baja la bitacora?',
// 		text: "Esta accion puede causar que cierto contenido no sea visible",
// 		type: 'warning',
// 		showCancelButton: true,
// 		confirmButtonColor: '#36bea6',
// 		cancelButtonColor: '#d33',
// 		confirmButtonText: 'Si, estoy seguro!',
// 		cancelButtonText: 'Cancelar',
// 	}).then((result) => {
// 		if (result.value) {
// 			fetch(url_server+'eliminarBitacora/'+this.value)
// 				.then(() =>{
// 					Swal.fire(
// 						'Dado de baja!',
// 						'!La bitacora ha sido dada de baja!',
// 						'success'
// 					  )
// 					recargar();		
// 				})
// 		}
// 	})
// 	}
// }

/////////////////////----------------------------------------PREPARACION DE EVENTOS--------------------------------------//////////////////

function asignarEventos(){
    var btnEditar=document.getElementsByClassName('btnEditar');
	// var btnEliminar=document.getElementsByClassName('btnEliminar');
	
	for (var index = 0; index <btnEditar.length; index++) {
	
		//PARA EMPEZAR A CARGAR
        btnEditar[index].addEventListener('click', accion);
        // btnEliminar[index].addEventListener('click', eliminar);
        
    }
}


/////////////////////----------------------------------------PREPARACION DE DATOS EN FORMULARIO------------------------------------//////////////////
function accion() {
// 	var datos = new Array();
	
//     let peticion=new XMLHttpRequest();
//     peticion.onreadystatechange=function(){
//         if(this.readyState==4){
// 			datos=JSON.parse(this.responseText);
// 			document.getElementById("id_bitacora").value=datos["id_bitacora"];
// 			document.getElementById('nombre').value=datos["nombre"];
// 			document.getElementById('descripcion').value=datos["descripcion"];
			
// 			document.getElementById("nuevo").innerText="Modificando una bitacora de la tabla"
// 			// if (datos["estado"]==1) {
// 			// 	document.getElementById('estado').checked=true;
// 			// }
			
	   
//         }};
//     peticion.open('GET', url_api+'obtenerRegistro/'+this.value);
// 	peticion.send();
	
// 	btn= document.getElementById('guardarBitacora')
//     btn.removeAttribute("value")
// 	btn.setAttribute("value", "Modificar")
    
// }

// document.getElementById("btnReset").addEventListener("click", limpiar)
// document.getElementById("idModal").addEventListener("click", limpiar)

// function limpiar(){
//     $('#agregarBitacora').modal('hide');
// 	document.getElementById('nombre').value="";
// 	document.getElementById('descripcion').value="";
// 	document.getElementById('mensaje').innerHTML="";
// 	document.getElementById("nuevo").innerText="Agregar una nueva bitacora"
    
// 	// document.getElementById('oculto').style.display = 'none';
// 	// document.getElementById('estado').checked=0; 
// 	var btn=document.getElementById('guardarBitacora')
//     btn.removeAttribute("value")
// 	btn.setAttribute("value", "Guardar");
	
}



document.getElementById("busqueda").addEventListener("keyup", function(){
	
	var busqueda=document.getElementById("busqueda").value;
	if (busqueda!==""&&busqueda!==" ") {
		var datas= new FormData();
		datas.append("busqueda", busqueda)
		fetch(url_api+'findByCriteria', {
        method: "POST",
        body: datas
    }).then(res => res.json()).then(datos => {
				// console.log(datos)
				var texto="";
				datos.forEach(element => {
				 texto+=`
				 <tr class="p-0 border-bottom border-info" id="tr${element.id_bitacora}">
				 <td>${element.usuario}</td>
				 <td>${element.accion}</td>
				 <td>${element.fecha}</td>
				 <td class="px-0 py-2">
					 <button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_bitacora}" data-toggle="modal" data-target="#agregarBitacora">VER A DETALLE</button>
			 
					 </td>
			 	</tr>`
				});
					if (datos.length>0) {
						respuesta.innerHTML=texto;
						asignarEventos();
						var p = new Paginador(
							document.getElementById('paginador'),
							document.getElementById('ajaxTabla'),
							2); p.Mostrar(); 	
					}else{
						respuesta.innerHTML="NO HAY REGISTRO COINCIDENTES";
					 
					}
					
			})
		



	}else{
		document.getElementById("busqueda").value="";
		recargar();
	}
	
});





