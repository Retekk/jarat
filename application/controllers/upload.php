<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->_check_session();
    $this->load->library('excel');
    $this->load->model('excel_data_insert_model');
  }
  
  public function index() {
    
      //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
      $configUpload['upload_path'] = FCPATH.'\assets\uploads\excel\\';
      $configUpload['allowed_types'] = 'xls|xlsx|csv';
      
      $configUpload['max_size'] = '5000';
      $this->load->library('upload', $configUpload);
      $this->upload->do_upload('xls');
      
      $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
      $file_name = $upload_data['file_name']; //uploded file name
      $extension=$upload_data['file_ext'];    // uploded file extension
		
      $objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
      //$objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
      //Set to read only
      $objReader->setReadDataOnly(true);
      //Load excel file
      try {
        $objPHPExcel=$objReader->load(FCPATH.'assets\uploads\excel\\'.$file_name);
      } catch (Exception $ex) {
        $objReader= PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel=$objReader->load(FCPATH.'assets\uploads\excel\\'.$file_name);
      }
      $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
      $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
      //loop from first data untill last data
      $palya = "";
      $beszallito = $this->input->post('beszall');
      for($i=2;$i<=$totalrows;$i++)
      {
        if($palya != $objWorksheet->getCellByColumnAndRow(0,$i)->getValue()) {
          $palya = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
          $this->db->select('id');
          $this->db->from('jarat');
          $this->db->where('jarat_nev_egy', $palya);
          $this->db->or_where('jarat_nev_ketto', $palya);
          $this->db->limit(1); 
          $query = $this->db->get();
          foreach ($query->result() as $row)
          {
                  $palya_id = $row->id;
          }
        }
        $kiadvany = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
        $gyujto = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
        $telj_kez_elo = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
        $telj_kez = PHPExcel_Style_NumberFormat::toFormattedString($telj_kez_elo, 'YYYY-MM-DD');
        $telj_veg_elo = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
        $telj_veg = PHPExcel_Style_NumberFormat::toFormattedString($telj_veg_elo, 'YYYY-MM-DD');
        $suly = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
        $darab = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
        
        $ujsag_data = array(
          'beszalito' => $beszallito,
          'kiadvany' => $kiadvany,
          'gyujto' => $gyujto,
          'telj_kezd' => $telj_kez,
          'telj_veg' => $telj_veg,
          'suly' => $suly
        );
        $this->db->insert('ujsag', $ujsag_data);
        $ujsag_insert_id = $this->db->insert_id();
        
        $kapcs_data = array(
          'u_id' => $palya_id,  
          'j_id' => $ujsag_insert_id,
          'db' => $darab
        );
        $this->db->insert('ujsag_jarat', $kapcs_data);
      }
      //unlink('././assets/uploads/excel/'.$file_name); //File Deleted After uploading in database .	
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
