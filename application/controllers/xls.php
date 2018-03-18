<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Xls extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->_check_session();
  }
  
  public function index() {
    
    $this->db->select('b_nev');
    $this->db->from('beszall');
    $query = $this->db->get();
    $data['beszallitok'] = array();
    foreach ($query->result() as $row)
    {
      $data['beszallitok'][] = $row->b_nev;
    }
    $data['user_perm'] = $this->session->userdata('user_perm');
    
    $this->load->view('templates/head');
    $this->load->view('templates/menu', $data);
    $this->load->view('xls_site', $data);
    $this->load->view('templates/foot');
  }
  
  public function upload() {
    
    $validation = array(
        array('field' => 'xls', 'rules' => 'required')
    );
    
    $this->form_validation->set_rules($validation);
	$data['user_perm'] = $this->session->userdata('user_perm');
    
    if($this->form_validation->run() == true) {
      
      $file = $this->input->post('xls');
      
      $this->load->view('templates/head');
      $this->load->view('templates/menu', $data);
      $this->load->view('success_upload');
      $this->load->view('templates/foot');
      
    }
    
  }
  
  private function _check_session() {
    $user = $this->session->userdata('user_id');
	$user_perm = $this->session->userdata('user_perm');
    if(!$user) {
      redirect('login');  
    }
	if($user_perm != "1"){
		redirect('not_authorized');
	}
  }
  
}
