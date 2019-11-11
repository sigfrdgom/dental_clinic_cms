<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cita extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('CitaModel');
		// parent::logueado();

        
    }


    //METODO QUE LLAMA LOS DATOS DE LA BASE DE DATOS Y REDICCIONA Y CARGA TODA LA CITA
    public function index(){
        parent::logueado(); 
        $this->load->view('templates/header');
		$this->load->view('panelControl/usuario/cita');
		$this->load->view('templates/footer');
	}
	


} ?>
