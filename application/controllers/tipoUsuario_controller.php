<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoUsuario_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTOR DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('tipoUsuario_model');
		parent::logueado();


        
    }

    
    // METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	public function carga()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/tipoUsuarios');
		$this->load->view('templates/footer');
    }
    

    //METODO QUE LLAMA LOS DATOS DE TIPO_USUARIO DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosTipoUsuario(){ 
        $tipoUsuario = $this->tipoUsuario_model->getAll();
        $data=['tipoUsuario' => $tipoUsuario];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA REGISTRO DE TIPO_USUARIO
    public function agregarTipoUsuario(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['nombre_tipo_usuario'], $_POST['descripcion']];
    
        $this->tipoUsuario_model->agregarTipoUsuario($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO TIPO_USUARIO
    public function eliminarTipoUsuario($id){
        $this->tipoUsuario_model->eliminarTipoUsuario($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO TIPO_USUARIO
    public function obtenerRegistro($id){
        $dato=['tipoUsuario_model'=>$this->tipoUsuario_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }



    //METODO CON EL QUE SE ACTUALIZA UN REGISTRO DE TIPO_USUARIO
    public function actualizarTipoUsuario(){
        
        $data=[$_POST['id_tipo_usuario'], $_POST['nombre_tipo_usuario'], $_POST['descripcion']];
    
        $this->tipoUsuario_model->actualizarTipoUsuario($data);
        $this->load->view('panelControl/index', $data);
    }



}
