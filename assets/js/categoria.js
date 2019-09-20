window.addEventListener('load', recargar);
var formulario=document.getElementById("formCategoria");
var respuesta=document.getElementById("bodyCategoria");


/////////////////////-----------------------------------------GET----------------------------------------//////////////////
function recargar(){
    fetch('cargarDatosCategoria')
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
				<tr id="tr${element.id_categoria}">
    				<td>${element.nombre_categoria}</td>
					<td>${element.descripcion}</td>
            		<td>
					<button class="btnEditar text-center btn btn-info" value="${element.id_categoria}" data-toggle="modal" data-target="#agregarCategoria">EDITAR</button>
                	<button class="btnEliminar text-center btn btn-danger"  value="${element.id_categoria}">ELIMINAR</button>
					</td>
    			</tr>`
				});
					respuesta.innerHTML=texto;
					asignarEventos();
				})
					
			

}
/////////////////////----------------------------------------POST y PUT------------------------------------------//////////////////
document.getElementById('guardarCategoria').addEventListener('click', function(e){
	e.preventDefault();
    var nombre_categoria=document.getElementById('nombre_categoria').value
	var descripcion=document.getElementById('descripcion').value

	var datas= new FormData();
	datas.append("nombre_categoria", nombre_categoria)
	datas.append("descripcion", descripcion)

	var controlador="agregarCategoria";
	var metodo="POST"
    if (this.value=="Modificar") {
		controlador="actualizarCategoria";
		// metodo="PUT"
		var id_categoria=document.getElementById('id_categoria').value
		datas.append("id_categoria", id_categoria)
			
	}
	

	fetch(controlador, {
        method: metodo,
        body: datas
    }).then(res => res)
      .then(data =>{
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
	fetch('eliminarCategoria/'+this.value, {
        method: 'DELETE'
    }).then(res =>{
        	recargar();		
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
			document.getElementById("id_categoria").value=datos["id_categoria"];
			document.getElementById('nombre_categoria').value=datos["nombre_categoria"];
			document.getElementById('descripcion').value=datos["descripcion"];
	   
        }};
    peticion.open('GET', 'obtenerRegistro/'+this.value);
	peticion.send();
	btn= document.getElementById('guardarCategoria')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Modificar")
    
}

document.getElementById("btnReset").addEventListener("click", limpiar)
document.getElementById("idModal").addEventListener("click", limpiar)
function limpiar(){
	document.getElementById('nombre_categoria').value="";
	document.getElementById('descripcion').value="";
    
   
	var btn=document.getElementById('guardarCategoria')
    btn.removeAttribute("value")
	btn.setAttribute("value", "Guardar");
	$('#agregarCategoria').modal('hide');
}
