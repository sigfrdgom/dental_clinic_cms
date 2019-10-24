<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadImage extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    parent::logueado();
  }

  public function index()
  {
    $this->load->view('UploadImage/ck_upload');
  }

}
