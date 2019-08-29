<?php

class Publicacion_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA PUBLICACION
    public function getAll(){  
        return $this->db->get('publicacion')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA PUBLICACION
    public function agregarPublicacion($data){     
        try {
            $this->db->insert('publicacion', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA PUBLICACION
    public function eliminarPublicacion($id = ""){
        try {
            $this->db->where('id_publicacion', $id);
            $this->db->delete('publicacion');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE PUBLICACION
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_publicacion nombre_publicacion, descripcion, estado, id_usuario, id_categoria, path, fecha_Ingreso');
            $this->db->from('publicacion');
            $this->db->where('id_publicacion', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE PUBLICACION
    public function actualizarPublicacion($data){
        try {
            $this->db->replace('publicacion', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
       }
    }

?>