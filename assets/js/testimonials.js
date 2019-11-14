window.addEventListener('load', listener);
var url_base = window.location.href;

function listener() {
	document.getElementById('busqueda').addEventListener('keyup',refresh_testimonials);
	refresh_testimonials();
}

function refresh_testimonials(){
	const busqueda = document.getElementById('busqueda').value;
	fetch(url_base+'/testimonials/'+busqueda)
    .then(res => {return res.text()})
    .then(response => {
		if(response.length > 0){
        document.getElementById('cards-content').innerHTML = response;
        let btnDelete = document.getElementsByClassName('btn-delete');
        for(i=0; i<btnDelete.length; i++){
            btnDelete[i].addEventListener('click', deleteTestimonials);
		}
		}else{
			document.getElementById('cards-content').innerHTML = `
			<div class="col-12 card p-2">
				<h2 class="text-center">No existen registros</h2>
			</div>
			`;
		}
	
    });
}

function deleteTestimonials() {
	Swal.fire({
		title: '¿Esta seguro de eliminar la publicación?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch('testimonials/deleteTestimonials/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado!',
						'!El Testimnio ha sido eliminada!',
						'success'
					  );
					  refresh_testimonials();
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