<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
	
	function user_list(){
		$this->db->select('*');
		$result = $this->db->get_where('users',array('active'=>1))->result_array();
		return $result;
	}
	
	function create_user($data){
		if(in_array('admin',$this->session->userdata('groups'))){
			$val['active'] = 1;
		}
		else{
			$val['active'] = 0;
		}
		$val['username'] = $data['member_first_name'].$data['member_last_name'];
		$val['gender'] = $data['member_gender'];
		$val['password'] = '';
		$val['email'] = $data['member_mail'];
		$val['created_on'] = time();
		$val['first_name'] = $data['member_first_name'];
		$val['last_name'] = $data['member_last_name'];
		$val['branch_id'] = $data['member_branch'];
		$val['phone'] = $data['member_f_h_contactno'];
		$val['dob'] = $data['member_dob'];
		$val['cast'] = $data['member_cast'];
		$val['nominee'] = $data['member_nominee_name'];
		$val['nominee_relation'] = $data['member_nominee_relation'];
		$val['nominee_age'] = $data['member_nominee_age'];
		$val['nominee_joined'] = $data['memeber_is_member'];
		$val['father_husband'] = $data['member_f_h'];
		$val['father_husband_name'] = $data['member_f_h_name'];
		$val['work_type'] = $data['member_business'];
		$val['work_address'] = $data['member_business_address'];
		$val['work_contact'] = $data['member_business_contactno'];
		$val['ip_address'] = $data['ip'];
		
		$this->db->trans_begin();
		$this->db->insert('users',$val);
		$member_id = $this->db->insert_id();
		
		///create on usergroup table
		$this->db->insert('users_groups',array('user_id'=>$member_id,'group_id'=>2));
		
		///open Janmit Common account for new created user
		$this->db->select('count(*)+1 as count');
		$max_id = $this->db->get_where('account_master',array('branch_id'=>$data['member_branch'],'account_type'=>'01','status'=>1))->result_array();

		$accoun_counter = str_pad($max_id[0]['count'], 6, "0", STR_PAD_LEFT);
		$user_id = str_pad($member_id, 4, "0", STR_PAD_LEFT);
		$branch_id = str_pad($data['member_branch'], 2, "0", STR_PAD_LEFT);
		
		$acc['user_id'] = $member_id;
		$acc['branch_id'] = $data['member_branch'];
		$acc['account_type'] = '01';
		$acc['u_account_id'] = $acc['account_type'].$branch_id.$user_id.$accoun_counter;
		$acc['created_at'] = date('Y-m-d h:i:s');
		$acc['created_by'] = $this->session->userdata('user_id');
		$acc['amount'] = '100';
		$acc['status'] = 1;
		$this->db->insert('account_master',$acc);
		
		//add record into transection table
		$trans['account_no'] = $acc['u_account_id'];
		$trans['detail'] = 'Account open / non refundable';
		$trans['mode'] = 'cash';
		$trans['crdr_mode'] = 'credit';
		$trans['amount'] = '100';
		$trans['created_at'] = date('Y-m-d h:i:s');
		$trans['created_by'] = $this->session->userdata('user_id');
		$trans['branch_id'] = $data['member_branch'];
		$this->db->insert('transactions',$trans);
			
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}
		else{
			$this->db->trans_commit();
			return $member_id;
		}
	}
	
	function get_user_branch(){
		$u_id = $this->session->userdata('user_id');
		$this->db->select('branch_id');
		$result = $this->db->get_where('users',array('id'=>$u_id,'active'=>1))->result_array();
		return $result[0]['branch_id'];
	}	
}
