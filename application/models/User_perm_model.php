<?php

class User_perm_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_user_perm($perm_id)
    {
        return $this->db->get_where('user_perms',array('id'=>$perm_id))->row_array();
    }
        
    function get_all_user_perms()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get('user_perms')->result_array();
    }
}