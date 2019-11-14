window.addEventListener('load', listener);
var url_base = window.location.href;

function listener() {
	document.getElementById('busqueda').addEventListener('keyup', refresh);
	refresh();
}

function refresh(){
	const busqueda = document.getElementById('busqueda').value;
	fetch(url_base+'/tbody/'+busqueda)
    .then(res => {return res.text()})
    .then(response => {
		if(response.length > 0){
        document.getElementById('cards-content').innerHTML = response;
        let btnDelete = document.getElementsByClassName('btn-delete');
        for(i=0; i<btnDelete.length; i++){
            btnDelete[i].addEventListener('click', deleteService);
		}
		var p = new Paginador(
			document.getElementById('paginador'),
			document.getElementsByClassName('card'),
			5); p.Mostrar(); 
		}else{
			document.getElementById('cards-content').innerHTML = `
			<div class="col-12 card p-2">
				<h2 class="text-center">No existen registros</h2>
			</div>
			`;
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
						'!El servicio ha sido eliminada!',
						'success'
					  );
					  refresh();
					  showMessage();
				})
		}
	})
}

function showMessage(){
	$.toast({
		heading: `Eliminación`,
		text: `Registro eliminado correctamente`,
		showHideTransition: 'fade',
		allowToastClose: true,
		icon: 'success',
		hideAfter: 3000,
		stack: 6,
		position: 'top-right',
		loaderBg: '#ff6849',
		bgColor: '#46e1b6',
		textColor: '#ffffff', 
	});
}