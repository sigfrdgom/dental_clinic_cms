<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('publicacion_model'));
  }

  public function mostrarDatos()
  { }

  public function index()
  {
    $datos = ['services' => $this->publicacion_model->findAll()];
    $this->load->view('templates/header');
    $this->load->view('services/services', $datos);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->view('templates/header');
    $this->load->view('services/create');
    $this->load->view('templates/footer');
    $this->savePictures();
  }

  public function savePictures()
  {
    $mi_archivo = 'upload';
    $config['upload_path'] = "uploads/";
    // $config['file_name'] = "nombre_archivo";
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = "5000";
    $config['max_width'] = "2000";
    $config['max_height'] = "2000";

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload($mi_archivo)) {
      //*** ocurrio un error
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('services/create', $error);
    } else {
      $data = array('upload_data' => $this->upload->data());
      $this->load->view('services/create', $data);
    }
  }
}
