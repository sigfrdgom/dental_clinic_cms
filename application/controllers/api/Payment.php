<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

class Payment extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('PublicacionModel');
    }

    public function payment_get($id = ""){ 
        parent::logueado();  
        if(!empty(trim($id))){
            $this->response($this->PublicacionModel->get_payment_by_id($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_all_payments(), 200);
        }
    }


}
