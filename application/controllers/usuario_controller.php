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

    
    // METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	public function carga()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/usuarios');
		$this->load->view('templates/footer');
		
	}
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA USUARIOS
    public function cargarDatosUsuario(){ 
		$usuarios = $this->usuario_model->getAll();
        $data=['usuarios' => $usuarios];
        $this->load->view('panelControl/usuario/tablaUsuario', $data);
    }


    //METODO QUE AGREGA UN REGISTRO USUARIO
    public function agregarUsuario(){		
		
		echo $_POST["nombres"];

		$data=["id_usuario" => null, "nombres" => $_POST['nombres'], "apellidos" => $_POST['apellidos'],  "nombre_usuario" => $_POST['usuario'], "contrasenia" => $_POST['pass'], "tipo_usuario" => $_POST['tipo_usuario'], "estado" => 1];

		// // echo '<script type="text/javascript">console.log('.var_dump($data).'); </script>';
		// // $this->load->view('panelControl/index');
		 $this->usuario_model->agregarUsuario($data);
    }

      
    //METODO QUE ELIMINA UN REGISTRO DE USUARIO
    public function eliminarUsuario($id){
        $this->usuario_model->eliminarUsuario($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO USUARIO
    public function obtenerRegistro($id){
        // $dato=['usuario'=> $this->usuario_model->obtenerRegistro($id)];
		echo json_encode($this->usuario_model->obtenerRegistro($id));
		// $this->load->view('controlPanel/form', $dato);
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE USUARIO
    public function actualizarUsuario(){
        $data=["id_usuario" => $_POST['id_usuario'], "nombres" => $_POST['nombres'], "apellidos" => $_POST['apellidos'],  "nombre_usuario" => $_POST['usuario'], "contrasenia" => $_POST['pass'], "tipo_usuario" => $_POST['tipo_usuario'], "estado" => $_POST['estado']];

        $this->usuario_model-> actualizarUsuario($data);
        // $this->load->view('panelControl/index', $data);
    }



}
