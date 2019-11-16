<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

class AboutUs extends REST_Controller
{
    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('ContenidoEstaticoModel');
    }

    public function aboutus_by_id_get($id = ""){ 
        if(!empty(trim($id))){
            $this->response($this->ContenidoEstaticoModel->findById($id), 200);
        }
    }
}
