<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Xls extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->_check_session();
  }
  
  public function index() {
    $this->load->view('templates/head');
    $this->load->view('xls_site');
    $this->load->view('templates/foot');
  }
  
  public function upload() {
    
    $validation = array(
        array('field' => 'xls', 'rules' => 'required')
    );
    
    $this->form_validation->set_rules($validation);
    
    if($this->form_validation->run() == true) {
      
      $file = $this->input->post('xls');
      
      $this->load->view('templates/head');
      $this->load->view('success_upload');
      $this->load->view('templates/foot');
      
    }
    
  }
  
  private function _check_session() {
    $user = $this->session->userdata('user_id');
    if(!$user) {
      redirect('login');
    }
  }
  
}
