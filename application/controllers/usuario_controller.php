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
		parent::logueado();
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/usuarios');
		$this->load->view('templates/footer');
		
	}
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA USUARIOS
    public function cargarDatosUsuario(){ 
		parent::logueado();
		echo json_encode($this->usuario_model->getAll());
    }


    //METODO QUE AGREGA UN REGISTRO USUARIO
    public function agregarUsuario(){
		parent::logueado();		
		$data=["id_usuario" => null, "nombres" => $_POST['nombres'], "apellidos" => $_POST['apellidos'],  "nombre_usuario" => $_POST['usuario'], "contrasenia" => self::hash($_POST['pass']), "tipo_usuario" => $_POST['tipo_usuario'], "estado" => 1];
		$this->usuario_model->agregarUsuario($data);
    }

      
    //METODO QUE ELIMINA UN REGISTRO DE USUARIO
    public function eliminarUsuario($id){
		parent::logueado();
		$this->usuario_model->eliminarUsuario($id);
		if ($this->session->userdata('id_usuario')==$id && $id !=1) {
			parent::destroy();
		}
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO USUARIO
    public function obtenerRegistro($id){
        parent::logueado();
		echo json_encode($this->usuario_model->obtenerRegistro($id));
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE USUARIO
    public function actualizarUsuario(){
		parent::logueado();
		$hash=self::hash($_POST['pass']);
		$data=["id_usuario" => $_POST['id_usuario'], "nombres" => $_POST['nombres'], "apellidos" => $_POST['apellidos'],  "nombre_usuario" => $_POST['usuario'], "contrasenia" => $hash, "tipo_usuario" => $_POST['tipo_usuario'], "estado" => $_POST['estado']];
		 		
		$this->usuario_model-> actualizarUsuario($data);
	}


	public function findByCriteria(){ 
		parent::logueado();
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->usuario_model->getAll());
        }else{
            echo json_encode($this->usuario_model->findByCriteria($_POST["busqueda"]));
        }
		
	}

	private static function hash($password) {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 13]);
	}
	

    public static function verify($password, $hash) {
        return password_verify($password, $hash);
	}


	public function loginUp(){

		if ($this->input->post()) {
			$usuario =$this->usuario_model->loginUp($this->input->post('usuario'));
			if ($usuario) {

				if (self::verify($this->input->post('pass'), $usuario->contrasenia)) {	
					$usuario_data = array(
					'id_usuario' => $usuario->id_usuario,
               		'nombre_usuario' => $usuario->nombre_usuario,
			   		'nombre' => $usuario->nombres,
			   		'apellido' => $usuario->apellidos,
			   		'tipo_usuario' => $usuario->tipo_usuario,
					'logueado' => TRUE);					   
					$this->session->set_userdata($usuario_data);
					redirect('inicioControl/index2');
				}else{
					redirect('');

				}            
			} else {
				//aqui
				redirect('');
			}
		}else {
			$this->load->view('login/login');
			// $this->load->view('templates/footer');
		}
	}


	// public function logueado() {
	// 	if($this->session->userdata("logueado")){
	// 	}else{
	// 		redirect("inicioControl/index");
	// 	}
	// }
			
			
	


	//METODO CON EL QUE OBTENDRIA EL REGISTRO USUARIO
    public function validarUsuario($user){
        // $dato=['usuario'=> $this->usuario_model->obtenerRegistro($id)];
		echo json_encode($this->usuario_model->getValid($user));
		// $this->load->view('controlPanel/form', $dato);
    }
}

	







