<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
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
        $this->load->view('payment/payment');
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $datos = ['categories' => $this->CategoriaModel->getAll_not_testimonial()];
        $this->load->view('templates/header');
        $this->load->view('payment/create', $datos);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $datos = [
            'payment' => $this->PublicacionModel->findById($id),
            'categories' => $this->CategoriaModel->getAll_not_testimonial()
        ];
        $this->load->view('templates/header');
        $this->load->view('payment/edit', $datos);
        $this->load->view('templates/footer');
    }

    public function guardarDatos($id = "")
    {
        $id = trim($id);

        $datos = [
            'id_publicacion' => trim($id) ? trim($id) : '',
            'id_usuario' => $this->session->userdata('id_usuario'),
            'id_categoria' => 7,
            'id_tipo' => 6,
            'titulo' => $_POST['titulo'],
            'texto_introduccion' => "",
            'contenido' => $_POST['contenido'],
            'estado' => isset($_POST['estado']) ? $_POST['estado'] : true,
            'recurso_av_1' => ""
        ];

        try {
            if (!empty($id)) {
                if ($this->PublicacionModel->update($datos)) {
                    //MESSAGE
                    $message = array(
                      'title' => 'Modificación',
                      'message' => 'Registro Modifico con éxito'
                    );
                    $this->session->set_flashdata($message);
                  }
                //BITACORA DE MODIFICO
                $data = parent::bitacora("Modifico una Método de Pago", $_POST['titulo']);
                $this->BitacoraModel->agregarBitacora($data);
            } else {
                if ($this->PublicacionModel->create($datos)) {
                    //MESSAGE
                    $message = array(
                      'title' => 'Creación',
                      'message' => 'Registro Agregado con éxito'
                    );
                    $this->session->set_flashdata($message);
                  }
                //BITACORA DE CREADO
                $data = parent::bitacora("Creo una Nuevo Método de Pago", $_POST['titulo']);
                $this->BitacoraModel->agregarBitacora($data);
            }
            redirect('payment');
        } catch (Exception $e) {
            $message = array(
                'title' => 'error',
                'error' => $e );
              $this->session->set_flashdata($message);
            redirect('payment');
        }
    }

    public function delete($id)
    {
        if ($this->PublicacionModel->delete($id)) {
            //MESSAGE
            $message = array(
              'title' => 'Eliminación',
              'message' => 'Se eliminó correctamente el registro'
            );
            $this->session->set_flashdata($message);
          }
        //BITACORA DE ELIMINADO
        $data = parent::bitacora("Elimino una Publicacion", "PUBLICACION ELIMINADO");
        $this->BitacoraModel->agregarBitacora($data);
    }
}
