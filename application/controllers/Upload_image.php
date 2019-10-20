<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_image extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    parent::logueado();
  }

  public function index()
  {
    $this->load->view('upload_image/ck_upload');
  }

}
