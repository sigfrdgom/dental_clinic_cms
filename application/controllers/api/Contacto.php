<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH. 'libraries/REST_Controller.php';
require_once APPPATH. 'libraries/Format.php';

class Contacto extends REST_Controller
{


    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
				$this->load->model(array('ContactoModel', 'BitacoraModel'));
    }

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CONTACTO
    public function cargarDatosContacto_get(){
		parent::logueado(); 
		$this->response($this->ContactoModel->getAll(), 200);
    }

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS QUE SU ESTADO SEA ACTIVO
    public function cargarDatosActivos_get(){ 
		parent::logueado();
		$this->response($this->ContactoModel->getActive(), 200);
    }

    //METODO QUE AGREGA UN REGISTRO CONTACTO
    public function agregarContacto_post(){

		$nombre=$this->input->post("nombre", TRUE);
		$telefono=$this->input->post("telefono", TRUE);
		$email=$this->input->post("email", TRUE);
		$comentario=$this->input->post("comentario", TRUE);
		
        $data=["id_contacto" => null,
              "nombre" =>$nombre, 
              "telefono" =>$telefono, 
              "email"=> $email, 
              "comentario" => $comentario, 
              "estado" => 1];
        $this->ContactoModel->agregarContacto($data);
        $this->response($data, REST_Controller::HTTP_CREATED);
        
    }

    //METODO QUE ELIMINA UN REGISTRO DE CONTACTO
    public function eliminarContacto_delete($id){
			parent::logueado();
			$this->ContactoModel->eliminarContacto($id);

			//BITACORA DE ELIMINADO
			
			$data=parent::bitacora("Elimino un Contacto", "Contacto Eliminado");	
			$this->BitacoraModel->agregarBitacora($data);
    }


    //METODO CON EL QUE OBTENDRIA EL REGISTRO CONTACTO
    public function obtenerRegistro_get($id){
			parent::logueado();
			$this->response($this->ContactoModel->obtenerRegistro($id), 200);       
    }

	
	public function findByCriteria_post(){ 
		parent::logueado();
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			$this->response($this->ContactoModel->getAll(), 200);
		}else{
			$this->response($this->ContactoModel->findByCriteria($this->input->post("busqueda", TRUE)), 200);
		}
		
    }

    //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CONTACTO
    public function actualizarContactoEstado_post(){
			parent::logueado();
			$this->ContactoModel->actualizarContactoEstado($this->input->post("id_contacto", TRUE));
			
			//BITACORA DE EDITADO
			$data=parent::bitacora("Visualizo un Contacto", "Contacto Leido");	
			$this->BitacoraModel->agregarBitacora($data);
    }

} ?>
