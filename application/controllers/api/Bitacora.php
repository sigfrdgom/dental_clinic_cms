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
	}
	

	//METODO QUE AGREGA UN REGISTRO CONTACTO
    public function agregarBitacora_post(){

		$accion=$this->input->post("accion", TRUE);
		$usuario=$this->input->post("usuario", TRUE);
		$titulo=$this->input->post("titulo", TRUE);
		
        $data=["id_bitacora" => null,
			  "accion" =>$accion,
			  "titulo" =>$titulo,
              "usuario" =>$usuario, 
              "fecha"=> null];
        $this->BitacoraModel->agregarBitacora($data);
        $this->response($data, REST_Controller::HTTP_CREATED);
        
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
