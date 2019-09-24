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
    if (($_FILES['recurso1']['size']) > 0) {
      $recurso1 = 'recurso1';
      // array_push($data_files, array('file1' => $this->savePictures($recurso1) ));
    }
    if (($_FILES['recurso2']['size']) > 0) {
      $recurso2 = 'recurso2';
      array_push($data_files, array('file2' => $this->savePictures($recurso2) ));
      var_dump( $_FILES['recurso2']);
    }
    if (($_FILES['recurso3']['size']) > 0) {
      $recurso3 = 'recurso3';
      array_push($data_files, array('file3' => $this->savePictures($recurso3) ));
    }
    if (($_FILES['recurso4']['size'])> 0) {
      $recurso4 = 'recurso4';
      array_push($data_files, array('file4' => $this->savePictures($recurso4) ));
    }
    // $recurso1 = $_FILES['recurso1']['name'];
    // $recurso2 = 'recurso2';
    // $recurso3 = 'recurso3';
    // $recurso4 = 'recurso4';
    
    // var_dump($data_files[0]);

    // $mi_archivo = 'upload';
    // $config = $this->configLibraryImg();
    
    // $this->load->library('upload', $config);
    // if (!$this->upload->do_upload($mi_archivo)) {
    //   //*** ocurrio un error
    //   $error = array('error' => $this->upload->display_errors());
    //   //Redireccionar al mismo formulario
    //   redirect('services/create', $error);
    // } else {
    //   //*** Datos de la imagen */
    //   $upload_data =  $this->upload->data();
    //   $fecha = new DateTime();
      
    //   $datos = [
    //     'id_publicacion' => null,
    //     'id_usuario' => 1,
    //     'id_categoria' => 1,
    //     'id_tipo' => 1,
    //     'titulo' => $_POST['titulo'],
    //     'texto_introduccion' => $_POST['texto_introduccion'],
    //     'contenido' => $_POST['contenido'],
    //     'estado' => true,
    //     'recurso_av_1' => $upload_data['file_name'],
    //     'recurso_av_2' => null,
    //     'recurso_av_3' => null,
    //     'recurso_av_4' => null,
    //     'fecha_ingreso' => $fecha->format('Y-m-d')
    //   ];
    //   //Crear el registro en la base de datos
    //   $this->publicacion_model->create($datos);
    //   // Redireccionar a la vista de servicios
    //   redirect('services', $upload_data);
    // }
  }




}
