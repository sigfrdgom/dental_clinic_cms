<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

class HomePage extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model(array('PublicacionModel', 'ContenidoEstaticoModel'));
    }

    /*** ------------------------------------ API METHODS ---------------------------------------------- */

    public function carousel_get(){
        $this->response($this->PublicacionModel->get_images_carousel_api(), 200);
    }

    public function video_get(){
        $this->response($this->ContenidoEstaticoModel->findById(4), 200);
    }

    public function description_get(){
        $this->response($this->ContenidoEstaticoModel->findById(5), 200);
    }

    public function clasification_services_api_get($id = ""){
        $id = trim($id);
        if(!empty($id)){
            $this->response($this->PublicacionModel->get_clasification_services_by_id_api($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_clasification_services_api(), 200);
        }
    }

    public function schedules_api_get($id = ""){
        $id = trim($id);
        if(!empty($id)){
            $this->response($this->PublicacionModel->get_schedules_by_id_api($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_schedules_api(), 200);
        }
    }

    /*** ------------------------------------ SYSTEM METHODS ---------------------------------------------- */

    public function schedules_get($id = ""){
        parent::logueado();
        $id = trim($id);
        if(!empty($id)){
            $this->response($this->PublicacionModel->get_schedules_by_id($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_schedules(), 200);
        }
    }

    public function clasification_services_get($id = ""){
        parent::logueado();
        $id = trim($id);
        if(!empty($id)){
            $this->response($this->PublicacionModel->get_clasification_services_by_id($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_clasification_services(), 200);
        }
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