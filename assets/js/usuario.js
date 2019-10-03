window.addEventListener('load', recargar);
var formulario=document.getElementById("formUsuario");
var respuesta=document.getElementById("bodyUsuario");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('http://localhost/dental_clinic_cms/usuario_controller/cargarDatosUsuario')
            .then(res => res.json())
            .then(datos => {
				var texto="";
				// console.log(datos)
				datos.forEach(element => {
					if (element.estado==1) {
						estado="Activo";
					}else{
						estado="Desactivado";
					}
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_usuario}">
    				<td>${element.nombres}</td>
    				<td>${element.apellidos}</td>
    				<td>${element.nombre_usuario}</td>
					<td>${element.tipo_usuario}</td>
					<td>${estado}</td>
            		<td class="py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_usuario}" data-toggle="modal" data-target="#agregarUsuario">EDITAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_usuario}">ELIMINAR</button>
            		</td>
    			</tr>`
				});

						
					respuesta.innerHTML=texto;
					// respuesta.innerHTML="hola";
					asignarEventos();
				})
					
			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarUsuario').addEventListener('click', function(e){
	e.preventDefault();
    var nombres=document.getElementById('nombres').value
   	var apellidos=document.getElementById('apellidos').value
	var nombre_usuario=document.getElementById('usuario').value
	var pass=document.getElementById('pass').value
	var tipo_usuario=document.querySelector('input[name="tipo_usuario"]:checked')

	var datas= new FormData();
	datas.append("nombres", nombres)
	datas.append("apellidos", apellidos)
	datas.append("usuario", nombre_usuario)
	datas.append("pass", pass)
	datas.append("tipo_usuario", tipo_usuario.value)


	var controlador="agregarUsuario";
	var metodo="POST"
    if (this.value=="Modificar") {
		controlador="actualizarUsuario";
		// metodo="PUT"
		let estado=document.querySelector('input[name="estado"]:checked')
		var id_usuario=document.getElementById('id_usuario').value
		datas.append("id_usuario", id_usuario)
		datas.append("estado", estado.value)	
    }

	// var dataJson = {};
	// 	for (const [key, value]  of datas.entries()) {
	// 		dataJson[key] = value;
	// 	}

		
	
	fetch(controlador, {
        method: metodo,
        body: datas
    }) .then(data =>{
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
		title: '¿Esta seguro de eliminar el usuario?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch('eliminarUsuario/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado',
						'!El usuario ha sido eliminado',
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
			document.getElementById("id_usuario").value=datos["id_usuario"];
    		document.getElementById('nombres').value=datos["nombres"];
   			document.getElementById('apellidos').value=datos["apellidos"];
			document.getElementById('usuario').value=datos["nombre_usuario"];
			document.getElementById('pass').value=datos["contrasenia"]; 

			switch (datos["tipo_usuario"]) {
				case "Administrador":
					document.getElementById("tipo1").checked = true;	
				break;
				case "Generador de contenido":
					document.getElementById("tipo2").checked = true;	
				break;
				case "Usuario normal":
				document.getElementById("tipo3").checked = true;
				break;
			}
	
    
			if (datos["estado"]==1) {
				document.getElementById("estado1").checked = true;
			}else{
				document.getElementById("estado2").checked = true;
			}
            
            
        }};
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarUsuario')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)

function limpiar(){
    document.getElementById("oculto").setAttribute("hidden", "true")
    document.getElementById('nombres').value="";
    document.getElementById('apellidos').value="";
    document.getElementById('usuario').value=""; 
    
    radio1= document.getElementById("estado1");
    radio2= document.getElementById("estado2");
    radio2.removeAttribute("checked")
	radio1.setAttribute("checked", "");
	var btn=document.getElementById('guardarUsuario')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarUsuario').modal('hide');
}





document.getElementById("busqueda").addEventListener("keyup", function(){
	
	
	
	var busqueda=document.getElementById("busqueda").value;
	if (busqueda!==""&&busqueda!==" ") {
		var datas= new FormData();
		datas.append("busqueda", busqueda)
		fetch('findByCriteria', {
        method: "POST",
        body: datas
    }).then(res => res.json()).then(datos => {
				// console.log(datos)
				var texto="";
				datos.forEach(element => {
					
					if (element.estado==1) {
						estado="Activo";
					}else{
						estado="Desactivado";
					}
				 texto+=`
				<tr class="p-0 border-bottom border-info" id="tr${element.id_usuario}">
    				<td>${element.nombres}</td>
    				<td>${element.apellidos}</td>
    				<td>${element.nombre_usuario}</td>
					<td>${element.tipo_usuario}</td>
					<td>${estado}</td>
            		<td class="py-2">
						<button class="btnEditar text-center btn btn-warning btn-rounded"  value="${element.id_usuario}" data-toggle="modal" data-target="#agregarUsuario">EDITAR</button>
						<button class="btnEliminar text-center btn btn-danger btn-rounded"  value="${element.id_usuario}">ELIMINAR</button>
            		</td>
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
