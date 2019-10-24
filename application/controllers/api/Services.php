<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('PublicacionModel');
    }

    public function index(){ 
        echo json_encode($this->PublicacionModel->cargaServices());
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro($id)
    {
        echo json_encode($this->PublicacionModel->findById($id));
    }

    public function findByCriteria(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->PublicacionModel->findAll());
        }else{
            echo json_encode($this->PublicacionModel->findByCriteria($this->input->post("busqueda", TRUE)));
        }
		
	}
	
	
	public function cargarServicios(){ 
		echo json_encode($this->PublicacionModel->cargaServices());
    }

}
