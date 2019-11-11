<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('AcercadeModel'));
  }

  public function index()
  {
    $datos = ['acercade' => $this->AcercadeModel->findAll()];
    $this->load->view('templates/header');
    $this->load->view('aboutUs/aboutUs', $datos);
    $this->load->view('templates/footer');
  }

  public function editContent($id = "")
  {
    $id = trim($id);
    $datos = ['acercade' => $this->AcercadeModel->findById($id)];
    $this->load->view('templates/header');
    $this->load->view('aboutUs/editContent', $datos);
    $this->load->view('templates/footer');
  }

  public function guardarDatos($id = "")
  {
    $datos = [
      'id_acercade' => trim($id) ? trim($id) : '',
      'titulo' => $_POST['titulo'],
      'contenido' => $_POST['contenido'],
      'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
    ];

    $this->AcercadeModel->update($datos);
    redirect('aboutUs');
  }
}
