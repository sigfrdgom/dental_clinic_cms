<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('templates/header');
		$this->load->view('aboutUs/aboutUs');
		$this->load->view('templates/footer');
  }

}
