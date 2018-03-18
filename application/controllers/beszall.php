<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class beszall extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->_check_session();
    $this->load->database();
    $this->load->helper('url');
    $this->load->library('grocery_CRUD'); 
  }
  
  public function index() {
    $crud = new grocery_CRUD();
    $crud->set_table('beszall');
    $crud->columns('b_nev')->display_as('b_nev','Név');
    $output = $crud->render();
	$data = array();
    $data['user_perm'] = $this->session->userdata('user_perm');
    $this->load->view('templates/head', $output);
    $this->load->view('templates/menu', $data);
    $this->load->view('beszallitok', $output);
    $this->load->view('templates/foot');
  }
  
  function logout() {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('ip_address');
    $this->session->sess_destroy();
    redirect('login');
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