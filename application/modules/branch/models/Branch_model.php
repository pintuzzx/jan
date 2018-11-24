<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {
	
	function branch_list(){
		$this->db->select('*');
		$result = $this->db->get_where('branch',array('status'=>1))->result_array();
		return $result;
	}
	
	function create_branch($data){
		$result = $this->db->insert('branch',$data);
		if($result)
			return true;
		else
			return false;
	}
	
	function update_branch($data){
		$val = array('name'=>$data['name'],
					'address'=>$data['address'],
					'contact_no'=>$data['contact_no'],
					'update_at'=>$data['update_at'],
					'updated_by'=>$data['updated_by']
				); 
		$this->db->where('b_id',$data['b_id']);
		if($this->db->update('branch',$val))
			return true;
		else
			return false;
	}
	
	function branch_delete($b_id){
		$this->db->where('b_id',$b_id);
		if($this->db->update('branch',array('status'=>0)))
			return true;
		else
			return false;
	}
}
