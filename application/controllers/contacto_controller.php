<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('contacto_model');

        
    }

    
    //METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	// public function index()
	// {
	// 	$this->load->view('libro/index');
    // }
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CONTACTO
    public function cargarDatosContacto(){ 
        $contacto = $this->contacto_model->getAll();
        $data=['contacto' => $contacto];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA UN REGISTRO CONTACTO
    public function agregarContacto(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['telefono'], $_POST['email'], $_POST['comentario']];
    
        $this->contacto_model->agregarContacto($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO DE CONTACTO
    public function eliminarContacto($id){
        $this->contacto_model->eliminarContacto($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CONTACTO
    public function obtenerRegistro($id){
        $dato=['contacto'=> $this->contacto_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE CONTACTO
    public function actualizarContacto(){
        $data=[$_POST['id_contacto'], $_POST['telefono'], $_POST['email'], $_POST['comentario']];
    
        $this->contacto_model-> actualizarContacto($data);
        $this->load->view('panelControl/index', $data);
    }



} ?>
