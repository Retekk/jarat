<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
	$this->load->model('Rkk_user_model');
    $this->_check_session();
  }
  
  public function index() {
    $data = array();
	$filter = array();
	
	$filter['jarat_nev'] = $this->input->get('jarat_nev');
	$filter['kerulet'] = $this->input->get('jarat_kerulet');
	$filter['kezbesito'] =$this->input->get('kezbesito');
	
    $data['ujsagok'] = $this->getUjsag($this->input->get('kiadvany'),$this->input->get('from'),$this->input->get('to'));
    $data['ujsagJarat'] = $this->getUjsagJarat($filter);
    $data['jaratnev_select'] = $this->getJaratnevForSelect();
    $data['jaratker_select'] = $this->getKeruletForSelect();
    $data['beszallitok_select'] = $this->getBeszallitokForSelect();
    $data['kezbesitok_select'] = $this->Rkk_user_model->get_rkk_user_by_perm('2');
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
  
  private function getUjsagJarat($filter){
	$sql = "SELECT `rkk_users`.*, `jarat`.*, `ujsag`.*, `ujsag_jarat`.`db` as `u_db` 
			FROM `ujsag_jarat` 
			JOIN `jarat` ON `jarat`.`id` = `ujsag_jarat`.`j_id` 
			JOIN `ujsag` ON `ujsag`.`id` = `ujsag_jarat`.`u_id`
			JOIN `rkk_users` ON `rkk_users`.`user_id` = `ujsag_jarat`.`usr_id`";
	
	$first_filter = true;
	if($filter['jarat_nev']){
		$sql .= ($first_filter ? "WHERE" : "AND");
		$sql .= "(`jarat`.`jarat_nev_egy` LIKE '".$filter['jarat_nev']."' OR "."`jarat`.`jarat_nev_ketto` LIKE '".$filter['jarat_nev']."')";
		$first_filter = false;
	}
	if($filter['kerulet']){
		$sql .= ($first_filter ? "WHERE" : "AND");
		$sql .= "`jarat`.`kerulet` LIKE '".$filter['kerulet']."'";
		$first_filter = false;
	}
	if($filter['kezbesito']){
		$sql .= ($first_filter ? "WHERE" : "AND");
		$sql .= "`ujsag_jarat`.`usr_id` = '".$filter['kezbesito']."'";
		$first_filter = false;
	}
	//var_dump($sql);
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