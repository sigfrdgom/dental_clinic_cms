<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('categoria_model');
		parent::logueado();
    }

    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/categoria');
		$this->load->view('templates/footer');
	}
    
    //METODO QUE OBTIENE
    public function cargarCategoria(){
        //deberia ir el espacion en blanco?
        echo json_encode($this->categoria_model->getAll());
    }


    public function obtenerRegistro($id){
        //deberia ir el espacion en blanco?
        echo json_encode($this->categoria_model->obtenerRegistro($id));
    }



    //METODO QUE AGREGA DATOS CATEGORIA
    public function agregarCategoria(){
		$nombre=$this->input->post("nombre", TRUE);
		$descripcion=$this->input->post("descripcion", TRUE);
        $data=["id_categoria" => null, "nombre" => $nombre, "descripcion" => $descripcion, "estado" => 1];
    
        $this->categoria_model->agregarCategoria($data);
    }
      
    //METODO QUE ELIMINA UN REGISTRO CATEGORIA
    public function eliminarCategoria($id){
        // $this->categoria_model->eliminarCategoria($id);
        $this->categoria_model->actualizarCategoriaEstado($id);

        
	}
	
	public function activarCategoria($id){
        $this->categoria_model->actualizarCategoriaActivo($id);        
    }


    //METODO QUE ACTUALIZA UN REGISTRO CATEGORIA
    public function actualizarCategoria(){
		$id_categoria=$this->input->post("id_categoria", TRUE);
		$nombre=$this->input->post("nombre", TRUE);
		$descripcion=$this->input->post("descripcion", TRUE);
		$data=["id_categoria" => $id_categoria, "nombre" => $nombre, "descripcion" => $descripcion];
        $this->categoria_model->actualizarCategoria($data);
	}
	

}
