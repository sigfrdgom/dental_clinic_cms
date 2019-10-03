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
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosCategoria(){ 
        echo json_encode($this->categoria_model->getAll());
        
    }


    //METODO QUE AGREGA DATOS CATEGORIA
    public function agregarCategoria(){
        //deberia ir el espacion en blanco?
        $data=["id_categoria" => null, "nombre" => $_POST['nombre'], "descripcion" => $_POST['descripcion']];
    
        $this->categoria_model->agregarCategoria($data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO CATEGORIA
    public function eliminarCategoria($id){
        $this->categoria_model->eliminarCategoria($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro($id){
        echo json_encode($this->categoria_model->obtenerRegistro($id));
		
    }



    //METODO QUE ACTUALIZA UN REGISTRO CATEGORIA
    public function actualizarCategoria(){
        
      $data=["id_categoria" => $_POST['id_categoria'], "nombre" => $_POST['nombre'], "descripcion" => $_POST['descripcion']];
        $this->categoria_model->actualizarCategoria($data);
	}
	
	public function findByCriteria(){ 
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->categoria_model->getAll());
        }else{
            echo json_encode($this->categoria_model->findByCriteria($_POST["busqueda"]));
        }
		
    }



}
