<?php

class Cita_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA CITA
    public function getAll(){  
        return $this->db->get('cita')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA CITA
    public function agregarCita($data){     
        try {
            $this->db->insert('cita', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA CITA
    public function eliminarCita($id = ""){
        try {
            $this->db->where('id_cita', $id);
            $this->db->delete('cita');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE CITA
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_cita, nombre, apellido, celular, email, padecimientos, procedimiento, fecha, hora, comentario');
            $this->db->from('cita');
            $this->db->where('id_cita', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE CITA
    public function actualizarCita($data){
        try {
            $this->db->replace('cita', $data);
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
	   }
	   


	   public function findByCriteria($datos){
        try {
        	$this->db->select('id_cita, nombre, apellido, celular, email, padecimientos, procedimiento, fecha, hora, comentario');
			$this->db->like('nombre', $datos);
			$this->db->or_like('apellido', $datos);
			$this->db->or_like('celular', $datos);
			$this->db->or_like('email', $datos);
			$this->db->or_like('fecha', $datos);
			$this->db->or_like('hora', $datos);
			return $this->db->get('cita')->result();
						
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    }

?>
