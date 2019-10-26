<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Contacto extends CI_Controller {


    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('ContactoModel');
		// parent::logueado();

        
    }

    
    public function index()
	{
		parent::logueado();
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/contacto');
		$this->load->view('templates/footer');
		
	}

//     //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CONTACTO
//     public function cargarDatosContacto_get(){
// 		parent::logueado(); 
// 		$this->response($this->ContactoModel->getAll(), 200);
//     }

//     //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS QUE SU ESTADO SEA ACTIVO
//     public function cargarDatosActivos_get(){ 
// 		parent::logueado();
// 		$this->response($this->ContactoModel->getActive(), 200);
//     }

//     //METODO QUE AGREGA UN REGISTRO CONTACTO
//     public function agregarContacto_post(){

// 		$nombre=$this->input->post("nombre", TRUE);
// 		$telefono=$this->input->post("telefono", TRUE);
// 		$email=$this->input->post("email", TRUE);
// 		$comentario=$this->input->post("comentario", TRUE);
		
//         $data=["id_contacto" => null, "nombre" =>$nombre, "celular" =>$telefono, "email"=> $email, "comentario" => $comentario, "estado" => 1];
//         $this->ContactoModel->agregarContacto($data);
        
//     }

	

      
//     //METODO QUE ELIMINA UN REGISTRO DE CONTACTO
//     public function eliminarContacto($id){
// 		parent::logueado();
//         $this->ContactoModel->eliminarContacto($id);
//     }



//     //METODO CON EL QUE OBTENDRIA EL REGISTRO CONTACTO
//     public function obtenerRegistro_get($id){
// 		parent::logueado();
// 		$this->response($this->ContactoModel->obtenerRegistro($id), 200);
//         // echo json_encode($this->ContactoModel->obtenerRegistro($id));
       
//     }


//     //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE CONTACTO
//     public function actualizarContacto_post(){
// 		parent::logueado();

// 		$nombre=$this->input->post("nombre", TRUE);
// 		$id_contacto=$this->input->post("id_contacto", TRUE);
// 		$telefono=$this->input->post("telefono", TRUE);
// 		$email=$this->input->post("email", TRUE);
// 		$comentario=$this->input->post("comentario", TRUE);
		
//         $data=["id_contacto" => $id_contacto, "nombre" =>$nombre, "celular" =>$telefono, "email"=> $email, "comentario" => $comentario];
//         $this->ContactoModel->actualizarContacto($data);
        
// 	}
	
// 	public function findByCriteria_post(){ 
// 		parent::logueado();
// 		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
// 			echo json_encode($this->ContactoModel->getAll());
//         }else{
//             echo json_encode($this->ContactoModel->findByCriteria($this->input->post("busqueda", TRUE)));
//         }
		
//     }

//     //METODO QUE SE ENCARGA DE ACTUALIZAR EL ESTADO DE UN REGISTRO DE CONTACTO
//     public function actualizarContactoEstado_post(){
// 		parent::logueado();
//         $this->ContactoModel->actualizarContactoEstado($this->input->post("id_contacto", TRUE));
//     }

} ?>
