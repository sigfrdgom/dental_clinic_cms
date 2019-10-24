<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import the libraries
require_once APPPATH. 'libraries/REST_Controller.php';
require_once APPPATH. 'libraries/Format.php';

class Blog extends REST_Controller
{

    public function __construct()
    {
        //HACER USO DE LO METODO CONSTRUCTORE DEL PADRE 
        parent::__construct();
        //METODO CARGADO EN EL MODELO
		$this->load->model('PublicacionModel');
    }

    public function index_get($id = ""){ 
        if(!empty(trim($id))){
            $this->response($this->PublicacionModel->get_posts($id), 200);
        }else{
            $this->response($this->PublicacionModel->get_posts(), 200);
        }
    }

    public function recent_posts_get(){ 
        $this->response($this->PublicacionModel->get_recent_posts(), 200);
    }

    public function search_posts_get($keyword = ""){ 
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        $this->response($this->PublicacionModel->search_posts($keyword), 200);
    }

    public function search_pagination_posts_get($offset = 0, $pagesize = 5 , $category="", $keyword = "" ){ 
        if($category == "any"){
            $category = "";
        }
        $category = trim($category);
        if(!empty($keyword)){
            $keyword=urldecode($keyword);
        }
        $this->response($this->PublicacionModel->search_pagination_posts($keyword, $offset, $pagesize, $category), 200);
    }

    public function count_search_posts_get($category="", $keyword=""){
        if($category == "any"){
            $category = "";
        }
        $category = trim($category);
        $keyword = trim($keyword);
        $this->response($this->PublicacionModel->count_search_posts($category, $keyword), 200);
    }

    public function pagination_posts_get( $offset = 0, $pagesize = 5, $category=""){ 
        $this->response($this->PublicacionModel->pagination_posts($offset,$pagesize, $category), 200);
    }

    //METODO CON EL QUE OBTENDRIA EL REGISTRO CATEGORIA
    public function find_get($id = "")
    {
        $this->response((array)$this->PublicacionModel->findById($id), 200);
    }

    public function count_posts_get(){
        $this->response($this->PublicacionModel->count_posts());
    }

    public function findByCriteria_get(){ 
		if($this->input->post("busqueda", TRUE) == null || $this->input->post("busqueda", TRUE)== ""){
			$this->response($this->PublicacionModel->cargaBlog(), 200);
        }else{
            $this->response($this->PublicacionModel->findBlogByCriteria($this->input->post("busqueda", TRUE)), 200);
        }
    }
    
}
