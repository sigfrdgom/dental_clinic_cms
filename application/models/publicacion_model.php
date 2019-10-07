<?php
class Publicacion_model extends CI_Model
{
    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA PUBLICACION
    public function findAll()
    {
        return $this->db->get('publicacion')->result();
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE PUBLICACION
    public function findById($id = "")
    {
        $this->db->where('id_publicacion', $id);
        return $this->db->get('publicacion')->row();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA PUBLICACION
    public function create($data)
    {
        try {
            if ($this->db->insert('publicacion', $data)) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }
    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA PUBLICACION
    public function delete($id = "")
    {
        try {
            $this->db->where('id_publicacion', $id);
            if ($this->db->delete('publicacion')) {
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
            $this->db->where('id_publicacion', $data['id_publicacion']);
            if ($this->db->update('publicacion', $data)) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public function search_services($keyword)
    {
        $keyword = trim($keyword = "");
        if (empty($keyword)) {
            $this->db->where('id_tipo', 1);
            return $this->db->get('publicacion')->result();
        } else {
            $this->db->where('id_tipo', 1);
            $this->db->like('titulo', $keyword);
            $this->db->or_like('texto_introduccion', $keyword);
            $this->db->or_like('contenido', $keyword);
            return $this->db->get('publicacion')->result();
        }
    }

    public function search_posts($keyword = ""){
        $keyword = trim($keyword);
        if (empty($keyword)) {
            $this->db->where('id_tipo', 2);
            return $this->db->get('publicacion')->result();
        } else {
            $this->db->where('id_tipo', 2);
            $this->db->like('titulo', $keyword);
            $this->db->or_like('texto_introduccion', $keyword);
            $this->db->or_like('contenido', $keyword);
            return $this->db->get('publicacion')->result();
        }
    }
}
