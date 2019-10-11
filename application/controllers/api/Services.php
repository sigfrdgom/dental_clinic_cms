<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('publicacion_model');
    }

    public function index(){ 
        echo json_encode($this->publicacion_model->cargaServices());
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro($id)
    {
        echo json_encode($this->publicacion_model->findById($id));
    }

    public function findByCriteria(){ 
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->publicacion_model->findAll());
        }else{
            echo json_encode($this->publicacion_model->findByCriteria($_POST["busqueda"]));
        }
		
    }
}