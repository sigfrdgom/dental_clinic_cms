<?php
class Publicacion_model extends CI_Model{
    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA PUBLICACION
    public function findAll(){  
        return $this->db->get('publicacion')->result();
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE PUBLICACION
    public function findById($id = ""){
        $this->db->where('id_publicacion', $id);
        return $this->db->get('publicacion')->row();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA PUBLICACION
    public function create($data){     
        try {
            if($this->db->insert('publicacion', $data)){
                return true;
            }else{
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
            // echo $e;
        }
    }
    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA PUBLICACION
    public function delete($id = ""){
        try {
            $this->db->where('id_publicacion', $id);
            if($this->db->delete('publicacion')){
                return true;
            }else{
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
            // echo $e;
        }  
    }
    
    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE PUBLICACION
    public function update($data){
        try {
            $this->db->where('id_publicacion', $data['id_publicacion']);
            if($this->db->update('publicacion', $data)){
                return true;
            }else{
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
       }
    }
?>