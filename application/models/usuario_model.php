<?php

class Usuario_model extends CI_Model{

    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA USUARIO
    public function getAll(){  
        return $this->db->get('usuario')->result();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA USUARIO
    public function agregarUsuario($data){     
        try {
            $this->db->insert('usuario', $data);
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }


    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA USUARIO
    public function eliminarUsuario($id = ""){
        try {
            $this->db->where('id_usuario', $id);
            $this->db->delete('usuario');
            return 1;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE USUARIO
    public function obtenerRegistro($id = ""){
         try {
            $this->db->select('id_usuario, nombres, apellidos, nombre_usuario, contrasenia, tipo_usuario, estado');
            $this->db->from('usuario');
            $this->db->where('id_usuario', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        } catch (mysqli_sql_exception $e) {
            return 0;
        }  
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE USUARIO
    public function actualizarUsuario($data){
        try {
            $this->db->replace('usuario', $data);
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
        	$this->db->select('id_usuario, nombres, apellidos, nombre_usuario, contrasenia, tipo_usuario, estado');
			$this->db->like('nombres', $datos);
			$this->db->or_like('apellidos', $datos);
			$this->db->or_like('nombre_usuario', $datos);
			$this->db->or_like('tipo_usuario', $datos);
			
			return $this->db->get('usuario')->result();
						
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
	}
	

	 public function loginUp($usuario){
      $this->db->select('id_usuario, nombre_usuario, nombres, apellidos, tipo_usuario, estado, contrasenia');
      $this->db->from('usuario');
      $this->db->where('nombre_usuario', $usuario);
      $consulta = $this->db->get();
      return $consulta->row();
   }


   


    //CONSULTA PARA OBTENER UN REGISTRO DE USUARIO
    public function getValid($user){
        try {
           $this->db->select('id_usuario');
           $this->db->from('usuario');
           $this->db->where('nombre_usuario', $user);
           $consulta = $this->db->get();
           return $consulta->row();
       } catch (mysqli_sql_exception $e) {
           return 0;
       }  
    }


}

?>
