<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH. 'libraries/REST_Controller.php';
require_once APPPATH. 'libraries/Format.php';

class Categoria extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
		parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('CategoriaModel');
    }

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function index_get()
    {
        $this->response($this->CategoriaModel->get_blog_categories(), 200);
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro_get($id)
    {
        $this->response($this->CategoriaModel->obtenerRegistro($id), 200);
    }

    public function findByCriteria_post(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			$this->response($this->CategoriaModel->getAll(), 200);
        }else{
            $this->response($this->CategoriaModel->findByCriteria($this->input->post("busqueda", TRUE)), 200);
        }
		
    }


}
