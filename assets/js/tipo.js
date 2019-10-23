window.addEventListener('load', recargar);
var formulario=document.getElementById("formTipo");
var respuesta=document.getElementById("bodyTipo");
// var url_api="http://localhost/dental_clinic_cms/api/tipo/";
var url_server="http://localhost/dental_clinic_cms/tipo_controller/";


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch(url_server+'cargarDatosTipo')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				datos.forEach(element => {
					if (element.estado==1) {
						estado="Activo";
					}else{
						estado="Desactivado";
					}
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_tipo}">
    				<td>${element.nombre}</td>
					<td>${estado}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_tipo}" data-toggle="modal" data-target="#agregarTipo">GESTIONAR</button>


						<button class="btnEliminar text-center btn btn-rounded ${(element.estado==0)?'btn-success':'btn-danger'}" id="${element.id_tipo}" value="${element.id_tipo}" >${(element.estado==1)?'DAR BAJA':'ACTIVAR'}</button>					
					
						
            		</td>
    			</tr>`
				});
					respuesta.innerHTML=texto;
					asignarEventos();
				})
					
			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarTipo').addEventListener('click', function(e){
	e.preventDefault();
	var nombreTipo=document.getElementById('nombre').value
	document.getElementById("nuevo").innerText="Agregando un nuevo tipo"
	
	var datas= new FormData();
	datas.append("nombre", nombreTipo)
	var controlador="agregarTipo";
	var metodo="POST"
    if (this.value=="Modificar") {
		controlador="actualizarTipo";
		// metodo="PUT"
		// let estado=document.querySelector('input[name="estado"]:checked')
		var id_tipo=document.getElementById('id_tipo').value
		datas.append("id_tipo", id_tipo)
		// datas.append("estado", estado.value)	
	}
	

	fetch(url_server+controlador, {
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
	
	if (document.getElementById(this.value).innerText==="ACTIVAR") {
		fetch(url_server+'activarTipo/'+this.value)
			.then(() =>{
				recargar();		
			})
			

		}else{
			Swal.fire({
				title: '¿Esta seguro de dar de baja el tipo?',
				text: "¡Esta accion puede causar que ciertos contenidos no sean visibles!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#36bea6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, estoy seguro!',
				cancelButtonText: 'Cancelar',
			}).then((result) => {
				if (result.value) {
					fetch(url_server+'eliminarTipo/'+this.value, {
					method: 'DELETE'
				})
					.then(() =>{
						Swal.fire(
						'Dado de baja',
						'!El Tipo de contenido ha sido dado de baja',
						'success'
						)
					recargar();		
				})
		}
	})}

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
    // document.getElementById("oculto").removeAttribute("hidden")
	
	let peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if(this.readyState==4){
			datos=JSON.parse(this.responseText);
			document.getElementById("id_tipo").value=datos["id_tipo"];
			document.getElementById('nombre').value=datos["nombre"];
			document.getElementById("nuevo").innerText="Modificando una tipo de la tabla"
	
            
        }};
    peticion.open('GET', url_server+'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarTipo')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)
function limpiar(){
    // document.getElementById("oculto").setAttribute("hidden", "true")
    document.getElementById('nombre').value="";
    document.getElementById("nuevo").innerText="Agregando un nuevo tipo"
    // radio1= document.getElementById("estado1");
    // radio2= document.getElementById("estado2");
    // radio2.removeAttribute("checked")
	// radio1.setAttribute("checked", "");
	var btn=document.getElementById('guardarTipo')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarTipo').modal('hide');
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
				var texto="";
				datos.forEach(element => {
					if (element.estado==1) {
						estado="Activo";
					}else{
						estado="Desactivado";
					}
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_tipo}">
    				<td>${element.nombre}</td>
					<td>${estado}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_tipo}" data-toggle="modal" data-target="#agregarTipo">EDITAR</button>
					
						<button class="btnEliminar text-center btn btn-rounded ${(element.estado==0)?'btn-success':'btn-danger'}" id="${element.id_tipo}" value="${element.id_tipo}" >${(element.estado==1)?'DAR BAJA':'ACTIVAR'}</button>
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
