<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AcercadeModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  //CONSULTA PARA CARGAR LO DATOS DE LA TABLA PUBLICACION
  public function findAll()
  {
    return $this->db->get('acercade')->result();
  }

  //CONSULTA PARA OBTENER UN REGISTRO DE PUBLICACION
  public function findById($id = "")
  {
    $this->db->where('id_acercade', $id);
    return $this->db->get('acercade')->row();
  }

  //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE PUBLICACION
  public function update($data)
  {
      try {
          $this->db->where('id_acercade', $data['id_acercade']);
          if ($this->db->update('acercade', $data)) {
              return true;
          } else {
              return false;
          }
      } catch (mysqli_sql_exception $e) {
          return false;
      }
  }

}
