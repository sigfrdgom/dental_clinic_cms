window.addEventListener('load', recargar);
var formulario=document.getElementById("formTipo");
var respuesta=document.getElementById("bodyTipo");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('cargarDatosTipo')
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
						<button class="btnEditar text-center btn btn-warning btn-rounded" style="width:49%; margin:0px;" value="${element.id_tipo}" data-toggle="modal" data-target="#agregarTipo">EDITAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded" style="width:49%; margin:0px;"  value="${element.id_tipo}">ELIMINAR</button>
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
	
	var datas= new FormData();
	datas.append("nombre", nombreTipo)
	var controlador="agregarTipo";
	var metodo="POST"
    if (this.value=="Modificar") {
		controlador="actualizarTipo";
		// metodo="PUT"
		let estado=document.querySelector('input[name="estado"]:checked')
		var id_tipo=document.getElementById('id_tipo').value
		datas.append("id_tipo", id_tipo)
		datas.append("estado", estado.value)	
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
		title: '¿Esta seguro de eliminar el tipo?',
		text: "¡Esta accion no es reversible y puede ser fatal!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch('eliminarTipo/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado',
						'!El Tipo de contenido ha sido eliminado',
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
    document.getElementById("oculto").removeAttribute("hidden")
	
	let peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if(this.readyState==4){
			datos=JSON.parse(this.responseText);
			document.getElementById("id_tipo").value=datos["id_tipo"];
			document.getElementById('nombre').value=datos["nombre"];
	
    
			if (datos["estado"]==1) {
				document.getElementById("estado1").checked = true;
			}else{
				document.getElementById("estado2").checked = true;
			}
            
            
        }};
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarTipo')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)
function limpiar(){
    document.getElementById("oculto").setAttribute("hidden", "true")
    document.getElementById('nombre').value="";
    
    radio1= document.getElementById("estado1");
    radio2= document.getElementById("estado2");
    radio2.removeAttribute("checked")
	radio1.setAttribute("checked", "");
	var btn=document.getElementById('guardarTipo')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarTipo').modal('hide');
}
