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

    
    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/contacto');
		$this->load->view('templates/footer');
		
	}

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CONTACTO
    public function cargarDatosContacto(){ 
        echo json_encode($this->contacto_model->getAll());
    }


    //METODO QUE AGREGA UN REGISTRO CONTACTO
    // public function agregarContacto(){
    //     //deberia ir el espacion en blanco?
    //     // $data=["id_contacto" => null, "nombre" =>$_POST['nombre'], "apellido" =>$_POST['apellido'], "celular" =>$_POST['telefono'], "email"=> $_POST['email'], "comentario" => $_POST['comentario']];
    //     $data=["id_contacto" => null, "nombre" =>$_POST['nombre'], "telefono" =>$_POST['telefono'], "email"=> $_POST['email'], "comentario" => $_POST['comentario']];
    
    //     $this->contacto_model->agregarContacto($data);
        
    // }


      
    //METODO QUE ELIMINA UN REGISTRO DE CONTACTO
    public function eliminarContacto($id){
        $this->contacto_model->eliminarContacto($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CONTACTO
    public function obtenerRegistro($id){
        echo json_encode($this->contacto_model->obtenerRegistro($id));
       
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE CONTACTO
    public function actualizarContacto(){
       $data=["id_contacto" => $_POST['id_contacto'], "nombre" =>$_POST['nombre'], "celular" =>$_POST['telefono'], "email"=> $_POST['email'], "comentario" => $_POST['comentario']];
    
        $this->contacto_model-> actualizarContacto($data);
        
	}
	
	public function findByCriteria(){ 
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->contacto_model->getAll());
        }else{
            echo json_encode($this->contacto_model->findByCriteria($_POST["busqueda"]));
        }
		
    }

    //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CONTACTO
    public function actualizarContactoEstado(){
        $this->contacto_model->actualizarContactoEstado($_POST['id_contacto']);
    }

} ?>
