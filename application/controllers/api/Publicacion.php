<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('publicacion_model');
		// parent::logueado();
    }


    public function index(){ 
        echo json_encode($this->publicacion_model->cargaServices()); 
    }


    public function as(){ 
        echo json_encode($this->publicacion_model->cargaServices()); 
    }
   
}
