<?php

class Rkk_user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get rkk_user by user_id
     */
    function get_rkk_user($user_id)
    {
        return $this->db->get_where('rkk_users',array('user_id'=>$user_id))->row_array();
    }
        
    /*
     * Get all rkk_users
     */
    function get_all_rkk_users()
    {
        $this->db->order_by('user_id', 'desc');
        return $this->db->get('rkk_users')->result_array();
    }
        
    /*
     * function to add new rkk_user
     */
    function add_rkk_user($params)
    {
        $this->db->insert('rkk_users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update rkk_user
     */
    function update_rkk_user($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->update('rkk_users',$params);
    }
    
    /*
     * function to delete rkk_user
     */
    function delete_rkk_user($user_id)
    {
        return $this->db->delete('rkk_users',array('user_id'=>$user_id));
    }
}