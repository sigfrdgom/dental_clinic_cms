<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
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
    $this->load->view('blog/blog');
    $this->load->view('templates/footer');
  }

  public function posts($keyword = "")
  {
    $datos = ['posts' => $this->PublicacionModel->get_all_posts($keyword)];
    $this->load->view('blog/posts', $datos);
  }

  public function create()
  {
    $datos = ['categories' => $this->CategoriaModel->getAll_not_testimonial()];
    $this->load->view('templates/header');
    $this->load->view('blog/create', $datos);
    $this->load->view('templates/footer');
  }

  private function savePictures($mi_archivo)
  {
    $config['upload_path'] = "uploads/";
    $config['file_name'] = "recurso_" . time();

    $config['allowed_types'] = 'bmp|gif|jpeg|jpg|jpe|png|tiff|tif';
    $config['max_size'] = "5120";
    $config['max_width'] = "8120";
    $config['max_height'] = "4096";

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
      'id_categoria' => $_POST['categoria'],
      'id_tipo' => 2,
      'titulo' => $_POST['titulo'],
      'texto_introduccion' => $_POST['texto_introduccion'],
      'contenido' => $_POST['contenido'],
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
            'message' => 'Registro Modifico con éxito');
          $this->session->set_flashdata($message);
        }
        //BITACORA DE MODIFICO
        $data = parent::bitacora("Modifico una Publicacion", $_POST['titulo']);
        $this->BitacoraModel->agregarBitacora($data);
      } else {
        if ($this->PublicacionModel->create($datos)) {
          //MESSAGE
          $message = array(
            'title' => 'Creación',
            'message' => 'Registro Agregado con éxito');
          $this->session->set_flashdata($message);
        }
        //BITACORA DE CREADO
        $data = parent::bitacora("Creo una Nueva Publicacion", $_POST['titulo']);
        $this->BitacoraModel->agregarBitacora($data);
      }

      redirect('blog');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e );
      $this->session->set_flashdata($message);
      redirect('blog');
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

  public function deletePosts($id)
  {
    // Convert stdclass to array
    $data = json_decode(json_encode($this->PublicacionModel->findById($id)), true);
    // get the last 3 register of the array
    $data = array_splice($data, -5, 4, true);
    // delete the keys of the array
    $data = array_values($data);
    $message = $this->deleteImage($data);
    // Delete the data from the database
    if($this->PublicacionModel->delete($id)){
      //MESSAGE
      $message = array(
        'title' => 'Eliminación',
        'message' => 'Se eliminó correctamente el registro');
      $this->session->set_flashdata($message);
    }
    //BITACORA DE ELIMINADO
    $data = parent::bitacora("Elimino una Publicacion", "PUBLICACION ELIMINADO");
    $this->BitacoraModel->agregarBitacora($data);
  }

  public function edit($id)
  {
    $datos = [
      'blog' => $this->PublicacionModel->findById($id),
      'categories' => $this->CategoriaModel->getAll_not_testimonial()
    ];
    $this->load->view('templates/header');
    $this->load->view('blog/edit', $datos);
    $this->load->view('templates/footer');
  }
}
