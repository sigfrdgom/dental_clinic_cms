<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonials extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model(array('publicacion_model', 'categoria_model'));
		parent::logueado();
  }

  public function index()
  {
    $datos = ['posts' => $this->publicacion_model->get_all_testimonials()];
    $this->load->view('templates/header');
    $this->load->view('testimonials/testimonials', $datos);
    $this->load->view('templates/footer');
  }

}
