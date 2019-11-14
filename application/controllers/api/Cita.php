<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH. 'libraries/REST_Controller.php';
require_once APPPATH. 'libraries/Format.php';

class Cita extends REST_Controller {

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model(array('CitaModel', 'BitacoraModel'));
    }
	

	public function cargarDatosCita_get(){ 
        parent::logueado();  
        $this->response($this->CitaModel->getAll(), 200);
    }
    
    public function cargarDatosActivos_get(){ 
        parent::logueado();  
        $this->response($this->CitaModel->getActive(), 200);
    }

    //METODO QUE AGREGA UN REGISTRO CITA
    public function agregarCita_post(){

		$nombre=$this->input->post("nombre", TRUE);
		$telefono=$this->input->post("telefono", TRUE);
		$email=$this->input->post("email", TRUE);
		$padecimientos=$this->input->post("padecimientos", TRUE);
		$procedimiento=$this->input->post("procedimiento", TRUE);
		$fecha=$this->input->post("fecha", TRUE);
		$hora=$this->input->post("hora", TRUE);
		$comentario=$this->input->post("comentario", TRUE);

        $data=[
            "id_cita" => null, 
            "nombre" => $nombre, 
            "celular" => $telefono, 
            "email" => $email, 
            "padecimientos" => $padecimientos, 
            "procedimiento" => $procedimiento, 
            "fecha" => $fecha, 
            "hora" => $hora, 
            "comentario" => $comentario,"estado" =>1];

        $this->CitaModel->agregarCita($data);
        // $this->response( REST_Controller::HTTP_CREATED);
    }


      
    //METODO QUE ELIMINA UN REGISTRO DE CITA
    public function eliminarCita_delete($id){
        parent::logueado();  
		$this->CitaModel->eliminarCita($id);

		//BITACORA DE ELIMINADO
		$dato=$this->CitaModel->obtenerRegistro($id);
		$data=parent::bitacora("Elimino una Cita", "Cita Eliminada de ".$dato->nombre);	
		$this->BitacoraModel->agregarBitacora($data);
		

    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CITA
    public function obtenerRegistro_get($id){
		parent::logueado();
		$this->response($this->CitaModel->obtenerRegistro($id), 200);
    
	}

	

	public function findByCriteria_post(){
        parent::logueado();  
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			$this->response($this->CitaModel->getAll(), 200);
        }else{
			$this->response($this->CitaModel->findByCriteria($this->input->post("busqueda", TRUE)), 200);

		}
		
    }

    //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CITA
    public function actualizarCitaEstado_post(){
        parent::logueado();  
		$this->CitaModel->actualizarCitaEstado($this->input->post("id_cita", TRUE));
		
		//BITACORA DE EDITADO
		$dato=$this->CitaModel->obtenerRegistro($this->input->post("id_cita", TRUE));
		$data=parent::bitacora("Visualizo una Cita", "Cita Leida de ".$dato->nombre);	
		
		$this->BitacoraModel->agregarBitacora($data);
    }


} ?>
