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
                $this->PublicacionModel->update($datos);
                //BITACORA DE MODIFICO
                $data = parent::bitacora("Modifico una Método de Pago", $_POST['titulo']);
                $this->BitacoraModel->agregarBitacora($data);
            } else {
                $this->PublicacionModel->create($datos);
                //BITACORA DE CREADO
                $data = parent::bitacora("Creo una Nuevo Método de Pago", $_POST['titulo']);
                $this->BitacoraModel->agregarBitacora($data);
            }
            redirect('payment');
        } catch (Exception $e) {
            redirect('payment');
        }
    }

    public function delete($id)
    {
        $this->PublicacionModel->delete($id);
        //BITACORA DE ELIMINADO
        $data = parent::bitacora("Elimino una Publicacion", "PUBLICACION ELIMINADO");
        $this->BitacoraModel->agregarBitacora($data);
    }
}
