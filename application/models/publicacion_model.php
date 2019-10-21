<?php
class Publicacion_model extends CI_Model
{
    //CONSULTA PARA CARGAR LO DATOS DE LA TABLA PUBLICACION
    public function findAll()
    {
        return $this->db->get('publicacion')->result();
    }

    //CONSULTA PARA OBTENER UN REGISTRO DE PUBLICACION
    public function findById($id = "")
    {
        $this->db->where('id_publicacion', $id);
        return $this->db->get('publicacion')->row();
    }

    //CONSULTA PARA AGREGAR UN REGISTRO A LA TABLA PUBLICACION
    public function create($data)
    {
        try {
            if ($this->db->insert('publicacion', $data)) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }
    //CONSULTA PARA ELIMINAR UN REGISTRO A LA TABLA PUBLICACION
    public function delete($id = "")
    {
        try {
            $this->db->where('id_publicacion', $id);
            if ($this->db->delete('publicacion')) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    //CONSULTA PARA ACTUALIZAR UN REGISTRO UN REGISTRO DE PUBLICACION
    public function update($data)
    {
        try {
            $this->db->where('id_publicacion', $data['id_publicacion']);
            if ($this->db->update('publicacion', $data)) {
                return true;
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public function get_all_posts($keyword = "")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        if (empty($keyword)) {
            $this->db->where('id_tipo', 2);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 2 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC');
            return $query->result();
        }
    }

    public function get_posts($id = "")
    {
        $this->db->where('id_tipo', 2);
        $this->db->where('estado', '1');
        $this->db->order_by('fecha_ingreso', 'DESC');
        if (!empty(trim($id))) {
            $this->db->where('id_publicacion', $id);
            return $this->db->get('publicacion')->row();
        } else {
            return $this->db->get('publicacion')->result();
        }
    }

    public function get_recent_posts()
    {
        $this->db->select('id_publicacion, titulo, texto_introduccion, recurso_av_1, fecha_ingreso');
        $this->db->where('id_tipo', 2);
        $this->db->where('estado', '1');
        $this->db->order_by('fecha_ingreso', 'DESC');
        $this->db->limit(3, 0);
        return $this->db->get('publicacion')->result();
    }

    public function count_posts()
    {
        $this->db->where('id_tipo', 2);
        $this->db->where('estado', '1');
        return $this->db->count_all_results('publicacion');       
    }

    public function search_posts($keyword = "")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        if (empty($keyword)) {
            $this->db->where('id_tipo', 2);
            $this->db->where('estado', '1');
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 2 AND `estado` = 1 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC');
            return $query->result();
        }
    }

    public function search_pagination_posts($keyword="",  $offset, $pagesize, $category="")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        $category = trim($category);
        if (empty($keyword)) {
            if(!empty($category)){
                $this->db->where('id_categoria', $category);
            }
            $this->db->where('id_tipo', 2);
            $this->db->where('estado', '1');
            $this->db->limit($pagesize,$offset);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            if(!empty($category)){
                $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 2 AND `estado` = 1 AND `id_categoria` = '.$category.' AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC LIMIT '.$offset.','.$pagesize.'');
            }else{
                $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 2 AND `estado` = 1 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC LIMIT '.$offset.','.$pagesize.'');
            }
            return $query->result();
        }
    }

    public function count_search_posts($category="", $keyword="")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        $category = trim($category);
        if (empty($keyword)) {
            if(!empty($category)){
                $this->db->where('id_categoria', $category);
            }
            $this->db->where('id_tipo', 2);
            $this->db->where('estado', '1');
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->count_all_results('publicacion');
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            if(!empty($category)){
                $query = $this->db->query('SELECT COUNT(*) FROM publicacion WHERE `id_tipo` = 2 AND `estado` = 1 AND `id_categoria` = '.$category.' AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC');
            }else{
                $query = $this->db->query('SELECT COUNT(*) FROM publicacion WHERE `id_tipo` = 2 AND `estado` = 1 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC' );
            }
            $result = $query->row_array();
            return (int) $result['COUNT(*)'];
        }
    }

    public function pagination_posts($offset, $pagesize, $category)
    {
        $category = trim($category);
        if(!empty($category)){
            $this->db->where('id_categoria', $category);
        }
        $this->db->where('id_tipo', 2);
        $this->db->where('estado', '1');
        $this->db->order_by('fecha_ingreso', 'DESC');
        $this->db->limit($pagesize,$offset);
        return $this->db->get('publicacion')->result();
    }

    public function cargaServices()
    {
        $this->db->where('id_tipo', 1);
        $this->db->where('estado', '1');
        $this->db->order_by('fecha_ingreso', 'DESC');
        return $this->db->get('publicacion')->result();
    }

    public function search_services($keyword = "")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        if (empty($keyword)) {
            $this->db->where('id_tipo', 1);
            $this->db->order_by('estado', '1');
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 1 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC');
            return $query->result();
        }
    }

    public function findByCriteria($datos){
        try {
            $datos = trim($datos);
            if(!empty($datos)){
                $datos = urldecode($datos);
            }
        	$this->db->select('id_publicacion, titulo, texto_introduccion, recurso_av_1, fecha_ingreso');
			$this->db->like('titulo', $datos);
			$this->db->or_like('texto_introduccion', $datos);
			return $this->db->get('publicacion')->result();
						
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }

    // Los metodos para usar en blog
    public function cargaBlog($tipo = ""){
        $this->db->select('id_publicacion, titulo, texto_introduccion,recurso_av_1');
        $this->db->where('id_tipo', 2);
        $this->db->order_by('fecha_ingreso', 'DESC');
        $this->db->limit('10');
        return $this->db->get('publicacion')->result();
    }

    public function findBlogByCriteria($datos){
        try {
            $datos = trim($datos);
            if(!empty($datos)){
                $datos = urldecode($datos);
            }
            $this->db->select('id_publicacion, titulo, texto_introduccion');
            $this->db->where('id_tipo', 2);
			$this->db->like('titulo', $datos);
			$this->db->or_like('texto_introduccion', $datos);
			return $this->db->get('publicacion')->result();
						
        } catch (mysqli_sql_exception $e) {
            return 0;
        }
    }

    
    /** ---------------- TESTIMONIALS------------------------------- */

    public function get_all_testimonials($keyword = "")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        if (empty($keyword)) {
            $this->db->where('id_tipo', 3);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 3 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC');
            return $query->result();
        }
    }

    public function get_testimonials($keyword = "")
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        if (empty($keyword)) {
            $this->db->where('id_tipo', 3);
            $this->db->where('estado', '1');
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 3 AND `estado` = 1 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC');
            return $query->result();
        }
    }

    public function search_pagination_testimonials($keyword = "",  $offset, $pagesize)
    {
        $keyword = trim($keyword);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        if (empty($keyword)) {
            $this->db->where('id_tipo', 3);
            $this->db->where('estado', '1');
            $this->db->limit($pagesize,$offset);
            $this->db->order_by('fecha_ingreso', 'DESC');
            return $this->db->get('publicacion')->result();
        } else {
            $escape = "'%" . $keyword . "%' ESCAPE '!'";
            $query = $this->db->query('SELECT * FROM publicacion WHERE `id_tipo` = 3 AND `estado` = 1 AND ( `titulo` LIKE ' . $escape . ' OR `texto_introduccion` LIKE ' . $escape . ' OR `contenido` LIKE ' . $escape . ') ORDER BY `fecha_ingreso` DESC LIMIT '.$offset.','.$pagesize.'');
            return $query->result();
        }
    }

    public function pagination_testimonials($offset, $pagesize)
    {
        $this->db->where('id_tipo', 3);
        $this->db->where('estado', '1');
        $this->db->order_by('fecha_ingreso', 'DESC');
        $this->db->limit($pagesize,$offset);
        return $this->db->get('publicacion')->result();
    }

}
