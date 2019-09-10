<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('usuario_model');

        
    }

    
    //METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	// public function index()
	// {
	// 	$this->load->view('libro/index');
    // }
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA USUARIOS
    public function cargarDatosUsuario(){ 
        $usuario = $this->usuario_model->getAll();
        $data=['usuario' => $usuario];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA UN REGISTRO USUARIO
    public function agregarUsuario(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['nombres'], $_POST['apellidos'], $_POST['nombre_usuario'], $_POST['contrasenia'], $_POST['id_tipo_usuario']];
    
        $this->usuario_model->agregarUsuario($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO DE USUARIO
    public function eliminarUsuario($id){
        $this->usuario_model->eliminarUsuario($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO USUARIO
    public function obtenerRegistro($id){
        $dato=['usuario'=> $this->usuario_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE USUARIO
    public function actualizarUsuario(){
        $data=[$_POST['id_usuario'], $_POST['nombres'], $_POST['apellidos'], $_POST['nombre_usuario'], $_POST['contrasenia'], $_POST['id_tipo_usuario']];
    
        $this->usuario_model-> actualizarUsuario($data);
        $this->load->view('panelControl/index', $data);
    }



}