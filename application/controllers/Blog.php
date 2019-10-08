<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model(array('publicacion_model', 'categoria_model'));
		parent::logueado();
  }

  public function index()
  {
    $datos = ['posts' => $this->publicacion_model->search_posts()];
    $this->load->view('templates/header');
    $this->load->view('blog/blog', $datos);
    $this->load->view('templates/footer');
  }

  public function posts($keyword = "")
  {
    $datos = ['posts' => $this->publicacion_model->search_posts($keyword)];
    $this->load->view('blog/posts', $datos);
  }

  public function create()
  {
    $datos = ['categories' => $this->categoria_model->getAll()];
    $this->load->view('templates/header');
    $this->load->view('blog/create', $datos);
    $this->load->view('templates/footer');
  }

  private function savePictures($mi_archivo)
  {
    $config['upload_path'] = "uploads/";
    $config['file_name'] = "recurso_" . time();

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

  public function guardarDatos($id = "")
  {
    $data_files = array();
    for ($i = 1; $i <= sizeof($_FILES); $i++) {
      if (isset($_FILES['recurso' . $i]['name'])) {
        if ($_FILES['recurso' . $i]['size'] > 0) {
          $data_files = array_merge($data_files, array('file' . $i => $this->savePictures('recurso' . $i)));
        }
      }
    }

    $fecha = new DateTime();
    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => $_POST['categoria'],
      'id_tipo' => 2,
      'titulo' => $_POST['titulo'],
      'texto_introduccion' => $_POST['texto_introduccion'],
      'contenido' => $_POST['contenido'],
      'estado' => true,
      'recurso_av_1' => isset($data_files['file1']) ?  $data_files['file1']["upload_data"]['file_name'] : "",
      'recurso_av_2' => "",
      'recurso_av_3' => "",
      'recurso_av_4' => "",
      'fecha_ingreso' => $fecha->format('Y-m-d')
    ];

      $this->publicacion_model->create($datos);
      
      $message = array('message' => 'Registro Agregado con éxito');
      // $this->session->set_flashdata($message);
      redirect('blog');
    
      // $message = array('error' => 'Error no se puedo agregar el registro ');
      // // $this->session->set_flashdata($message);
      // redirect('blog');
    
  }
}
