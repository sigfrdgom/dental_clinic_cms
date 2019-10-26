<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('CategoriaModel');
    }

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function index()
    {
        echo json_encode($this->CategoriaModel->getAll_not_testimonial());
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro($id)
    {
        echo json_encode($this->CategoriaModel->obtenerRegistro($id));
    }

    public function findByCriteria(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->CategoriaModel->getAll());
        }else{
            echo json_encode($this->CategoriaModel->findByCriteria($this->input->post("busqueda", TRUE)));
        }
		
    }


}
