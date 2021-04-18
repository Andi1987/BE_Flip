<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flip_model extends CI_Model
{

   public function __construct() {
        parent::__construct();
    }

	
	public function insert_data($table, $data){
	   $this->db->insert($table, $data);
	}
	
	public function get_data($url) {
		$this->db->select('*');
		$this->db->where('id', $url);
		return $this->db->get('disburse')->row();
        
    }
	
	public function update_disburse($data, $id) {
        if ($id != null) {
            $this->db->where('id', $id);
        }else{
			echo 'ID Transaction not exist';
        }

        $this->db->update('disburse', $data);
    }
	
}