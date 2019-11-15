<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonials extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('PublicacionModel', 'CategoriaModel', 'BitacoraModel'));
    parent::logueado();
  }

  public function index()
  {
    $this->load->view('templates/header');
    $this->load->view('testimonials/testimonials');
    $this->load->view('templates/footer');
  }

  public function testimonials($keyword = "")
  {
    $datos = ['testimonials' => $this->PublicacionModel->get_all_testimonials($keyword)];
    $this->load->view('testimonials/histories', $datos);
  }

  public function create()
  {
    $datos = ['categories' => $this->CategoriaModel->get_testimonials_categories()];
    $this->load->view('templates/header');
    $this->load->view('testimonials/create', $datos);
    $this->load->view('templates/footer');
  }

  private function savePictures($mi_archivo)
  {
    $config['upload_path'] = "uploads/";
    $config['file_name'] = "recurso_" . time();

    $config['allowed_types'] = 'bmp|gif|jpeg|jpg|jpe|png|tiff|tif';
    $config['max_size'] = "5120";
    $config['max_width'] = "8120";
    $config['max_height'] = "8120";

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
    $id = trim($id);
    $old_posts = array();
    if (!empty($id) && !empty($this->PublicacionModel->findById($id))) {
      $old_posts = (array) $this->PublicacionModel->findById($id);
    } else {
      $old_posts = array(
        'recurso_av_1' => "",
      );
    }

    $data_files = array();
    if (isset($_FILES['recurso1']['name'])) {
      if ($_FILES['recurso1']['size'] > 0) {
        $data_files =  $this->savePictures('recurso1');
      }
    }

    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => 5,
      'id_tipo' => 3,
      'titulo' => $_POST['titulo'],
      'texto_introduccion' => $_POST['texto_introduccion'],
      'contenido' => "",
      'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
      'recurso_av_1' => isset($data_files["upload_data"]) ?  $data_files["upload_data"]['file_name'] : $old_posts['recurso_av_1'],
    ];

    try {
      if (!empty($id)) {
        $rutas = array();
        $found_img = false;
        if ($datos['recurso_av_1'] != $old_posts['recurso_av_1']) {
          $rutas = array_merge($rutas, (array) $old_posts['recurso_av_1']);
          $found_img = true;
        }
        if ($found_img == true) {
          $rutas = array_values($rutas);
          $this->deleteImage($rutas);
        }
        if ($this->PublicacionModel->update($datos)) {
          //MESSAGE
          $message = array(
            'title' => 'Modificación',
            'message' => 'Registro Modificado con éxito'
          );
          $this->session->set_flashdata($message);
          //BITACORA DE MODIFICO
          $data = parent::bitacora("Modificó un Testimonio", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      } else {
        if ($this->PublicacionModel->create($datos)) {
          //MESSAGE
          $message = array(
            'title' => 'Modificación',
            'message' => 'Registro Agregado con éxito'
          );
          $this->session->set_flashdata($message);
          //BITACORA DE CREADO
          $data = parent::bitacora("Creó un Nuevo TESTIMONIO", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      }
      redirect('testimonials');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e
      );
      $this->session->set_flashdata($message);
      redirect('testimonials');
    }
  }

  private function deleteImage($data)
  {
    $message = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      if (isset($data[$i])) {
        $path = "./uploads/" . $data[$i];
        try {
          if (file_exists($path) == true) {
            if (!is_dir($path)) {
              if (unlink($path)) {
                $message = array('message' => 'deleted successfully');
              }
            }
          }
        } catch (Exception $e) {
          $message = array('error' => 'deleted successfully');
        }
      }
    }
    return $message;
  }

  public function deleteTestimonials($id)
  {
    // Covert stdclass to array
    $datos = $this->PublicacionModel->findById($id);
    $data = (array) $datos;
    // get the last 3 register of the array
    $data = array_splice($data, -5, 4, true);
    // delete the keys of the array
    $data = array_values($data);
    $message = $this->deleteImage($data);
    // Delete the data from the database
    if ($this->PublicacionModel->delete($id)) {
      //MESSAGE
      $message = array(
        'title' => 'Eliminación',
        'message' => 'Se eliminó correctamente el registro'
      );
      $this->session->set_flashdata($message);
      //BITACORA DE ELIMINADO
      $data = parent::bitacora("Eliminó un Testimonio", $datos->titulo);
      $this->BitacoraModel->agregarBitacora($data);
    }
  }

  public function edit($id)
  {
    $datos = [
      'testimonial' => $this->PublicacionModel->findById($id),
      'categories' => $this->CategoriaModel->get_testimonials_categories()
    ];
    $this->load->view('templates/header');
    $this->load->view('testimonials/edit', $datos);
    $this->load->view('templates/footer');
  }
}
