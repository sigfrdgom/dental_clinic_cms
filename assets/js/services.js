window.addEventListener('load', listener);
var url_base = window.location.href;

function listener() {
	document.getElementById('busqueda').addEventListener('keyup', recargar_tbody);
	recargar_tbody();
}

function recargar_tbody(){
	const busqueda = document.getElementById('busqueda').value;
	fetch(url_base+'/tbody/'+busqueda)
    .then(res => {return res.text()})
    .then(response => {
        document.getElementById('tbody-content').innerHTML = response;
        let btnDelete = document.getElementsByClassName('btn-delete');
        for(i=0; i<btnDelete.length; i++){
            btnDelete[i].addEventListener('click', deleteService);
		}

		

		// var p = new Paginador(
		// 	document.getElementById('paginador'),
		// 	document.getElementById('ajaxTabla'),
		// 	2); p.Mostrar(); 
    });
}

function deleteService() {
	Swal.fire({
		title: '¿Esta seguro de eliminar el servicio?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch('services/deleteService/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado!',
						'!El servicio ha sido eliminada!',
						'success'
					  );
					  recargar_tbody();
					  
				})
		}
	})

}
