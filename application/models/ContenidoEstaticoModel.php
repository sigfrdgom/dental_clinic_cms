<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContenidoEstaticoModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  //CONSULTA PARA CARGAR LO DATOS DE LA TABLA PUBLICACION
  public function findAll()
  {
    return $this->db->get('estatico')->result();
  }

  //CONSULTA PARA OBTENER UN REGISTRO DE PUBLICACION
  public function findById($id = "")
  {
    $this->db->where('id_estatico', $id);
    return $this->db->get('estatico')->row();
  }

  public function create($data)
    {
        try {
            if ($this->db->insert('estatico', $data)) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

  //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE PUBLICACION
  public function update($data)
  {
      try {
          $this->db->where('id_estatico', $data['id_estatico']);
          if ($this->db->update('estatico', $data)) {
              return true;
          } else {
              return false;
          }
      } catch (mysqli_sql_exception $e) {
          return false;
      }
  }

}
