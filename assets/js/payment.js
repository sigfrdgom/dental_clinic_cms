window.addEventListener('load', listener);

var base_url = "";
if (location.hostname == "localhost") {
	var path = window.location.pathname.split('/');
	base_url = window.location.origin;
	base_url = base_url + "/" + path[1] + "/";
} else {
	base_url = location.protocol + "//" + location.hostname + "/";
}

function listener(){
    refresh_cards();
}

function refresh_cards() {
	fetch(base_url + "api/payment/payment")
		.then(res => { return res.json() })
		.then(response => {
			payMethods = "";
			if(response.length > 0){
				response.forEach(element => {
					payMethods += `
				<div class="col-lg-3 col-md-6">
					<div class="card" style="height: 96%">
                        
                        <div class="card-body">
							<h5 class="card-title">${element.titulo}</h5>
							<p class="card-text">${element.contenido}</p>
							<div class="col-12 mx-auto text-center">`;
					if (element.estado == 1) {
						payMethods += `
								<i class="fa fa-eye" style="font-size: 3em; color: #00aeef;"></i>
								`;
					} else {
						payMethods += `
								<i class="fa fa-eye-slash" style="font-size: 3em; color: gray;"></i>
								`;
					}
					payMethods += `
						</div>
						</div>
						
						<div class="row p-2">
							<a href="${base_url}payment/edit/${element.id_publicacion}" class="btn btn-warning mx-auto col-5">Editar</a>
							<button type="button" name="btn-eliminar" value="${element.id_publicacion}" class="btn btn-danger mx-auto col-5">Eliminar</button>
						</div>
						<div class="card-footer text-center">
							<small class="text-muted">${element.fecha_ingreso}</small>
						</div>
					</div>
				</div>
                `;
				});
			}else{
				payMethods = `
				<div class="col-12 card p-2">
					<h2 class="text-center">No existen registros</h2>
				</div>
				`;
			}

			document.getElementById('image-content').innerHTML = payMethods;

		}).then(() => {
			asignEvents();
		});
}

function asignEvents() {
	btnDelete = document.getElementsByName("btn-eliminar");
	for (let i = 0; i < btnDelete.length; i++) {
		btnDelete[i].addEventListener('click', deleteImage);
	}
}

function deleteImage() {
	Swal.fire({
		title: '¿Esta seguro de eliminar el método de pago?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(base_url + 'payment/delete/' + this.value, {
				method: 'DELETE'
			})
				.then(() => {
					Swal.fire(
						'Eliminado!',
						'!La publicación ha sido eliminada!',
						'success'
					);
					refresh_cards();
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