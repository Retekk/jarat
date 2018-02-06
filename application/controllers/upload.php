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
      $ujsagok = array();
      $u_index = 0;
      $pre_ujsag = '';
      for($i=2;$i<=$totalrows;$i++)
      {
        $UjsagNev= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
        $Terjeszt= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
        $Email= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
        $Mobile=$objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
        
        echo $UjsagNev;
        /*
        $Address=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
        $data_user=array('FirstName'=>$FirstName, 'LastName'=>$LastName ,'Email'=>$Email ,'Mobile'=>$Mobile , 'Address'=>$Address);
        $this->excel_data_insert_model->Add_User($data_user);*/
          			  
      }
      unlink('././assets/uploads/excel/'.$file_name); //File Deleted After uploading in database .			 
      //redirect(base_url() . "index.php/success_upload");
    
    
  }
  
  private function _check_session() {
    $user = $this->session->userdata('user_id');
    if(!$user) {
      redirect('login');
    }
  }
  
}
