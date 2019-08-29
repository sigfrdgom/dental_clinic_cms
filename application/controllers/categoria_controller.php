<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('categoria_model');

        
    }

    
    //METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	// public function index()
	// {
	// 	$this->load->view('libro/index');
    // }
    

    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA
    public function cargarDatosCategoria(){ 
        $categoria = $this->categoria_model->getAll();
        $data=['categoria' => $categoria];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA DATOS CATEGORIA
    public function agregarCategoria(){
        //deberia ir el espacion en blanco?
        $data=[$_POST['nombre'], $_POST['descripcion']];
    
        $this->categoria_model->agregarCategoria($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO CATEGORIA
    public function eliminarCategorias($id){
        $this->categoria_model->eliminarCategoria($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function obtenerRegistro($id){
        $dato=['categoria'=>$this->categoria_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }



    //METODO QUE ACTUALIZA UN REGISTRO CATEGORIA
    public function actualizarCategoria(){
        
        $data=[$_POST['id_categoria'], $_POST['nombre_categoria'], $_POST['descripcion']];
    
        $this->categoria_model->actualizarCategoria($data);
        $this->load->view('panelControl/index', $data);
    }



}