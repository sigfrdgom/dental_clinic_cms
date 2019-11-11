<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH. 'libraries/REST_Controller.php';
require_once APPPATH. 'libraries/Format.php';

class Bitacora extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('BitacoraModel');
		parent::logueado();
	}
	

    public function cargarBitacora_get(){ 
        $this->response($this->BitacoraModel->getAll(), 200);
    }

    
    public function findByCriteria_post(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			$this->response($this->BitacoraModel->findAll(), 200);
        }else{
            $this->response($this->BitacoraModel->findByCriteria($this->input->post("busqueda", TRUE)), 200);
        }
	}
	
	
}
