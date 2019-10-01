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

  private function savePictures($mi_archivo){
    $config['upload_path'] = "uploads/";
    $config['file_name'] = "recurso_".time();
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = "5000";
    $config['max_width'] = "2000";
    $config['max_height'] = "2000";

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($mi_archivo)) {
      //*** ocurrio un error
      $error = array(
        'error' => $this->upload->display_errors(),
        'state' => false
      );
      return $error;
    } else {
      //*** Datos de la imagen */
      $data = array(
      'upload_data' =>  $this->upload->data(),
      'state' => true
      );
      return $data;
    }
  }

  public function guardarDatos(){

    $data_files = array();
    for ($i=1; $i <= sizeof($_FILES) ; $i++) { 
      if (isset($_FILES['recurso'.$i]['name'])) {
        if ($_FILES['recurso'.$i]['size'] > 0) {
          $data_files = array_merge($data_files, array('file'.$i => $this->savePictures('recurso'.$i)));
        }
      }
    }

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
          'recurso_av_1' => isset($data_files['file1'])?  $data_files['file1']["upload_data"]['file_name']: '',
          'recurso_av_2' => isset($data_files['file2'])?  $data_files['file2']["upload_data"]['file_name']: '',
          'recurso_av_3' => isset($data_files['file3'])?  $data_files['file3']["upload_data"]['file_name']: '',
          'recurso_av_4' => isset($data_files['file4'])?  $data_files['file4']["upload_data"]['file_name']: '',
          'fecha_ingreso' => $fecha->format('Y-m-d')
        ];

        try {
          $this->publicacion_model->create($datos);
          $message = array('message' => 'Registro Agregado con éxito');
          // $this->session->set_flashdata($message);
          redirect('services');
        } catch (Exception $e) {

          $this->publicacion_model->create($datos);
          $message = array('error' => 'Error no se puedo agregar el registro ');
          // $this->session->set_flashdata($message);
          redirect('services');
        }
        
  }

  // Delete services 
  public function deleteService($id){
    $this->publicacion_model->delete($id);
  }




}
