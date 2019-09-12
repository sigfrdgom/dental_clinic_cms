<?php

class Tipo_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA TIPO
    public function getAll(){  
        return $this->db->get('tipo')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA TIPO
    public function agregarTipo($data){     
        try {
            $this->db->insert('tipo', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA TIPO
    public function eliminarTipo($id = ""){
        try {
            $this->db->where('id_tipo', $id);
            $this->db->delete('tipo');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE TIPO
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_tipo nombre, estado');
            $this->db->from('tipo');
            $this->db->where('id_tipo', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE TIPO
    public function actualizarTipo($data){
        try {
            $this->db->replace('tipo', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
       }
    }

?>