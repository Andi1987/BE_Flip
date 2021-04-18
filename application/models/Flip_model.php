<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flip_model extends CI_Model
{

   public function __construct() {
        parent::__construct();
    }

	
	public function insert_data($table, $data){
	   $this->db->insert($table, $data);
	   //return $q;
	}
	
	public function add_data($table, $data) {
        return $this->db->insert($table, $data);
    }
	
	public function update_user_data($data, $id_customer = null, $email = null, $access_token = null) {
        if ($id_customer != null) {
            $this->db->where('id_customer', $id_customer);
        } elseif ($email != null) {
            $this->db->where('email', $email);
        } elseif ($access_token != null) {
            $this->db->where('access_token', $access_token);
        }

        $this->db->update('users', $data);
    }
	
}