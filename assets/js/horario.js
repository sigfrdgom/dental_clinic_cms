window.addEventListener('DOMContentLoaded', listener);

var base_url = "";
if (location.hostname == "localhost") {
	var path = window.location.pathname.split('/');
	base_url = window.location.origin;
	base_url = base_url + "/" + path[1] + "/";
} else {
	base_url = location.protocol + "//" + location.hostname + "/";
}

function listener() {
	schedules();
	document.getElementById('saveSchedule').addEventListener('click', save);
	document.getElementById('btnReset').addEventListener('click', clear);
}

function schedules() {
	fetch(base_url + "api/homepage/schedules")
		.then(res => { return res.json() })
		.then(response => {
			content = "";
			if (response.length > 0) {
				response.forEach(element => {
					content += `
					<tr>
					<td class="align-middle">${element.contenido}</td>
					<td class="align-middle">${element.estado == true ? "Visible" : "Oculto"}</td>
					<td class="align-middle"><button type="button" name="btn-show" value="${element.id_publicacion}" class="btn btn-warning">Editar</button></td>
					<td class="align-middle"><button type="button" name="btn-delete" value="${element.id_publicacion}" class="btn btn-danger">Eliminar</button></td>
				</tr>
                `;
				});
			} else {
				content = `
				<div class="col-12 card p-2">
					<h2 class="text-center">No existen registros</h2>
				</div>
				`;
			}
			document.getElementById('horario-content').innerHTML = content;

		}).then(() => {
			asignEvents();
		});
}

function asignEvents() {
	btnDelete = document.getElementsByName("btn-delete");
	btnShow = document.getElementsByName("btn-show");
	// btnState = document.getElementsByName("btn-state");
	for (let i = 0; i < btnDelete.length; i++) {
		btnShow[i].addEventListener('click', showForm);
		btnDelete[i].addEventListener('click', deleteSchedule);
		// btnState[i].addEventListener('click', stateHandle);
	}
}

function showForm() {
	$('#modalForm').modal('show');
	fetch(base_url + "api/homepage/schedules/" + this.value)
		.then(res => { return res.json() })
		.then(response => {
			document.getElementById('id_horario').value = response.id_publicacion;
			// document.getElementById('contenido').value = response.contenido;
			CKEDITOR.instances.contenido.setData(response.contenido);
			document.getElementById('estado').value = response.estado;
		}).then(() => {
			document.getElementById('div-estado').style = "display: block";
		});
}

// function stateHandle(e) {
// 	fetch(base_url + "api/homepage/schedules/" + this.value)
// 		.then(res => { return res.json() })
// 		.then(response => {
// 				document.getElementById('id_horario').value = response.id_publicacion;
// 				document.getElementById('contenido').value = response.contenido;
// 				if (response.estado == true) {
// 					document.getElementById('estado').value = false;
// 				}
// 				if (response.estado == false) {
// 					document.getElementById('estado').value = true;
// 				}
// 		}).then(
// 			() => {
// 				save(e);
// 			}
// 		);
// }

function save(e) {
	e.preventDefault();
	let form = document.getElementById('fromSchedule');
	let data = new FormData(form);
	data.set('contenido', CKEDITOR.instances.contenido.getData());
	console.log(CKEDITOR.instances.contenido.getData());
	if (data.get('contenido') !== "") {

		id = data.get('id_publicacion') === "" ? "" : "/" + data.get('id_publicacion');
		fetch(base_url + "homepage/guardarSchedules" + id, {
			method: 'POST',
			body: data
		})
			.then(res => {
				schedules();
				clear();
				var message = {
					"heading": id === "" ? "Creación" : "Modificación",
					"text": "El registro fue " + (id === "" ? "creado" : "modificado") + " correctamente",
					"ok": true
				};
				showMessage(message);
			}).catch(err => {
				console.log('Error de la peticion: ' + err);
			});

	} else {
		var message = {
			"heading": "Error",
			"text": "El contenido no puede estar vacío",
			"ok": false
		};
		showMessage(message);
	}
}

function clear() {
	document.getElementById('id_horario').value = "";
	CKEDITOR.instances.contenido.setData("");
	document.getElementById('fromSchedule').reset();
	document.getElementById('div-estado').style = "display: none";
	$('#modalForm').modal('hide');
}

function deleteSchedule() {
	Swal.fire({
		title: '¿Esta seguro de eliminar el registro?',
		text: "Esta accion no es reversible",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#36bea6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			fetch(base_url + 'homePage/deleteSchedule/' + this.value, {
				method: 'DELETE'
			})
				.then(() => {
					Swal.fire(
						'Eliminado!',
						'!La publicación ha sido eliminada!',
						'success'
					);
					schedules();
					deleteMessage();
				})
		}
	})
}

function deleteMessage() {
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

function showMessage(message) {
	$.toast({
		heading: message['heading'],
		text: message['text'],
		showHideTransition: 'fade',
		allowToastClose: true,
		icon: message['ok'] ? 'success' : 'error',
		hideAfter: 3000,
		stack: 6,
		position: 'top-right',
		loaderBg: '#ff6849',
		bgColor: message['ok'] ? '#46e1b6' : '#ef5350',
		textColor: '#ffffff',
	});
}