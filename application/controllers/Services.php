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
  }

  public function guardarDatos(){
    $mi_archivo = 'upload';
    $config['upload_path'] = "uploads/";
    $config['file_name'] = "recurso_".time();
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = "5000";
    $config['max_width'] = "2000";
    $config['max_height'] = "2000";

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload($mi_archivo)) {
      //*** ocurrio un error
      $error = array('error' => $this->upload->display_errors());
      //Redireccionar al mismo formulario
      redirect('services/create', $error);
    } else {
      //*** Datos de la imagen */
      $upload_data =  $this->upload->data();
      $fecha = new DateTime();
      
      $datos = [
        'id_publicacion' => null,
        'id_usuario' => 1,
        'id_categoria' => 1,
        'id_tipo' => 1,
        'titulo' => $_POST['titulo'],
        'texto_introduccion' => $_POST['texto_introduccion'],
        'contenido' => $_POST['contenido'],
        'estado' => true,
        'recurso_av_1' => $upload_data['file_name'],
        'recurso_av_2' => null,
        'recurso_av_3' => null,
        'recurso_av_4' => null,
        'fecha_ingreso' => $fecha->format('Y-m-d')
      ];
      //Crear el registro en la base de datos
      $this->publicacion_model->create($datos);
      // Redireccionar a la vista de servicios
      redirect('services', $upload_data);
    }
  }



}
