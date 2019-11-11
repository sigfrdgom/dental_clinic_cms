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

} ?>
