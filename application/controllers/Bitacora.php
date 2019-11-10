<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bitacora extends CI_Controller {

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('bitacoraModel');
		parent::logueado();
    }

    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/Bitacora');
		$this->load->view('templates/footer');
	}
    
    // //METODO QUE OBTIENE
    // public function cargarbitacora(){
    //     echo json_encode($this->bitacoraModel->getAll());
    // }


    // public function obtenerRegistro($id){
    //     //deberia ir el espacion en blanco?
    //     echo json_encode($this->bitacoraModel->obtenerRegistro($id));
    // }



    // //METODO QUE AGREGA DATOS Bitacora
    // public function agregarbitacora(){
	// 	$nombre=$this->input->post("nombre", TRUE);
	// 	$descripcion=$this->input->post("descripcion", TRUE);
    //     $data=["id_bitacora" => null, "nombre" => $nombre, "descripcion" => $descripcion, "estado" => 1];
    
    //     $this->bitacoraModel->agregarbitacora($data);
    // }
      
    // //METODO QUE ELIMINA UN REGISTRO Bitacora
    // public function eliminarbitacora($id){
    //     // $this->bitacoraModel->eliminarbitacora($id);
    //     $this->bitacoraModel->actualizarbitacoraEstado($id);

        
	// }
	
	// public function activarbitacora($id){
    //     $this->bitacoraModel->actualizarbitacoraActivo($id);        
    // }


    // //METODO QUE ACTUALIZA UN REGISTRO Bitacora
    // public function actualizarbitacora(){
	// 	$id_bitacora=$this->input->post("id_bitacora", TRUE);
	// 	$nombre=$this->input->post("nombre", TRUE);
	// 	$descripcion=$this->input->post("descripcion", TRUE);
	// 	$data=["id_bitacora" => $id_bitacora, "nombre" => $nombre, "descripcion" => $descripcion];
    //     $this->bitacoraModel->actualizarbitacora($data);
	// }
	

}
