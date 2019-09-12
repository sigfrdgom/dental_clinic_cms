<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        $this->load->model('cita_model');

        
    }


    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CITA
    public function cargarDatosCita(){ 
        $cita = $this->cita_model->getAll();
        $data=['cita' => $cita];
        
        $this->load->view('panelControl/tabla', $data);
    }


    //METODO QUE AGREGA UN REGISTRO CITA
    public function agregarCita(){
        //deberia ir el espacion en blanco?
        $data=["", $_POST['celular'], $_POST['email'], $_POST['padecimiento'], $_POST['procedimiento'], $_POST['fecha'], $_POST['hora'], $_POST['comentario']];

        $this->cita_model->agregarCita($data);
        $this->load->view('panelControl/index', $data);
    }


      
    //METODO QUE ELIMINA UN REGISTRO DE CITA
    public function eliminarCita($id){
        $this->cita_model->eliminarCita($id);
    }



    //METODO CON EL QUE OBTENDRIA EL REGISTRO CITA
    public function obtenerRegistro($id){
        $dato=['cita'=> $this->cita_model->obtenerRegistro($id)];
        $this->load->view('controlPanel/form', $dato);
    }


    //METODO QUE SE ENCARGA DE ACTUALIZAR UN REGISTRO DE CITA
    public function actualizarCita(){
        $data=[$_POST['id_cita'], $_POST['celular'], $_POST['email'], $_POST['padecimiento'], $_POST['procedimiento'], $_POST['fecha'], $_POST['hora'], $_POST['comentario']];
    
        $this->cita_model-> actualizarCita($data);
        $this->load->view('panelControl/index', $data);
    }



} ?>
