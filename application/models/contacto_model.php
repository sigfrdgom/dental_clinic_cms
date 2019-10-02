<?php

class Contacto_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA CONTACTO
    public function getAll(){ 
        $this->db->from('contacto');
        $this->db->order_by('fecha','DESC');
        $query = $this->db->get();
        return $query->result();
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
            $this->db->select('id_contacto, nombre, telefono, email, comentario, fecha, estado');
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
	
	


	public function findByCriteria($datos){
        try {
        	$this->db->select('id_contacto, nombre, telefono, email, comentario');
			$this->db->like('nombre', $datos);
			$this->db->or_like('telefono', $datos);
			$this->db->or_like('email', $datos);
			return $this->db->get('contacto')->result();
						
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }



    }

?>
