<?php
 
class Rkk_user extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rkk_user_model');
		$this->load->model('User_perm_model');
		$this->_check_session();
    } 

    /*
     * Listing of rkk_users
     */
    function index()
    {
        $data['rkk_users'] = $this->Rkk_user_model->get_all_rkk_users();
		$data['user_perm'] = $this->session->userdata('user_perm');
		$data['user_id'] = $this->session->userdata('user_id');
		       
        $data['_view'] = 'rkk_user/index';
		$this->load->view('templates/head');
		$this->load->view('templates/menu', $data);
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
				'user_pass' => password_hash($this->input->post('user_pass'), PASSWORD_BCRYPT),
				'user_email' => $this->input->post('user_email'),
				'fk_user_perm' => $this->input->post('user_perm'),
            );
            
            $rkk_user_id = $this->Rkk_user_model->add_rkk_user($params);
			$msg = "Belépés az oldalra: ".$config['base_url']."\nJelszó: ".$params['user_pass'];
			mail($params['user_email'],"Belépés",$msg);
			
            redirect('rkk_user/index');
        }
        else
        {            
            $data['_view'] = 'rkk_user/add';
			$data['user_perms'] = $this->User_perm_model->get_all_user_perms();
			$data['user_perm'] = $this->session->userdata('user_perm');
            $this->load->view('templates/head');
			$this->load->view('templates/menu', $data);
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
					'user_email' => $this->input->post('user_email'),
					'fk_user_perm' => $this->input->post('user_perm'),
                );

                $this->Rkk_user_model->update_rkk_user($user_id,$params);            
                redirect('rkk_user/index');
            }
            else
            {
				$data['user_perms'] = $this->User_perm_model->get_all_user_perms();
				$data['user_perm'] = $this->session->userdata('user_perm');
                $data['_view'] = 'rkk_user/edit';
                $this->load->view('templates/head');
				$this->load->view('templates/menu', $data);
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
	
	function checkmail(){
		$email = $this->input->post('user_email');
		$rkk_user = $this->Rkk_user_model->get_rkk_user_by_mail($email);
		if($rkk_user != ""){
			echo('EMAIL_EXISTS');
		}
	}
	
	function checkuser(){
		$name = $this->input->post('user_name');
		$rkk_user = $this->Rkk_user_model->get_rkk_user_by_name($name);
		if($rkk_user != ""){
			echo('USER_EXISTS');
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