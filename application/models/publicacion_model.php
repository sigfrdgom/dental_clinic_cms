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

    // public function search_services($keyword = "")
    // {
    //     $keyword = trim($keyword);
    //     if (empty($keyword)) {
    //         $this->db->where('id_tipo', 1);
    //         return $this->db->get('publicacion')->result();
    //     } else {
    //         $this->db->where('id_tipo', 1);
    //         $this->db->like('titulo', $keyword);
    //         $this->db->or_like('texto_introduccion', $keyword);
    //         $this->db->or_like('contenido', $keyword);
    //         return $this->db->get('publicacion')->result();
    //     }
    // }

    public function search_posts($keyword = ""){
        $keyword = trim($keyword);
        if (empty($keyword)) {
            $this->db->where('id_tipo', 2);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
			$escape="'%".$keyword."%' ESCAPE '!'";
			$query=$this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 2 AND ( `titulo` LIKE '.$escape.' OR `texto_introduccion` LIKE '.$escape.' OR `contenido` LIKE '.$escape.') ORDER BY `fecha_ingreso` DESC');

			return $query->result();

			// $this->db->where('id_tipo', 2);		
            // $this->db->like('titulo', $keyword);
            // $this->db->or_like('texto_introduccion', $keyword);
			// $this->db->or_like('contenido', $keyword);
            // $this->db->order_by('fecha_ingreso', 'DESC');
            // return $this->db->get('publicacion')->result();
        }
	}
	
	public function cargaServices(){

            $this->db->where('id_tipo', 1);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
       
	}
	
	public function search_services($keyword = ""){
        $keyword = trim($keyword);
        if (empty($keyword)) {
            $this->db->where('id_tipo', 1);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
			$escape="'%".$keyword."%' ESCAPE '!'";
			$query=$this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 1 AND ( `titulo` LIKE '.$escape.' OR `texto_introduccion` LIKE '.$escape.' OR `contenido` LIKE '.$escape.') ORDER BY `fecha_ingreso` DESC');

			return $query->result();

        }
	}

	// public function cargaServicesRest(){
		
    //         $this->db->where('id_tipo', 1);
    //         $this->db->order_by('fecha_ingreso', 'DESC');
    //         return $this->db->get('publicacion')->result();
       
	// }


}
