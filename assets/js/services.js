window.addEventListener('load', listener);
var url_base = window.location.href;

function listener() {
	// document.getElementById('btn-delete').addEventListener('click', deleteService);
	recargar_tbody();
}

function recargar_tbody(){
	console.log(url_base+'/tbody');
	fetch(url_base+'/tbody')
    .then(res => {return res.text()})
    .then(response => {
        document.getElementById('tbody-content').innerHTML = response;
        let btnDelete = document.getElementsByClassName('btn-delete');
        // let btnMostrar = document.getElementsByClassName('btn-mostrar');
        for(i=0; i<btnDelete.length; i++){
            btnDelete[i].addEventListener('click', deleteService);
            // btnMostrar[i].addEventListener('click', mostrar)
        }
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
						'!La servicio ha sido eliminada!',
						'success'
					  );
					  recargar_tbody();
				})
		}
	})

}