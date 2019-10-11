<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('publicacion_model');
    }

    public function index($id = ""){ 
        if(!empty(trim($id))){
            echo json_encode($this->publicacion_model->get_posts($id));
        }else{
            echo json_encode($this->publicacion_model->get_posts());
        }
    }

    public function recent_posts(){ 
        echo json_encode($this->publicacion_model->get_recent_posts());
    }

    public function search_posts($keyword = ""){ 
        echo json_encode($this->publicacion_model->search_posts($keyword));
    }


}