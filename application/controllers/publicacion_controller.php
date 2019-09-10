<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('publicacion_model');

        
    }

    
    //METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	// public function index()
	// {
	// 	$this->load->view('libro/index');
    // }
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA PUBLICACIONES
    public function cargarDatosPublicacion(){ 
        $publicacion = $this->publicacion_model->getAll();
        $data=['publicacion' => $publicacion];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA UN REGISTRO PUBLICACION
    public function agregarPublicacion(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['nombre_publicacion'], $_POST['descripcion'], $_POST['estado'], $_POST['id_usuario'], $_POST['id_categoria'], $_POST['path'], $_POST['fecha_ingreso']];
    
        $this->publicacion_model->agregarPublicacion($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO DE PUBLICACION
    public function eliminarPublicacion($id){
        $this->publicacion_model->eliminarPublicacion($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO PUBLICACION
    public function obtenerRegistro($id){
        $dato=['publicacion'=> $this->publicacion_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE PUBLICACION
    public function actualizarPublicacion(){
        $data=[$_POST['id_publicacion'], $_POST['nombre_publicacion'], $_POST['descripcion'], $_POST['estado'], $_POST['id_usuario'], $_POST['id_categoria'], $_POST['path'], $_POST['fecha_ingreso']];
    
        $this->publicacion_model-> actualizarPublicacion($data);
        $this->load->view('panelControl/index', $data);
    }



}