<?php
 
class Rkk_user extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rkk_user_model');
		$this->_check_session();
    } 

    /*
     * Listing of rkk_users
     */
    function index()
    {
        $data['rkk_users'] = $this->Rkk_user_model->get_all_rkk_users();
        
        $data['_view'] = 'rkk_user/index';
		$this->load->view('templates/head');
        $this->load->view('rkk_user/index',$data);
		$this->load->view('templates/foot');
    }

    /*
     * Adding a new rkk_user
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('user_perm','User Perm','integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'user_name' => $this->input->post('user_name'),
				'user_pass' => $this->input->post('user_pass'),
				'user_perm' => $this->input->post('user_perm'),
            );
            
            $rkk_user_id = $this->Rkk_user_model->add_rkk_user($params);
            redirect('rkk_user/index');
        }
        else
        {            
            $data['_view'] = 'rkk_user/add';
            $this->load->view('templates/head');
			$this->load->view('rkk_user/add',$data);
			$this->load->view('templates/foot');
        }
    }  

    /*
     * Editing a rkk_user
     */
    function edit($user_id)
    {   
        // check if the rkk_user exists before trying to edit it
        $data['rkk_user'] = $this->Rkk_user_model->get_rkk_user($user_id);
        
        if(isset($data['rkk_user']['user_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('user_perm','User Perm','integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'user_name' => $this->input->post('user_name'),
					'user_pass' => $this->input->post('user_pass'),
					'user_perm' => $this->input->post('user_perm'),
                );

                $this->Rkk_user_model->update_rkk_user($user_id,$params);            
                redirect('rkk_user/index');
            }
            else
            {
                $data['_view'] = 'rkk_user/edit';
                $this->load->view('templates/head');
				$this->load->view('rkk_user/edit',$data);
				$this->load->view('templates/foot');
            }
        }
        else
            show_error('The rkk_user you are trying to edit does not exist.');
    } 

    /*
     * Deleting rkk_user
     */
    function remove($user_id)
    {
        $rkk_user = $this->Rkk_user_model->get_rkk_user($user_id);

        // check if the rkk_user exists before trying to delete it
        if(isset($rkk_user['user_id']))
        {
            $this->Rkk_user_model->delete_rkk_user($user_id);
            redirect('rkk_user/index');
        }
        else
            show_error('The rkk_user you are trying to delete does not exist.');
    }
	
	private function _check_session() {
    $user = $this->session->userdata('user_id');
    if(!$user) {
      redirect('login');
    }
  }
    
}