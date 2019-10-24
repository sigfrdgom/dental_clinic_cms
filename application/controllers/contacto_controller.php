<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('contacto_model');
		// parent::logueado();

        
    }

    
    public function index()
	{
		parent::logueado();
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/contacto');
		$this->load->view('templates/footer');
		
	}

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CONTACTO
    public function cargarDatosContacto(){
		parent::logueado(); 
        echo json_encode($this->contacto_model->getAll());
    }

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS QUE SU ESTADO SEA ACTIVO
    public function cargarDatosActivos(){ 
		parent::logueado();
        echo json_encode($this->contacto_model->getActive());
    }

    //METODO QUE AGREGA UN REGISTRO CONTACTO
    public function agregarContacto(){

		$nombre=$this->input->post("nombre", TRUE);
		$telefono=$this->input->post("telefono", TRUE);
		$email=$this->input->post("email", TRUE);
		$comentario=$this->input->post("comentario", TRUE);
		
        $data=["id_contacto" => null, "nombre" =>$nombre, "telefono" =>$telefono, "email"=> $email, "comentario" => $comentario, "estado" => 1];
        $this->contacto_model->agregarContacto($data);
        
    }

	

      
    //METODO QUE ELIMINA UN REGISTRO DE CONTACTO
    public function eliminarContacto($id){
		parent::logueado();
        $this->contacto_model->eliminarContacto($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CONTACTO
    public function obtenerRegistro($id){
		parent::logueado();
        echo json_encode($this->contacto_model->obtenerRegistro($id));
       
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE CONTACTO
    public function actualizarContacto(){
		parent::logueado();

		$nombre=$this->input->post("nombre", TRUE);
		$id_contacto=$this->input->post("id_contacto", TRUE);
		$telefono=$this->input->post("telefono", TRUE);
		$email=$this->input->post("email", TRUE);
		$comentario=$this->input->post("comentario", TRUE);
		
        $data=["id_contacto" => $id_contacto, "nombre" =>$nombre, "telefono" =>$telefono, "email"=> $email, "comentario" => $comentario];
        $this->contacto_model->actualizarContacto($data);
        
	}
	
	public function findByCriteria(){ 
		parent::logueado();
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->contacto_model->getAll());
        }else{
            echo json_encode($this->contacto_model->findByCriteria($this->input->post("busqueda", TRUE)));
        }
		
    }

    //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CONTACTO
    public function actualizarContactoEstado(){
		parent::logueado();
        $this->contacto_model->actualizarContactoEstado($this->input->post("id_contacto", TRUE));
    }

} ?>
