<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/Format.php';

class Tourism extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model(array('PublicacionModel'));
    }

    /** ------------------------------------- PUBLIC API ------------------------------------------------ */

    public function tourism_gallery_api_get(){
        $this->response($this->PublicacionModel->get_gallery_tourism_api(), 200);
    }

    public function tourism_wallpapers_api_get(){
        $this->response($this->PublicacionModel->get_wallpaper_tourism_api(), 200);
    }

    /*** ------------------------------------ SYSTEM METHODS ---------------------------------------------- */

    public function tourism_gallery_get($id = ""){
        parent::logueado();
        $id = trim($id);
        if(!empty($id)){
            $this->response($this->PublicacionModel->get_gallery_tourism_by_id($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_gallery_tourism(), 200);
        }
    }

    public function tourism_wallpapers_get($id = ""){
        parent::logueado();
        $id = trim($id);
        if(!empty($id)){
            $this->response($this->PublicacionModel->get_wallpaper_tourism_by_id($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_wallpapers_tourism(), 200);
        }
    }

}