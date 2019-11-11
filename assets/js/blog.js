window.addEventListener('load', listener);
var url_base = window.location.href;

function listener() {
	document.getElementById('busqueda').addEventListener('keyup',refresh_posts);
	refresh_posts();
	

}

function refresh_posts(){
	const busqueda = document.getElementById('busqueda').value;
	fetch(url_base+'/posts/'+busqueda)
    .then(res => {return res.text()})
    .then(response => {
        document.getElementById('cards-content').innerHTML = response;
        let btnDelete = document.getElementsByClassName('btn-delete');
        for(i=0; i<btnDelete.length; i++){
            btnDelete[i].addEventListener('click', deletePosts);
		}
		var p = new Paginador(
		document.getElementById('paginador'),
		document.getElementsByClassName('card'),
		5); p.Mostrar(); 
		
    });
}

function deletePosts() {
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
			fetch('blog/deletePosts/'+this.value, {
				method: 'DELETE'
				})
				.then(() =>{
					Swal.fire(
						'Eliminado!',
						'!La publicación ha sido eliminada!',
						'success'
					  );
					  refresh_posts();
				})
		}
	})

}
