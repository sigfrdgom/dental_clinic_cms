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
			fetch('deleteServices/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado!',
						'!La servicio ha sido eliminada!',
						'success'
					  )
					recargar();		
				})
		}
	})

}