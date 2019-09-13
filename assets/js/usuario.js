window.addEventListener('load', recargar);
var formulario=document.getElementById("formUsuario");
var respuesta=document.getElementById("bodyUsuario");


/////////////////////------------------------------GET-------------------------------------//////////////////


function recargar(){
    var peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        

        if(this.readyState==4){
            document.getElementById('bodyUsuario').innerHTML=this.responseText;
            asignarEventos();
        }};
    peticion.open('GET', 'cargarDatosUsuario');
    peticion.send();
}


function asignarEventos(){
    
    // document.getElementById('btn').addEventListener('click', accion);
    var btnEditar=document.getElementsByClassName('btnEditar');
    var btnEliminar=document.getElementsByClassName('btnEliminar');

    for (var index = 0; index <btnEditar.length; index++) {
        //PARA EMPEZAR A CARGAR
        btnEditar[index].addEventListener('click', actualizar);
        btnEliminar[index].addEventListener('click', eliminar);
        
    }
}


/////////////////////---------------------POST-------------------------------------//////////////////


formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log("me diste un click");
    var datos= new FormData(formulario);
	
//  http://localhost/dental_clinic_cms/usuario_controller/agregarUsuario

    fetch('agregarUsuario', {
        method: 'POST',
        body: datos
    }).then(res => res)
      .then(data =>{
        //   console.log(data);
          if(data=="error"){
            respuesta.innerHTML=
          `ERROR`;
          }else{
			recargar();
          }
          
      })//.catch(e => {respuesta.innerHTML= `algun error`; return "No esta funcionando"  })

})





//   var contenido = document.querySelector("#bodyUsuario")
		
//   			function recargar() {
          
//             fetch('cargarDatosUsuario')
//             .then(res => res)
//             .then(datos => {
//         	 console.log(datos);
//             tabla(datos);
//             })
//         }
    
//         function tabla(datos){
//                 // console.log(datos);
//                 //estos remplaza al html que tiene contenido la etiquea
//                 contenido.innerHTML='';

//                 for (let valor of datos) {
//                     // console.log(valor.nombre);
//                     contenido.innerHTML+=`
                    
//                     <tr>
// 						<td>${valor.get('nombres')}</td>
// 						<td>${valor.get('apellidos')}</td>
// 						<td>${valor.get('usuario')}</td>
// 						<td>${valor.get('tipo_usuario')}</td>
// 						<td>${valor.get('estado')}</td>
// 					</tr>
//                     `; 
//                 }
                
			// }
			


/////////////////////---------------------------------ElIMINAR-------------------------------------//////////////////	


	function eliminar() {
    var peticion=new XMLHttpRequest();
    peticion.onreadystatechange=function(){
       if(this.readyState==4){
            recargar();
        }};

    peticion.open('GET', 'eliminarUsuario/'+this.value);
    peticion.send()
}

/////////////////////---------------------------------Actualizar-------------------------------------//////////////////

function asignarEventos(){
    
    // document.getElementById('btn').addEventListener('click', accion);
    var btnEditar=document.getElementsByClassName('btnEditar');
    var btnEliminar=document.getElementsByClassName('btnEliminar');

    for (var index = 0; index <btnEditar.length; index++) {
        //PARA EMPEZAR A CARGAR
        btnEditar[index].addEventListener('click', actualizar);
        btnEliminar[index].addEventListener('click', eliminar);
        
    }
}


//EMPEZANDOS -:V
function actualizar() {
	console.log(respuesta.childNodes)
    // document.getElementById('nombre').innerHTML=formulario.children;
  
        
    

}










  // var descripcion=document.getElementById('descripcion').value;
    // var autor=document.getElementById('autor').value;


    // estado="DISPONIBLES"

        
    // var peticion=new XMLHttpRequest();
    // peticion.open('POST', 'Libro/'+this.value);
    // peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // peticion.send(datos);
    // peticion.onreadystatechange=function(){
        
    //     if(this.readyState==4){
    //         document.getElementById('cuerpo').innerHTML=this.responseText;
           
    //         recargar();
    //     // limpiar();

    //         document.getElementById('btn').value="agregar";
    //         document.getElementById('btn').innerHTML="AGREGAR";
    //     }};

    //      var datos='titulo='+titulo+"&descripcion="+descripcion+"&autor="+autor+"&estado="+estado;
    //     // if (this.value=="update") {
    //     //     datos +='&id_libro='+id_libro;
    //     // }

    //     // alert(datos);
