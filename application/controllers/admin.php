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
    $data['ujsagok'] = $this->getUjsag($this->input->get('kiadvany'),$this->input->get('from'),$this->input->get('to'));
    $data['ujsagJarat'] = $this->getUjsagJarat(/*$data['ujsagok'],$data['jaratok']*/);
    $data['jaratnev_select'] = $this->getJaratnevForSelect();
    $data['jaratker_select'] = $this->getKeruletForSelect();
    $data['beszallitok_select'] = $this->getBeszallitokForSelect();
    $data['kezbesitok_select'] = $this->getKezbesitokForSelect();
    $data['kiadvanynev_select'] = $this->getKiadvanyNevForSelect();
    $data['user_perm'] = $this->session->userdata('user_perm');
            
    $this->load->view('templates/head');
    $this->load->view('templates/menu', $data);
    $this->load->view('admin_site', $data);
    $this->load->view('templates/foot');
  }
  
  private function getKiadvanyNevForSelect() {
    $kiadvanyok = array();
    $this->db->select('kiadvany');
    $this->db->from('ujsag');
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      if(!in_array($row['kiadvany'], $kiadvanyok)){
        $kiadvanyok[] = array(
            'nev' => $row['kiadvany']
        );
      }
    }
    return $kiadvanyok;
  }
  
  private function getKezbesitokForSelect() {
    $kezbesitok = array();
    $this->db->select('sz_id, sz_nev');
    $this->db->from('kiszall');
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      $kezbesitok[] = array(
          'id' => $row['sz_id'],
          'nev' => $row['sz_nev']
      );
    }
    return $kezbesitok;
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
    $this->db->select('id, jarat_nev_egy, jarat_nev_ketto, kerulet');
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
        'id' => $row['id'],
        'jarat_nev_egy' => $row['jarat_nev_egy'],
        'jarat_nev_ketto' => $row['jarat_nev_ketto'],
        'kerulet' => $row['kerulet']
      );
    }
    return $jaratok;
  }
  
  private function getUjsag($nev, $from, $to) {
    $ujsagok = array();
    $this->db->select('id, beszalito, kiadvany, gyujto, suly');
    $this->db->from('ujsag');
    /*$day = date('N');
    if ($from == null) {
      $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
    }
    if ($to == null) {
      $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));
    }*/
    $this->db->like('kiadvany', $nev);
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      $ujsagok[] = array(
        'id' => $row['id'],
        'beszalito' => $row['beszalito'],
        'kiadvany' => $row['kiadvany'],
        'gyujto' => $row['gyujto'],
        'suly' => $row['suly'],
      );
    }
    return $ujsagok;
  }
  
  /*private function getUjsagJarat($ujsagok, $jaratok) {
    $ujsagJarat = array();
    $ujsagId = array();
    $jaratId = array();
    foreach($ujsagok as $key => $value) {
      $ujsagId[] = $value['id'];
    }
    foreach($jaratok as $key => $value) {
      $jaratId[] = $value['id'];
    }
    $this->db->select('u_id, j_id, db');
    $this->db->from('ujsag_jarat');
    $this->db->where_in('u_id', $ujsagId);
    $this->db->where_in('j_id', $jaratId);
    
    $query = $this->db->get();
    foreach ($query->result_array() as $row)
    {
      $ujsagJarat[$row['u_id']][$row['j_id']] = $row['db'];
    }
    return $ujsagJarat;
  }*/
  
  private function getUjsagJarat(){
	$sql = "SELECT `jarat`.*, `ujsag`.*, `ujsag_jarat`.`db` as `u_db` FROM `ujsag_jarat` JOIN `jarat` ON `jarat`.`id` = `ujsag_jarat`.`j_id` JOIN `ujsag` ON `ujsag`.`id` = `ujsag_jarat`.`u_id`";
	$result = $this->db->query($sql)->result_array();


	return $result;
  }
  
  function logout() {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('user_perm');
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