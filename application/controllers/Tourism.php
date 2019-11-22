<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tourism extends CI_Controller
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
    $this->load->view('tourism/tourism');
    $this->load->view('templates/footer');
  }

  public function galleryImages()
  {
    $this->load->view('templates/header');
    $this->load->view('tourism/galleryImages');
    $this->load->view('templates/footer');
  }

  public function addImage()
  {
    $this->load->view('templates/header');
    $this->load->view('tourism/addImage');
    $this->load->view('templates/footer');
  }

  public function editImage($id = "")
  {
    $id = trim($id);
    $datos = ['image' => $this->PublicacionModel->get_gallery_tourism_by_id($id)];
    $this->load->view('templates/header');
    $this->load->view('tourism/editImage', $datos);
    $this->load->view('templates/footer');
  }

  private function savePictures($mi_archivo, $path_image = "")
  {
    $path_image = trim($path_image);
    if (!empty($path_image)) {
      $config['upload_path'] = $path_image;
    } else {
      $config['upload_path'] = "uploads/";
    }
    $config['file_name'] = "recurso_" . time();

    $config['allowed_types'] = 'bmp|gif|jpeg|jpg|jpe|png|tiff|tif';
    $config['max_size'] = "5500";
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

    public function saveGallery($id = "")
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
          $data_files =  $this->savePictures('recurso1', "uploads/tourism/");
        }
      }

      $datos = [
        'id_publicacion' => trim($id) ? trim($id) : '',
        'id_usuario' => $this->session->userdata('id_usuario'),
        'id_categoria' => 15,
        'id_tipo' => 7,
        'titulo' => $_POST['titulo'],
        'texto_introduccion' => "",
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
              'message' => 'Registro Modificado con éxito'
            );
            $this->session->set_flashdata($message);
            //BITACORA DE MODIFICO
            $data = parent::bitacora("Modificó una imagen de la galería de turismo médico", $_POST['titulo']);
            $this->BitacoraModel->agregarBitacora($data);
          }
        } else {
          if ($this->PublicacionModel->create($datos)) {
            //MESSAGE
            $message = array(
              'title' => 'Creación',
              'message' => 'Registro Agregado con éxito'
            );
            $this->session->set_flashdata($message);
            //BITACORA DE CREADO
            $data = parent::bitacora("Agregó una imagen de la galería de turismo médico", $_POST['titulo']);
            $this->BitacoraModel->agregarBitacora($data);
          }
        }
        redirect('tourism/galleryImages');
      } catch (Exception $e) {
        $message = array(
          'title' => 'error',
          'error' => $e
        );
        $this->session->set_flashdata($message);
        redirect('tourism/galleryImages');
      }
    }

  private function deleteImage($data)
  {
    $message = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      if (isset($data[$i])) {
        $path = "./uploads/tourism/" . $data[$i];
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

  public function delete($id)
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
      $data = parent::bitacora("Eliminó imagen de la galería de torismo médico", $datos->titulo );
      $this->BitacoraModel->agregarBitacora($data);
    }
  }

  /** -------------------------------------- WALLPAPER OF THE PAGE ----------------------------------------- */

  public function showWallpapers()
  {
    $this->load->view('templates/header');
    $this->load->view('tourism/showWallpapers');
    $this->load->view('templates/footer');
  }

  public function addWallpaper()
  {
    $this->load->view('templates/header');
    $this->load->view('tourism/addWallpaper');
    $this->load->view('templates/footer');
  }

  public function editWallpaper($id = "")
  {
    $id = trim($id);
    $datos = ['image' => $this->PublicacionModel->get_wallpaper_tourism_by_id($id)];
    $this->load->view('templates/header');
    $this->load->view('tourism/editWallpaper', $datos);
    $this->load->view('templates/footer');
  }

  public function saveWallpaper($id = "")
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
        $data_files =  $this->savePictures('recurso1', "uploads/tourism/");
      }
    }

    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => 16,
      'id_tipo' => 7,
      'titulo' => $_POST['titulo'],
      'texto_introduccion' => "",
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
            'message' => 'Registro Modificado con éxito'
          );
          $this->session->set_flashdata($message);
          //BITACORA DE MODIFICO
          $data = parent::bitacora("Modificó una imagen de la galería de turismo médico", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      } else {
        if ($this->PublicacionModel->create($datos)) {
          //MESSAGE
          $message = array(
            'title' => 'Creación',
            'message' => 'Registro Agregado con éxito'
          );
          $this->session->set_flashdata($message);
          //BITACORA DE CREADO
          $data = parent::bitacora("Agregó una imagen de la galería de turismo médico", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      }
      redirect('tourism/showWallpapers');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e
      );
      $this->session->set_flashdata($message);
      redirect('tourism/showWallpapers');
    }
  }

  public function deleteWallpaper($id)
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
      $data = parent::bitacora("Eliminó imagen de la galería de torismo médico", $datos->titulo );
      $this->BitacoraModel->agregarBitacora($data);
    }
  }

}