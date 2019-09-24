<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_controller extends CI_Controller {



    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
        // $this->load->model('usuario_model');

        
    }

    
    // METODO INDEX PARA VER LA PÁGINA PRINCIPAL
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/usuarios');
		$this->load->view('templates/footer');
		
	}
    
    // METODO ACERCA DE PARA VER LA PÁGINA PRINCIPAL
	public function acercade()
	{
		$this->load->view('templates/header');
		$this->load->view('panelControl/usuario/acercade');
		$this->load->view('templates/footer');
		
	}

    

}

                            