<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('cita_model');
		// parent::logueado();

        
    }


    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CITA
    public function index(){
        parent::logueado(); 
        $this->load->view('templates/header');
		$this->load->view('panelControl/usuario/cita');
		$this->load->view('templates/footer');
	}
	

	public function cargarDatosCita(){ 
        parent::logueado(); 
        echo json_encode($this->cita_model->getAll());
    }

    public function cargarDatosActivos(){ 
        parent::logueado(); 
        echo json_encode($this->cita_model->getActive());
    }


    //METODO QUE AGREGA UN REGISTRO CITA
    public function agregarCita(){

		$nombre=$this->input->post("nombre", TRUE);
		$telefono=$this->input->post("telefono", TRUE);
		$email=$this->input->post("email", TRUE);
		$padecimientos=$this->input->post("padecimientos", TRUE);
		$procedimiento=$this->input->post("procedimiento", TRUE);
		$fecha=$this->input->post("fecha", TRUE);
		$hora=$this->input->post("hora", TRUE);
		$comentario=$this->input->post("comentario", TRUE);

        $data=["id_cita" => null, "nombre" => $nombre, "celular" => $telefono, "email" => $email, "padecimientos" => $padecimientos, "procedimiento" => $procedimiento, "fecha" => $fecha, "hora" => $hora, "comentario" => $comentario,"estado" =>1];

        $this->cita_model->agregarCita($data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO DE CITA
    public function eliminarCita($id){
        parent::logueado(); 
        $this->cita_model->eliminarCita($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CITA
    public function obtenerRegistro($id){
        parent::logueado(); 
        echo json_encode($this->cita_model->obtenerRegistro($id));
    
	}
	
	


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE CITA
    public function actualizarCita(){
		parent::logueado();
		
		$id_cita=$this->input->post("id_cita", TRUE);
		$nombre=$this->input->post("nombre", TRUE);
		$telefono=$this->input->post("telefono", TRUE);
		$email=$this->input->post("email", TRUE);
		$padecimientos=$this->input->post("padecimientos", TRUE);
		$procedimiento=$this->input->post("procedimiento", TRUE);
		$fecha=$this->input->post("fecha", TRUE);
		$hora=$this->input->post("hora", TRUE);
		$comentario=$this->input->post("comentario", TRUE);

        $data=["id_cita" => $id_cita, "nombre" => $nombre, "celular" => $telefono, "email" => $email, "padecimientos" => $padecimientos, "procedimiento" => $procedimiento, "fecha" => $fecha, "hora" => $hora, "comentario" => $comentario];
        $this->cita_model-> actualizarCita($data);
	}
	

	public function findByCriteria(){
        parent::logueado(); 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->cita_model->getAll());
        }else{
            echo json_encode($this->cita_model->findByCriteria($this->input->post("busqueda", TRUE)));
        }
		
    }

    //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CITA
    public function actualizarCitaEstado(){
        parent::logueado(); 
        $this->cita_model->actualizarCitaEstado($this->input->post("id_cita", TRUE));
    }


} ?>
