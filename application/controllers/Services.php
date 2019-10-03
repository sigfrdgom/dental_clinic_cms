<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('publicacion_model', 'categoria_model'));
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

  public function tbody()
  {
    $datos = ['services' => $this->publicacion_model->findAll()];
    $this->load->view('services/tbody', $datos);
  }

  public function create()
  {
    $datos = ['categories' => $this->categoria_model->getAll()];
    $this->load->view('templates/header');
    $this->load->view('services/create', $datos);
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
    $old_services = array();
    if(!empty($id)){
      $old_services = (array)$this->publicacion_model->findById($id);
    }else{
      $old_services = array(
        'recurso_av_1' => "",
        'recurso_av_2' => "",
        'recurso_av_3' => "",
        'recurso_av_4' => "");
    }

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
      'id_usuario' => 1,
      'id_categoria' => $_POST['categoria'],
      'id_tipo' => 1,
      'titulo' => $_POST['titulo'],
      'texto_introduccion' => $_POST['texto_introduccion'],
      'contenido' => $_POST['contenido'],
      'estado' => true,
      'recurso_av_1' => isset($data_files['file1']) ?  $data_files['file1']["upload_data"]['file_name'] : $old_services['recurso_av_1'],
      'recurso_av_2' => isset($data_files['file2']) ?  $data_files['file2']["upload_data"]['file_name'] : $old_services['recurso_av_2'],
      'recurso_av_3' => isset($data_files['file3']) ?  $data_files['file3']["upload_data"]['file_name'] : $old_services['recurso_av_3'],
      'recurso_av_4' => isset($data_files['file4']) ?  $data_files['file4']["upload_data"]['file_name'] : $old_services['recurso_av_4'],
      'fecha_ingreso' => $fecha->format('Y-m-d')
    ];

    try {
      if(!empty($id)){
        $data_img = $datos;
        $data_img = array_splice($data_img, -5, 4, true);
        $rutas = array();
        $found_img = false;
        for ($i=1; $i <=sizeof($data_img) ; $i++) { 
          if($data_img['recurso_av_'.$i] != $old_services['recurso_av_'.$i]){
            $rutas = array_merge($rutas, (array)$old_services['recurso_av_'.$i]);
            $found_img = true;
          }
        }
        if($found_img == true){
          $rutas = array_values($rutas);
          $this->deleteImage($rutas);
        }
        $this->publicacion_model->update($datos);
      }else{
        $this->publicacion_model->create($datos);
      }
      $message = array('message' => 'Registro Agregado con éxito');
      // $this->session->set_flashdata($message);
      redirect('services');
    } catch (Exception $e) {

      $message = array('error' => 'Error no se puedo agregar el registro ');
      // $this->session->set_flashdata($message);
      redirect('services');
    }
  }

  public function edit($id)
  {
    $datos = [
      'services' => $this->publicacion_model->findById($id),
      'categories' => $this->categoria_model->getAll()
    ];
    $this->load->view('templates/header');
    $this->load->view('services/edit', $datos);
    $this->load->view('templates/footer');
  }

  private function deleteImage($data){
    $message = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      if (isset($data[$i])) {
        $path = "./uploads/" . $data[$i];
        try {
          if (file_exists($path) == true) {
            if (!is_dir($path)) {
              if (unlink($path)) {
                $message= array('message' => 'deleted successfully');
              }
            }
          }
        } catch (Exception $e) {
          $message= array('error' => 'deleted successfully'); 
         }
      }
    }
    return $message;
  }

  // Delete services 
  public function deleteService($id)
  {
    // Covert stdclass to array
    $data = json_decode(json_encode($this->publicacion_model->findById($id)), true);
    // get the last 3 register of the array
    $data = array_splice($data, -5, 4, true);
    // delete the keys of the array
    $data = array_values($data);
    $message = $this->deleteImage($data);
    // Delete the data from the database
    $this->publicacion_model->delete($id);
  }

  public function updateService($id){
    $this->guardarDatos($id);
  }
}
