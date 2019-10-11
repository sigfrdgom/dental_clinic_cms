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
        $data=["id_cita" => null, "nombre" => $_POST['nombre'], "celular" => $_POST['telefono'], "email" => $_POST['email'], "padecimientos" => $_POST['padecimientos'], "procedimiento" => $_POST['procedimiento'], "fecha" => $_POST['fecha'], "hora" => $_POST['hora'], "comentario" => $_POST['comentario'],"estado" =>1];

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

        $data=["id_cita" => $_POST['id_cita'], "nombre" => $_POST['nombre'], "celular" => $_POST['telefono'], "email" => $_POST['email'], "padecimientos" => $_POST['padecimientos'], "procedimiento" => $_POST['procedimiento'], "fecha" => $_POST['fecha'], "hora" => $_POST['hora'], "comentario" => $_POST['comentario']];
        $this->cita_model-> actualizarCita($data);
	}
	

	public function findByCriteria(){
        parent::logueado(); 
		if($_POST["busqueda"] == null || $_POST["busqueda"]== ""){
			echo json_encode($this->cita_model->getAll());
        }else{
            echo json_encode($this->cita_model->findByCriteria($_POST["busqueda"]));
        }
		
    }

    //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CITA
    public function actualizarCitaEstado(){
        parent::logueado(); 
        $this->cita_model->actualizarCitaEstado($_POST['id_cita']);
    }


} ?>
