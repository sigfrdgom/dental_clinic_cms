<?php

class Contacto_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA CONTACTO
    public function getAll(){  
        return $this->db->get('contacto')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA CONTACTO
    public function agregarContacto($data){     
        try {
            $this->db->insert('contacto', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA CONTACTO
    public function eliminarContacto($id = ""){
        try {
            $this->db->where('id_contacto', $id);
            $this->db->delete('contacto');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE CONTACTO
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_contacto telefono, email, comentario');
            $this->db->from('contacto');
            $this->db->where('id_contacto', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE CONTACTO
    public function actualizarContacto($data){
        try {
            $this->db->replace('contacto', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
       }
    }

?>
