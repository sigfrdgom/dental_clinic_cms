<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('publicacion_model'));
  }

  public function mostrarDatos(){

  }

  public function index()
  {
    $datos = ['services' => $this->publicacion_model->findAll()];
    $this->load->view('templates/header');
		$this->load->view('services/services', $datos);
		$this->load->view('templates/footer');
  }

}

