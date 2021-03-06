<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomePage extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('PublicacionModel', 'CategoriaModel', 'ContenidoEstaticoModel', 'BitacoraModel'));
    parent::logueado();
  }

  public function index()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/homePage');
    $this->load->view('templates/footer');
  }

  /** -------------------------------- CAROUSEL IMAGES OF THE HOME PAGE ----------------------------------- **/

  public function showImages()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/showImages');
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/create');
    $this->load->view('templates/footer');
  }

  public function edit($id = "")
  {
    $id = trim($id);
    $datos = ['image' => $this->PublicacionModel->get_images_carousel_by_id($id)];
    $this->load->view('templates/header');
    $this->load->view('homePage/edit', $datos);
    $this->load->view('templates/footer');
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
        $data_files =  $this->savePictures('recurso1', "uploads/inicio/");
      }
    }

    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => 6,
      'id_tipo' => 4,
      'titulo' => isset($_POST['titulo']) ? $_POST['titulo'] : "",
      'texto_introduccion' => "",
      'contenido' => isset($_POST['contenido']) ? $_POST['contenido'] : "",
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
          $data = parent::bitacora("Modificó una imagen de la página de inicio", $_POST['titulo']);
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
          $data = parent::bitacora("Agregó una imagen de la página de inicio", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      }
      redirect('homePage/showImages');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e
      );
      $this->session->set_flashdata($message);
      redirect('homePage/showImages');
    }
  }

  private function savePictures($mi_archivo, $path_image = "")
  {
    $path_image = trim($path_image);
    if (!empty($path_image)) {
      $config['upload_path'] = $path_image;
    } else {
      $config['upload_path'] = "uploads/inicio";
    }
    $config['file_name'] = "recurso_" . time();
    $config['allowed_types'] = '*';
    // $config['allowed_types'] = 'bmp|gif|jpeg|jpg|jpe|png|tiff|tif';
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
      $this->savePicturesThumbnail($data['upload_data']['file_name']);
      return $data;
    }
  }

  private function savePicturesThumbnail($name)
  {
    $config['image_library'] = 'gd2';
    $config['source_image'] = "./uploads/inicio/".$name;
    $config['create_thumb'] = FALSE;
    $config['new_image'] = "uploads/thumbnails/inicio/".$name;
    $config['maintain_ratio'] = TRUE;
    // $config['width']         = 250;
    // $config['height']       = 175;
    $config['width']         = 350;
    $config['height']       = 245;

    $this->load->library('image_lib', $config);
    if (!$this->image_lib->resize()) {
      echo $this->image_lib->display_errors();
    }
  }

  private function deleteImage($data, $path_img = "")
  {
    $message = array();
    for ($i = 0; $i < sizeof($data); $i++) {
      if (isset($data[$i])) {
        if($path_img){
          $path = $path_img . $data[$i];
        }else{
          $path = "./uploads/inicio/" . $data[$i];
        }
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
    $message = $this->deleteImage($data, "./uploads/inicio/");
    // Delete thumbanails
    $message = $this->deleteImage($data, "./uploads/thumbnails/inicio/");
    // Delete the data from the database
    if ($this->PublicacionModel->delete($id)) {
      //MESSAGE
      $message = array(
        'title' => 'Eliminación',
        'message' => 'Se eliminó correctamente el registro'
      );
      $this->session->set_flashdata($message);
      //BITACORA DE ELIMINADO
      $data = parent::bitacora("Eliminó imagen de la página de inicio", $datos->titulo);
      $this->BitacoraModel->agregarBitacora($data);
    }
  }

  /*** ------------------------------ VIDEO OF THE HOME PAGE ------------------------------------------ */

  public function showVideo()
  {
    $datos = ['video' => $this->ContenidoEstaticoModel->findById(4)];
    $this->load->view('templates/header');
    $this->load->view('homePage/showVideo', $datos);
    $this->load->view('templates/footer');
  }

  public function editVideo()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/editVideo');
    $this->load->view('templates/footer');
  }

  public function guardarVideo($id)
  {
    $id = trim($id);
    $datos = [
      'id_estatico' => trim($id) ? trim($id) : '',
      'titulo' => isset($_POST['titulo']) ? $_POST['titulo'] : "",
      'contenido' => isset($_POST['URL-video']) ? $_POST['URL-video'] : "",
      'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
    ];
    if ($this->ContenidoEstaticoModel->update($datos)) {
      //MESSAGE
      $message = array(
        'title' => 'Modificación',
        'message' => 'Registro Modificado con éxito'
      );
      $this->session->set_flashdata($message);
      $data = parent::bitacora("Cambio el video de la página de inicio", "Video");
      $this->BitacoraModel->agregarBitacora($data);
    }
    redirect('homePage/showVideo');
  }

  /** ------------------------------- SCHEDULES OF THE HOME PAGE ---------------------------------------- */

  public function horarios()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/horarios');
    $this->load->view('templates/footer');
  }

  public function guardarSchedules($id = "")
  {
    $id = trim($id);
    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => 13,
      'id_tipo' => 4,
      'titulo' => "",
      'texto_introduccion' => "",
      'contenido' => isset($_POST['contenido']) ? $_POST['contenido'] : "",
      'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
      'recurso_av_1' => "",
    ];

    try {
      if (!empty($id)) {
        if ($this->PublicacionModel->update($datos)) {
          //MESSAGE
          $message = array(
            'title' => 'Modificación',
            'message' => 'Registro Modificado con éxito'
          );
          $this->session->set_flashdata($message);
          //BITACORA DE MODIFICO
          $data = parent::bitacora("Modificó un registro de horario", "Horario");
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
          $data = parent::bitacora("Agregó un registro de horario", "Horario");
          $this->BitacoraModel->agregarBitacora($data);
        }
      }
      // redirect('homePage/horarios');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e
      );
      $this->session->set_flashdata($message);
      // redirect('homePage/horarios');
    }
  }

  public function deleteSchedule($id)
  {
    if ($this->PublicacionModel->delete($id)) {
      //MESSAGE
      $message = array(
        'title' => 'Eliminación',
        'message' => 'Se eliminó correctamente el registro'
      );
      $this->session->set_flashdata($message);
      //BITACORA DE ELIMINADO
      $data = parent::bitacora("Eliminó registro de horario", "Horario");
      $this->BitacoraModel->agregarBitacora($data);
    }
  }

  /** ------------------------------- DESCRIPTION OF THE HOME PAGE ------------------------------------ */

  public function descripcion()
  {
    $datos = ['descripcion' => $this->ContenidoEstaticoModel->findById(5)];
    $this->load->view('templates/header');
    $this->load->view('homePage/descripcion', $datos);
    $this->load->view('templates/footer');
  }

  public function editContent($id = "")
  {
    $id = trim($id);
    $datos = ['descripcion' => $this->ContenidoEstaticoModel->findById($id)];
    $this->load->view('templates/header');
    $this->load->view('homePage/editContent', $datos);
    $this->load->view('templates/footer');
  }

  public function guardarDescripcion($id = "")
  {
    $datos = [
      'id_estatico' => trim($id) ? trim($id) : '',
      'titulo' => isset($_POST['titulo']) ? $_POST['titulo'] : "",
      'contenido' => isset($_POST['contenido']) ? $_POST['contenido'] : "",
      'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
    ];

    if ($this->ContenidoEstaticoModel->update($datos)) {
      //MESSAGE
      $message = array(
        'title' => 'Modificación',
        'message' => 'Registro Modificado con éxito'
      );
      $this->session->set_flashdata($message);
      $data = parent::bitacora("Modificó descripción de la página de inicio", $_POST['titulo']);
      $this->BitacoraModel->agregarBitacora($data);
    }
    redirect('homePage/descripcion');
  }

  /*** -------------------------------- CLASIFICATIONS SERVICES OF THE HOME PAGE -------------------------------**/

  public function showClasifcationServices()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/showClasifcationServices');
    $this->load->view('templates/footer');
  }

  public function createClasification()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/createClasification');
    $this->load->view('templates/footer');
  }

  public function editClasification($id = "")
  {
    $id = trim($id);
    $datos = ['clasificationServices' => $this->PublicacionModel->get_clasification_services_by_id($id)];
    $this->load->view('templates/header');
    $this->load->view('homePage/editClasification', $datos);
    $this->load->view('templates/footer');
  }

  public function guardarClasificationServices($id = "")
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
        $data_files =  $this->savePictures('recurso1', "uploads/inicio/");
      }
    }

    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => 14,
      'id_tipo' => 4,
      'titulo' => isset($_POST['titulo']) ? $_POST['titulo'] : "",
      'texto_introduccion' => "",
      'contenido' => isset($_POST['contenido']) ? $_POST['contenido'] : "",
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
          $data = parent::bitacora("Modificó una clasificación de servicios en la página de inicio", $_POST['titulo']);
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
          $data = parent::bitacora("Agregó una clasificación de servicios en la página de inicio", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      }
      redirect('homePage/showClasifcationServices');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e
      );
      $this->session->set_flashdata($message);
      redirect('homePage/showClasifcationServices');
    }
  }

  public function deleteClasificatonService($id)
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
      $data = parent::bitacora("Eliminó una clasificación de servicios en la página de inicio", $datos->titulo);
      $this->BitacoraModel->agregarBitacora($data);
    }
  }

  /**  ---------------------------------------- ICONS SERVICES ---------------------------------------------- */

  public function iconsServices()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/iconsServices');
    $this->load->view('templates/footer');
  }

  public function createIcon()
  {
    $this->load->view('templates/header');
    $this->load->view('homePage/createIcon');
    $this->load->view('templates/footer');
  }

  public function editIcon($id = "")
  {
    $id = trim($id);
    $datos = ['image' => $this->PublicacionModel->get_icons_services_by_id($id)];
    $this->load->view('templates/header');
    $this->load->view('homePage/editIcon', $datos);
    $this->load->view('templates/footer');
  }

  public function saveIconServices($id = "")
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
        $data_files =  $this->savePictures('recurso1', "uploads/inicio/");
      }
    }

    $datos = [
      'id_publicacion' => trim($id) ? trim($id) : '',
      'id_usuario' => $this->session->userdata('id_usuario'),
      'id_categoria' => 17,
      'id_tipo' => 4,
      'titulo' => isset($_POST['titulo']) ? $_POST['titulo'] : "",
      'texto_introduccion' => "",
      'contenido' => isset($_POST['contenido']) ? $_POST['contenido'] : "",
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
          $data = parent::bitacora("Modificó un icono de servicios en la página de inicio", $_POST['titulo']);
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
          $data = parent::bitacora("Agregó un icono de servicios en la página de inicio", $_POST['titulo']);
          $this->BitacoraModel->agregarBitacora($data);
        }
      }
      redirect('homePage/iconsServices');
    } catch (Exception $e) {
      $message = array(
        'title' => 'error',
        'error' => $e
      );
      $this->session->set_flashdata($message);
      redirect('homePage/iconsServices');
    }
  }

  public function deleteIconService($id)
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
      $data = parent::bitacora("Eliminó un icono de servicios en la página de inicio", $datos->titulo);
      $this->BitacoraModel->agregarBitacora($data);
    }
  }
}
