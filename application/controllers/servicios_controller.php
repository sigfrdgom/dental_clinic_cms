<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('servicios_model');

        
    }

    
    //METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	// public function index()
	// {
	// 	$this->load->view('libro/index');
    // }
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosServicios(){ 
        $servicios = $this->servicios_model->getAll();
        $data=['servicios' => $servicios];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA DATOS A LA BASE DE DATOS USANDO JAVASCRIPTS Y AJAX
    public function agregarServicios(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['nombre'], $_POST['descripcion']];
    
        $this->servicios_model->agregarServicios($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO SERVICIO USANDO JAVASCRIPT Y AJAX
    public function eliminarServicios($id){
        $this->servicios_model->eliminarServicios($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO SERVICIOS
    public function obtenerRegistro($id){
        $dato=['servicios'=>$this->servicios_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }



    //METODO CON EL QUE SE ACTUALIZA UN REGISTRO DE SERVICIOS
    public function actualizarServicios(){
        
        $data=[$_POST['id_servicios'], $_POST['nombre'], $_POST['descripcion']];
    
        $this->servicios_model->actualizarServicios($data);
        $this->load->view('panelControl/index', $data);
    }



}