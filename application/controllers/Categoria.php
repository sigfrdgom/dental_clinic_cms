<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model(array('CategoriaModel', 'BitacoraModel', 'TipoModel'));
		parent::logueado();
    }

    public function index()
	{
		$datos = ['tipos' => $this->TipoModel->getAll()];
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/categoria', $datos);
		$this->load->view('templates/footer');
	}
    
    //METODO QUE OBTIENE
    public function cargarCategoria(){
        //deberia ir el espacion en blanco?
        echo json_encode($this->CategoriaModel->getAll());
    }


    public function obtenerRegistro($id){
        //deberia ir el espacion en blanco?
        echo json_encode($this->CategoriaModel->obtenerRegistro($id));
    }


    //METODO QUE AGREGA DATOS CATEGORIA
    public function agregarCategoria(){
		$nombre=$this->input->post("nombre", TRUE);
		$descripcion=$this->input->post("descripcion", TRUE);
		$id_tipo=$this->input->post("id_tipo", TRUE);
        $data=["id_categoria" => null, "nombre" => $nombre, "descripcion" => $descripcion, "estado" => 1,  "id_tipo" => $id_tipo];
    
		$this->CategoriaModel->agregarCategoria($data);

		$data=parent::bitacora("Agrego una Categoria", "Categoria ".$nombre );	
		$this->BitacoraModel->agregarBitacora($data);
		
    }
      
    //METODO QUE ELIMINA UN REGISTRO CATEGORIA
    public function eliminarCategoria($id){
        // $this->CategoriaModel->eliminarCategoria($id);
		$this->CategoriaModel->actualizarCategoriaEstado($id);


		$datos=$this->CategoriaModel->obtenerRegistro($id);
		$data=parent::bitacora("Desactivo una Categoria", "Categoria ".$datos->nombre);	
		$this->BitacoraModel->agregarBitacora($data);

        
	}
	
	public function activarCategoria($id){
		$this->CategoriaModel->actualizarCategoriaActivo($id);

		$datos=$this->CategoriaModel->obtenerRegistro($id);
		$data=parent::bitacora("Activo una Categoria", "Categoria ".$datos->nombre);	
		$this->BitacoraModel->agregarBitacora($data);        
    }


    //METODO QUE ACTUALIZA UN REGISTRO CATEGORIA
    public function actualizarCategoria(){
		$id_categoria=$this->input->post("id_categoria", TRUE);
		$nombre=$this->input->post("nombre", TRUE);
		$descripcion=$this->input->post("descripcion", TRUE);
		$id_tipo=$this->input->post("id_tipo", TRUE);
		$data=["id_categoria" => $id_categoria, "nombre" => $nombre, "descripcion" => $descripcion, "id_tipo" => $id_tipo];
		$this->CategoriaModel->actualizarCategoria($data);
		
		$data=parent::bitacora("Modifico una Categoria", "Categoria ".$nombre);	
		$this->BitacoraModel->agregarBitacora($data);
	}
	

}
