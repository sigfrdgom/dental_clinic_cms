<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('tipo_model');

        
    }

    
    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/tipo');
		$this->load->view('templates/footer');
		
	}
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosTipo(){ 
        echo json_encode($this->tipo_model->getAll());
        
    }


    //METODO QUE AGREGA DATOS A LA BASE DE DATOS
    public function agregarTipo(){
        //deberia ir el espacion en blanco?
        $data=["id_tipo" => null, "nombre" => $_POST['nombre'], "estado" => 1];
        $this->tipo_model->agregarTipo($data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO TIPO
    public function eliminarTipo($id){
        $this->tipo_model->eliminarTipo($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO TIPO
    public function obtenerRegistro($id){
         echo json_encode($this->tipo_model->obtenerRegistro($id));
        
    }



    //METODO CON EL QUE SE ACTUALIZA UN REGISTRO DE TIPO
    public function actualizarTipo(){
        
        $data=["id_tipo" => $_POST['id_tipo'], "nombre" => $_POST['nombre'], "estado" => $_POST['estado']];
    	$this->tipo_model->actualizarTipo($data);
        
	}
	
	public function findByCriteria(){ 
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->tipo_model->getAll());
        }else{
            echo json_encode($this->tipo_model->findByCriteria($_POST["busqueda"]));
        }
		
    }



}
