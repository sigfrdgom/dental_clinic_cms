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

    
    //METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	// public function index()
	// {
	// 	$this->load->view('libro/index');
    // }
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosTipo(){ 
        $tipo = $this->tipo_model->getAll();
        $data=['tipo' => $tipo];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA DATOS A LA BASE DE DATOS
    public function agregarTipo(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['nombre'], $_POST['estado']];
    
        $this->tipo_model->agregarTipo($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO TIPO
    public function eliminarTipo($id){
        $this->tipo_model->eliminarTipo($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO TIPO
    public function obtenerRegistro($id){
        $dato=['tipo'=>$this->tipo_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }



    //METODO CON EL QUE SE ACTUALIZA UN REGISTRO DE TIPO
    public function actualizarTipo(){
        
        $data=[$_POST['id_tipo'], $_POST['nombre'], $_POST['estado']];
    
        $this->tipo_model->actualizarTipo($data);
        $this->load->view('panelControl/index', $data);
    }



}
