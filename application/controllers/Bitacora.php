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
		$this->load->view('panelControl/usuario/bitacora');
		$this->load->view('templates/footer');
	}
    	

}
