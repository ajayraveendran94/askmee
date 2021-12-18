<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function save_user($data)
    {
        return $this->db->insert('as_user',$data);
        
    }

    public function update_user($where,$data) 
    {
        $this->db->update('as_user',$data,$where);
        return $this->db->affected_rows();
    }

    public function check_user($email, $user_type)
    {
        $this->db->reset_query();
        $this->db->where(array('email' => $email, 'user_type' => $user_type));
        $result = $this->db->get('as_user');
        if($result->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function check_user_mob($mobile)
    {
        $this->db->reset_query();
        $this->db->where(array('mobile_number' => $mobile));
        $result = $this->db->get('as_user');
        if($result->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function check_user_email($email)
    {
        $this->db->reset_query();
        $this->db->where(array('email' => $email));
        $result = $this->db->get('as_user');
        if($result->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_users()
    {
        $this->db->reset_query();
        $this->db->where('as_user.user_type', 'U');
        $query = $this->db->get('as_user')->result_array();
        return $query;
    }
    
    public function get_vendors()
    {
        $this->db->reset_query();
        $this->db->where('as_user.user_type', 'V');
        $query = $this->db->get('as_user')->result_array();
        return $query;
    }

    public function get_user_data($id)
    {
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_user');
        $this->db->where('as_user.user_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function update_user_data($data, $id)
    {
        $this->db->reset_query();
        $this->db->update('as_user', $data, array('user_id' => $id));
    }

    public function update_user_status($id, $value)
    {
        $this->db->reset_query();
        $data =  array(
            'user_status' => $value
        );
        $this->db->update('as_user', $data, array('user_id' => $id));
    }

    public function login($data)
	{
		$query = $this->db->get_where('as_user', array('email' => $data['email']));
		if ($query->num_rows() == 0){
            //$this->db->delete('as_user', array('user_id' => 1));
			return false;
		}
		else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
		        return $result = $query->row_array();
		    }
			
		}
	}
}