<?php

class TipoUsuario_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA TIPO_USUARIO
    public function getAll(){  
        return $this->db->get('tipo_usuario')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA TIPO_USUARIO
    public function agregarTipoUsuario($data){     
        try {
            $this->db->insert('tipo_usuario', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA TIPO_USUARIO
    public function eliminarTipoUsuario($id = ""){
        try {
            $this->db->where('id_tipo_usuario', $id);
            $this->db->delete('tipo_usuario');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE TIPO_USUARIO
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_tipo_usuario nombre_tipo_usuario, descripcion');
            $this->db->from('tipo_usuario');
            $this->db->where('id_tipo_usuario', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE TIPO_USUARIO
    public function actualizarTipoUsuario($data){
        try {
            $this->db->replace('tipo_usuario', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
       }
    }

?>