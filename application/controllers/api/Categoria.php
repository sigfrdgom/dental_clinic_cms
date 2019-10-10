<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('categoria_model');
		parent::logueado();
    }

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function index()
    {
        echo json_encode($this->categoria_model->getAll());
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro($id)
    {
        echo json_encode($this->categoria_model->obtenerRegistro($id));
    }

    public function findByCriteria(){ 
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->categoria_model->getAll());
        }else{
            echo json_encode($this->categoria_model->findByCriteria($_POST["busqueda"]));
        }
		
    }


}
