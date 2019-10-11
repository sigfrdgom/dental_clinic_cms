<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('publicacion_model');
		// parent::logueado();
    }


    public function index(){ 
        echo json_encode($this->publicacion_model->cargaServices()); 
    }


    public function as(){ 
        echo json_encode($this->publicacion_model->cargaServices()); 
    }
    // //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA PUBLICACIONES
    // public function cargarDatosPublicacion(){ 
    //     $publicacion = $this->publicacion_model->getAll();
    //     $data=['publicacion' => $publicacion];
        
    //     $this->load->view('panelControl/tabla', $data);
    // }


    // //METODO QUE AGREGA UN REGISTRO PUBLICACION
    // public function agregarPublicacion(){
    //     //deberia ir el espacion en blanco?
    //     $data=["", $_POST['id_usuario'], $_POST['id_categoria'], $_POST['id_tipo'], $_POST['titulo'], $_POST['texto_introduccion'], $_POST['contenido'], $_POST['estado'], $_POST['recurso_av_1'], $_POST['recurso_av_2'],  $_POST['recurso_av_3'], $_POST['recurso_av_4'], $_POST['fecha_ingreso']];
    
    //     $this->publicacion_model->agregarPublicacion($data);
    //     $this->load->view('panelControl/index', $data);
    // }

      
    // //METODO QUE ELIMINA UN REGISTRO DE PUBLICACION
    // public function eliminarPublicacion($id){
    //     $this->publicacion_model->eliminarPublicacion($id);
    // }


    // //METODO CON EL QUE OBTENDRIA EL REGISTRO PUBLICACION
    // public function obtenerRegistro($id){
    //     $dato=['publicacion'=> $this->publicacion_model->obtenerRegistro($id)];
    //     $this->load->view('controlPanel/form', $dato);
    // }


    // //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE PUBLICACION
    // public function actualizarPublicacion(){
    //     $data=[$_POST['id_publicacion'], $_POST['id_usuario'], $_POST['id_categoria'], $_POST['id_tipo'], $_POST['titulo'], $_POST['texto_introduccion'], $_POST['contenido'], $_POST['estado'], $_POST['recurso_av_1'], $_POST['recurso_av_2'],  $_POST['recurso_av_3'], $_POST['recurso_av_4'], $_POST['fecha_ingreso']];
    
    //     $this->publicacion_model-> actualizarPublicacion($data);
    //     $this->load->view('panelControl/index', $data);
	// }

	
	




}
