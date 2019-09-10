<?php

class Servicios_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA SERVICIOS
    public function getAll(){  
        return $this->db->get('servicios')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA SERVICIOS
    public function agregarServicios($data){     
        try {
            $this->db->insert('servicios', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA SERVICIOS
    public function eliminarServicios($id = ""){
        try {
            $this->db->where('id_servicios', $id);
            $this->db->delete('servicios');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE SERVICIOS
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_servicios nombre, descripcion');
            $this->db->from('servicios');
            $this->db->where('id_servicios', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE SERVICIOS
    public function actualizarServicios($data){
        try {
            $this->db->replace('servicios', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
       }
    }

?>