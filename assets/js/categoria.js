window.addEventListener('DOMContentLoaded', recargar);
var formulario=document.getElementById("formCategoria");
var respuesta=document.getElementById("bodyCategoria");

var base_url = "";
if(location.hostname =="localhost"){
	var path = window.location.pathname.split( '/' );
	base_url = window.location.origin;
	base_url = base_url+"/"+path[1]+"/";
}else{
	base_url = location.protocol+"//"+location.hostname+"/";
}

var url_api= base_url+"api/Categoria/";
var url_server= base_url+"Categoria/";

var url_server2= base_url+"Tipo/";

/////////////////////-----------------------------------------GET----------------------------------------//////////////////





function recargar(){
    fetch(url_server+'cargarCategoria')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				var datoFecth=datos
				
				fetch(url_server2+'cargarDatosTipo')
            	.then(res => res.json())
            	.then(data => {
					
					var tipo = new Array();
					data.forEach(element => {
					tipo[element.id_tipo] = element.nombre;
					})


				datoFecth.forEach(element => {
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_categoria}">
					<td>${tipo[element.id_tipo]}</td>
					<td>${element.nombre}</td>
					<td>${element.descripcion}</td>
					<td>${(element.estado == 0)?'Inactivo':'Activo'}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_categoria}" data-toggle="modal" data-target="#agregarCategoria">GESTIONAR</button>
						
						
						<button class="btnEliminar text-center btn btn-rounded ${(element.estado==0)?'btn-success':'btn-danger'}" id="${element.id_categoria}" value="${element.id_categoria}" >${(element.estado==1)?'DAR BAJA':'ACTIVAR'}</button>					
					
					
						</td>
    			</tr>`
				});
					
					respuesta.innerHTML=texto;
					asignarEventos();

					var p = new Paginador(
						document.getElementById('paginador'),
						document.getElementById('ajaxTabla'),
						5); p.Mostrar();
						
						
					})



				})
					
			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarCategoria').addEventListener('click', function(e){
	e.preventDefault();

	if (validarCampo()) {
		
	}else{
		
    	var nombre=document.getElementById('nombre').value
		var descripcion=document.getElementById('descripcion').value

		var datas= new FormData();
		datas.append("nombre", nombre)
		datas.append("descripcion", descripcion)
		document.getElementById("nuevo").innerText="Agregar una nueva categoria"
		var id_tipo = document.getElementById("tipo").value;
		datas.append("id_tipo", id_tipo)
		var controlador="agregarCategoria";
		var metodo="POST"
    	if (this.value=="Modificar") {
		controlador="actualizarCategoria";
		// metodo="PUT"
		var id_categoria=document.getElementById('id_categoria').value

		// if (document.getElementById('estado').checked===true) {
		// 	datas.append("estado", 1)
		// }else{
		// 	datas.append("estado", 0)
			
		// }
		
		
		datas.append("id_categoria", id_categoria)


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
            limpiar(); 
			recargar();
				
		  }})
	}

});


/////////////////////------------------------------------------------DELETE---------------------------------------------------//////////////////	
function eliminar() {
	
	if (document.getElementById(this.value).innerText==="ACTIVAR") {
			fetch(url_server+'activarCategoria/'+this.value)
				.then(() =>{
					recargar();		
				})
				
	}else{
	Swal.fire({
		title: 'Esta seguro de dar de baja la categoria?',
		text: "Esta accion puede causar que cierto contenido no sea visible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(url_server+'eliminarCategoria/'+this.value)
				.then(() =>{
					Swal.fire(
						'Dado de baja!',
						'!La categoria ha sido dada de baja!',
						'success'
					  )
					recargar();		
				})
		}
	})
	}
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
			document.getElementById("id_categoria").value=datos["id_categoria"];
			document.getElementById('nombre').value=datos["nombre"];
			document.getElementById('descripcion').value=datos["descripcion"];
			document.getElementById('tipo').value=datos["id_tipo"]
			
			document.getElementById("nuevo").innerText="Modificando una categoria de la tabla"
			// if (datos["estado"]==1) {
			// 	document.getElementById('estado').checked=true;
			// }
			
	   
        }};
    peticion.open('GET', url_api+'obtenerRegistro/'+this.value);
	peticion.send();
	
	btn= document.getElementById('guardarCategoria')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)

function limpiar(){
	$('#agregarCategoria').modal('hide');
	document.getElementById('tipo').value=1;
	document.getElementById('nombre').value="";
	document.getElementById('descripcion').value="";
	document.getElementById('mensaje').innerHTML="";
	document.getElementById("nuevo").innerText="Agregar una nueva categoria"
    
	// document.getElementById('oculto').style.display = 'none';
	// document.getElementById('estado').checked=0; 
	var btn=document.getElementById('guardarCategoria')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	
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
				
				var texto="";
				var datoFecth=datos
				fetch(url_server2+'cargarDatosTipo')
            	.then(res => res.json())
            	.then(data => {
					
					var tipo = new Array();
					data.forEach(element => {
					tipo[element.id_tipo] = element.nombre;					
					})
					datoFecth.forEach(element => {
					
					texto+=`
					<tr class="p-0 border-bottom border-info" id="tr${element.id_categoria}">
					<td>${tipo[element.id_tipo]}</td>
					<td>${element.nombre}</td>
					<td>${element.descripcion}</td>
					<td>${(element.estado == 0)?'Inactivo':'Activo'}</td>
            		<td class="px-0 py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_categoria}" data-toggle="modal" data-target="#agregarCategoria">GESTIONAR</button>
						
						
						<button class="btnEliminar text-center btn btn-rounded ${(element.estado==0)?'btn-success':'btn-danger'}" id="${element.id_categoria}" value="${element.id_categoria}" >${(element.estado==1)?'DAR BAJA':'ACTIVAR'}</button>					
					
					
						</td>
    			</tr>`
				});
				
					if (datoFecth.length>0) {
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
		
});


	}else{
		document.getElementById("busqueda").value="";
		recargar();
	}
	
});


function validarCampo(){
		var comprobador=false;
		var nombre=document.getElementById('nombre')
		var descripcion=document.getElementById('descripcion')
		var mensaje=document.getElementById('mensaje')

		// console.log($.trim(nombres.value).length+"_"+$.trim(nombres.value))
		if (($.trim(nombre.value)=="")||(!nombre.checkValidity)||($.trim(nombre.value).length<=4)) {
			comprobador=true;
			
			if (nombre.validationMessage=="") {
				mensaje.innerHTML=`Ingrese datos correctos en nombre por favor`
			}else{
				mensaje.innerHTML=`${nombre.validationMessage+" nombre"}`;
			}
			nombre.value="";
			nombre.focus();

			// console.log("nombre "+comprobador+nombres.validationMessage)
			
		}else if (($.trim(descripcion.value)=="")||(!descripcion.checkValidity)||($.trim(descripcion.value).length<=4)) {
			comprobador=true;
			
			if (descripcion.validationMessage=="") {
				mensaje.innerHTML=`Ingrese datos correctos en descripcion por favor`
			}else{
				mensaje.innerHTML=`${descripcion.validationMessage+" descripcion"}`;
			}
			descripcion.value="";
			descripcion.focus();
		}
		return comprobador;
    	
	}















