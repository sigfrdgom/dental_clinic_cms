<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('PublicacionModel');
    }

    public function index($id = ""){ 
        if(!empty(trim($id))){
            echo json_encode($this->PublicacionModel->get_posts($id));
        }else{
            echo json_encode($this->PublicacionModel->get_posts());
        }
    }

    public function recent_posts(){ 
        echo json_encode($this->PublicacionModel->get_recent_posts());
    }

    public function search_posts($keyword = ""){ 
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        echo json_encode($this->PublicacionModel->search_posts($keyword));
    }

    public function search_pagination_posts($offset = 0, $pagesize = 5 , $category="", $keyword = "" ){ 
        if($category == "any"){
            $category = "";
        }
        $category = trim($category);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        echo json_encode($this->PublicacionModel->search_pagination_posts($keyword, $offset, $pagesize, $category));
    }

    public function count_search_posts($category="", $keyword=""){
        if($category == "any"){
            $category = "";
        }
        $category = trim($category);
        $keyword = trim($keyword);
        echo json_encode($this->PublicacionModel->count_search_posts($category, $keyword));
    }

    public function pagination_posts( $offset = 0, $pagesize = 5, $category=""){ 
        echo json_encode($this->PublicacionModel->pagination_posts($offset,$pagesize, $category));
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function find($id = "")
    {
        echo json_encode((array)$this->PublicacionModel->findById($id));
    }

    public function count_posts(){
        echo json_encode($this->PublicacionModel->count_posts());
    }

    public function findByCriteria(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			echo json_encode($this->PublicacionModel->cargaBlog());
        }else{
            echo json_encode($this->PublicacionModel->findBlogByCriteria($this->input->post("busqueda", TRUE)));
        }
		
    }
    
}
