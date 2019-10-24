<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('UsuarioModel');
	
        
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
		echo json_encode($this->UsuarioModel->getAll());
    }


    //METODO QUE AGREGA UN REGISTRO USUARIO
    public function agregarUsuario(){
		parent::logueado();

		$nombres=$this->input->post("nombres", TRUE);
		$apellidos=$this->input->post("apellidos", TRUE);
		$usuario=$this->input->post("usuario", TRUE);
		$tipo_usuario=$this->input->post("tipo_usuario", TRUE);
		$data=["id_usuario" => null, "nombres" => $nombres, "apellidos" => $apellidos,  "nombre_usuario" => $usuario, "contrasenia" => self::hash($this->input->post("pass", TRUE)), "tipo_usuario" => $tipo_usuario, "estado" => 1];
		$this->UsuarioModel->agregarUsuario($data);
    }

      
    //METODO QUE ELIMINA UN REGISTRO DE USUARIO
    public function eliminarUsuario($id){
		parent::logueado();
		$this->UsuarioModel->eliminarUsuario($id);
		if ($this->session->userdata('id_usuario')==$id && $id !=1) {
			parent::destroy();
		}
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO USUARIO
    public function obtenerRegistro($id){
        parent::logueado();
		echo json_encode($this->UsuarioModel->obtenerRegistro($id));
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE USUARIO
    public function actualizarUsuario(){
		parent::logueado();
		$hash=self::hash($this->input->post("pass", TRUE));
		$id_usuario=$this->input->post("id_usuario", TRUE);
		$nombres=$this->input->post("nombres", TRUE);
		$apellidos=$this->input->post("apellidos", TRUE);
		$usuario=$this->input->post("usuario", TRUE);
		$tipo_usuario=$this->input->post("tipo_usuario", TRUE);
		$estado=$this->input->post("estado", TRUE);
		
		$data=["id_usuario" => $id_usuario, "nombres" => $nombres, "apellidos" => $apellidos,  "nombre_usuario" => $usuario, "contrasenia" => $hash, "tipo_usuario" => $tipo_usuario, "estado" => $estado];
		 		
		$this->UsuarioModel-> actualizarUsuario($data);
	}


	public function findByCriteria(){ 
		parent::logueado();
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->UsuarioModel->getAll());
        }else{
            echo json_encode($this->UsuarioModel->findByCriteria($this->input->post("busqueda", TRUE)));
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
			$usuario =$this->UsuarioModel->loginUp($this->input->post('usuario'));
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
					redirect('InicioControl/index2');
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

		
	


	//METODO CON EL QUE OBTENDRIA EL REGISTRO USUARIO
    public function validarUsuario($user){
        // $dato=['usuario'=> $this->UsuarioModel->obtenerRegistro($id)];
		echo json_encode($this->UsuarioModel->getValid($user));
		// $this->load->view('controlPanel/form', $dato);
    }
}

	







