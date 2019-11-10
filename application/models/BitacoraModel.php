<?php

class BitacoraModel extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA BITACORA
    public function getAll(){  
        return $this->db->get('bitacora')->result();
    }

  
    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA BITACORA
    public function agregarBitacora($data){     
        try {
            $this->db->insert('bitacora', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
	}
	

	public function findByCriteria($datos){
        try {
            $datos = trim($datos);
            if(!empty($datos)){
                $datos = urldecode($datos);
            }
        	$this->db->select('id_bitacora, usuario, accion, fecha');
			$this->db->like('usuario', $datos);
			$this->db->or_like('accion', $datos);
			$this->db->or_like('fecha', $datos);
			return $this->db->get('bitacora')->result();
						
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA BITACORA
    // public function eliminarBitacora($id = ""){
    //     try {
    //         $this->db->where('id_bitacora', $id);
    //         $this->db->delete('bitacora');
    //         return 1;
    //     } catch (mysqli_sql_exception $e) {
    //         return 0;
    //     }  
    // }

    //CONSULTA PARA OBTENER UN REGISTRO DE BITACORA
    // public function obtenerRegistro($id = ""){
    //      try {
    //         $this->db->select('id_bitacora, nombre, descripcion, estado');
    //         $this->db->from('bitacora');
    //         $this->db->where('id_bitacora', $id);
    //         $consulta = $this->db->get();
    //         $resultado = $consulta->row();
    //         return $resultado;
    //     } catch (mysqli_sql_exception $e) {
    //         return 0;
    //     }  
    // }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE BITACORA
    // public function actualizarBitacora($data){
    //     try {
    //         $this->db->where('id_bitacora', $data['id_bitacora']);
	// 		$this->db->update('bitacora', $data);
    //     } catch (mysqli_sql_exception $e) {
    //         return 0;
    //     }
	//    }


		   


	   


   

    }

?>
