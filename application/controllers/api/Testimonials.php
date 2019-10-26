<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonials extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('PublicacionModel');
    }

    function get_testimonials(){
        echo json_encode($this->PublicacionModel->get_testimonials());
    }
}
