<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioControl extends CI_Controller {

	

	
    public function __construct()
    {
		//METODO CARGADO EN EL MODELO
		parent::__construct();
		$this->load->model('BitacoraModel');
	}





	public function index()
	{
		
		$this->load->view('login/login');
		
	}


	public function index2()
	{
		parent::logueado();
		
		$data= $this->session->userdata('nombre');
		
		$this->load->view('templates/header', $data);
		$this->load->view('panelControl/index');
		$this->load->view('templates/footer');

	}


	public function finalizarSesion()
	{
		$data=[ "id_bitacora" => null,
			    "accion" =>"Finazalizacion de sesion",
				"titulo" => $this->session->userdata('nombre'),
				"usuario" => $this->session->userdata('id_usuario') 
				];
					
		$this->BitacoraModel->agregarBitacora($data);
		$this->session->sess_destroy();
		

		redirect(base_url());
	}
	





}
