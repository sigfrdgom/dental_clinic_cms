<?php

class Categoria_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA CATEGORIA
    public function getAll(){  
        return $this->db->get('categoria')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA CATEGORIA
    public function agregarCategoria($data){     
        try {
            $this->db->insert('categoria', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA CATEGORIA
    public function eliminarCategoria($id = ""){
        try {
            $this->db->where('id_categoria', $id);
            $this->db->delete('categoria');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE CATEGORIA
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_categoria, nombre_categoria, descripcion');
            $this->db->from('categoria');
            $this->db->where('id_categoria', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE CATEGORIA
    public function actualizarCategoria($data){
        try {
            $this->db->replace('categoria', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
       }
    }

?>
