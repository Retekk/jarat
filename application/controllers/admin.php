<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->_check_session();
  }
  
  public function index() {
    $data = array();
    $data['jaratok'] = $this->getJarat($this->input->get('jarat_nev'),$this->input->get('jarat_kerulet'));
    $data['jaratnev_select'] = $this->getJaratnevForSelect();
    $data['jaratker_select'] = $this->getKeruletForSelect();
    $data['beszallitok_select'] = $this->getBeszallitokForSelect();
    
    $this->load->view('templates/head');
    $this->load->view('templates/menu');
    $this->load->view('admin_site', $data);
    $this->load->view('templates/foot');
  }
  
  private function getBeszallitokForSelect() {
    $beszallitok = array();
    $this->db->select('b_id, b_nev');
    $this->db->from('beszall');
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      $beszallitok[] = array(
          'id' => $row['b_id'],
          'nev' => $row['b_nev']
      );
    }
    return $beszallitok;
  }
  
  private function getJaratnevForSelect() {
    $jaratok = array();
    $this->db->select('jarat_nev_egy, jarat_nev_ketto');
    $this->db->from('jarat');
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      if ($row['jarat_nev_egy'] != null ) {
        $jaratok[] = $row['jarat_nev_egy'];
      } else {
        $jaratok[] = $row['jarat_nev_ketto'];
      }
    }
    return $jaratok;
  }
  
  private function getKeruletForSelect() {
    $jaratok = array();
    $this->db->distinct();
    $this->db->select('kerulet');
    $this->db->from('jarat');
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      $jaratok[] = $row['kerulet'];
    }
    return $jaratok;
  }
  
  private function getJarat($nev, $kerulet) {
    $jaratok = array();
    $this->db->select('jarat_nev_egy, jarat_nev_ketto, kerulet');
    $this->db->from('jarat');
    if ($kerulet != null) {
      $this->db->like('kerulet', $kerulet);
    }
    if ($nev != null) {
      $this->db->like('jarat_nev_egy', $nev);
      $this->db->or_like('jarat_nev_ketto', $nev);
    }
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      $jaratok[] = array(
        'jarat_nev_egy' => $row['jarat_nev_egy'],
        'jarat_nev_ketto' => $row['jarat_nev_ketto'],
        'kerulet' => $row['kerulet']
      );
    }
    return $jaratok;
  }
  
  function logout() {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('ip_address');
    $this->session->sess_destroy();
    redirect('login');
  }
  
  private function _check_session() {
    $user = $this->session->userdata('user_id');
    if(!$user) {
      redirect('login');
    }
  }
  
}