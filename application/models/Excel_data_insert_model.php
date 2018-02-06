<?php

class Excel_data_insert_model extends CI_Model {
  public function  __construct() {
        parent::__construct();
    }
	
  public function Add_jarat($data_jarat){
    $this->db->insert('jarat', $data_jarat);
   }
}
