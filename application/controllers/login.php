<?php

class Login extends CI_Controller {
  
  var $data = array();
  
  public function __construct() {
    parent::__construct();
    $this->_check_session();
  }
  
  public function index() {
    $validation = array(
        array('field' => 'username', 'rules' => 'required'),
        array('field' => 'password', 'rules' => 'required')
    );
    
    $this->form_validation->set_rules($validation);
    
    if($this->form_validation->run() == true) {
      
      $user_post = $this->input->post('username');
      $pass_post = $this->input->post('password');
      
      if($this->_resolve_user_login($user_post, $pass_post)) {
        $user_ID = $this->_get_user_ID_from_username($user_post);
        $ip_address = $this->input->ip_address();
        
        $create_session = array(
            'user_id' => $user_ID,
            'ip_address' => $ip_address
        );
        $this->session->set_userdata($create_session);
        redirect('admin');
      }
      
    }
    
    $this->data = array(
        'title' => 'Belépés'
    );
    $this->load->view('templates/head', $this->data);
    $this->load->view('login_form', $this->data);
    $this->load->view('templates/foot', $this->data);
  }
  
  private function _resolve_user_login($username, $password) {
    $this->db->where('user_name', $username);
    $hash = $this->db->get('rkk_users')->row('user_pass');
    return $this->_verify_password_hash($password, $hash);
  }
  
  private function _get_user_ID_from_username($username) {
    $this->db->select('user_id');
    $this->db->from('rkk_users');
    $this->db->where('user_name', $username);
    return $this->db->get()->row('user_id');
  }
  
  private function _verify_password_hash($pass, $hash) {
    return password_verify($pass, $hash);
  }
  
  private function _check_session() {
    $user = $this->session->userdata('user_id');
    if($user) {
      redirect('admin');
    }
  }
  
}