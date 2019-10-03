<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InicioControl extends CI_Controller {

	
	public function index()
	{
		// $this->load->view('templates/header');
		// $this->load->view('panelControl/index');
		$this->load->view('login/login');
		$this->load->view('templates/footer');
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
		$this->session->sess_destroy();
		redirect(base_url());
	}
	





}
