<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH. 'libraries/REST_Controller.php';
require_once APPPATH. 'libraries/Format.php';

class HomePage extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('ContenidoEstaticoModel');
    }

    // public function createVideo(){
    //     parent::logueado();
    //     $data=[
    //         "id_estatico" => null, 
    //         "titulo" => $this->post("titulo"), 
    //         "contenido" => $this->post("contenido"), 
    //         "estado" => $this->post("estado") ? $this->post("estado") : true, 
    //     ];
    //     $this->ContenidoEstaticoModel->create($data);
    // }

}