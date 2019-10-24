<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('TipoModel');
		parent::logueado();


        
    }

    
    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/tipo');
		$this->load->view('templates/footer');
		
	}
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosTipo(){ 
        echo json_encode($this->TipoModel->getAll());
        
    }


    //METODO QUE AGREGA DATOS A LA BASE DE DATOS
    public function agregarTipo(){
		$nombre=$this->input->post("nombre", TRUE);
        $data=["id_tipo" => null, "nombre" => $nombre, "estado" => 1];
        $this->TipoModel->agregarTipo($data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO TIPO
    // public function eliminarTipo($id){
    //     $this->TipoModel->eliminarTipo($id);
    // }

    public function eliminarTipo($id){
        parent::logueado(); 
        $this->TipoModel->actualizarTipoEstado($id);
	}
	

	public function activarTipo($id){
        parent::logueado(); 
        $this->TipoModel->actualizarTipoActivar($id);
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO TIPO
    public function obtenerRegistro($id){
         echo json_encode($this->TipoModel->obtenerRegistro($id));
    }



    //METODO CON EL QUE SE ACTUALIZA UN REGISTRO DE TIPO
    public function actualizarTipo(){
		$id_tipo=$this->input->post("id_tipo", TRUE);
		$nombre=$this->input->post("nombre", TRUE);
        $data=["id_tipo" => $id_tipo, "nombre" => $nombre];
    	$this->TipoModel->actualizarTipo($data);
        
	}
	
	public function findByCriteria(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->TipoModel->getAll());
        }else{
            echo json_encode($this->TipoModel->findByCriteria($this->input->post("busqueda", TRUE)));
        }
		
    }



}
