<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('ContenidoEstaticoModel', 'BitacoraModel'));
  }

  public function index()
  {
    $datos = ['acercade' => $this->ContenidoEstaticoModel->findAll()];
    $this->load->view('templates/header');
    $this->load->view('aboutUs/aboutUs', $datos);
    $this->load->view('templates/footer');
  }

  public function editContent($id = "")
  {
    $id = trim($id);
    $datos = ['acercade' => $this->ContenidoEstaticoModel->findById($id)];
    $this->load->view('templates/header');
    $this->load->view('aboutUs/editContent', $datos);
    $this->load->view('templates/footer');
  }

  public function guardarDatos($id = "")
  {
    $datos = [
      'id_estatico' => trim($id) ? trim($id) : '',
      'titulo' => $_POST['titulo'],
      'contenido' => $_POST['contenido'],
      'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
    ];

    if ($this->ContenidoEstaticoModel->update($datos)) {
      //MESSAGE
      $message = array(
        'title' => 'Modificación',
        'message' => 'Registro Modificado con éxito'
      );
      $this->session->set_flashdata($message);
      $data = parent::bitacora("Modificó texto Sobre Nosotros", $_POST['titulo']);
      $this->BitacoraModel->agregarBitacora($data);
    }
    redirect('aboutUs');
  }
}
