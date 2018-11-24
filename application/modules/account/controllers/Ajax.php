<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url_helper'));
        $this->load->library(array('form_validation','session'));
        $this->load->database();
		$this->load->model(array('Member_model'));
    }

    function index(){
		echo "access denied.";
    }
	
	function member_detail(){
		$m_id = (int)$this->input->post('m_id');
		$this->db->select('id,first_name,last_name,phone,address');
		$result = $this->db->get_where('users',array('id'=>$m_id,'active'=>1))->result_array();
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'member detail.','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'','status'=>500));
		}
	}
	
	function member_list(){
		$b_id = $this->input->post('b_id');
		
		$this->db->select('u.id,u.username');
		$this->db->join('users_groups ug','ug.user_id = u.id');
		if(in_array('admin',$this->session->userdata('groups'))){
		}
		else{
			$this->db->where('u.branch_id',$b_id);
		}
		$result = $this->db->get_where('users u',array('u.active'=>1,'ug.group_id'=>2))->result_array();
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'member list.','status'=>200));
		}
		else {
			echo json_encode(array('msg'=>'No record found.','status'=>500));
		}
	}
	
	function account_list($offset){
		$b_id = $this->input->post('b_id');
		$this->db->select('u.id,u.username,u.gender,u.phone,atm.ac_type,am.u_account_no,b.name bname');
		$this->db->join('account_type_master atm','atm.ac_code = am.ac_type_id');
		$this->db->join('users u','u.id = am.user_id');
		$this->db->join('users_groups ug','ug.user_id = u.id');
		$this->db->join('branch b','b.b_id = u.branch_id');
		if(in_array('admin',$this->session->userdata('groups'))){
			if($b_id != 0){
			$this->db->where('u.branch_id',$b_id);
			}
		}
		else{
			$this->db->where('u.branch_id',$b_id);
		}
		$this->db->limit(15,$offset);
		$result = $this->db->get_where('account_master am',array('ug.group_id' => 2))->result_array();
		
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'account list','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'No. record found.','status'=>500));
		}
	}
	
	function account_list_accno(){
		$b_id = $this->input->post('b_id');
		$accno = $this->input->post('accno');
		$this->db->select('u.id,u.username,u.gender,u.phone,atm.ac_type,am.u_account_no,b.name bname');
		$this->db->join('account_type_master atm','atm.ac_code = am.ac_type_id');
		$this->db->join('users u','u.id = am.user_id');
		$this->db->join('users_groups ug','ug.user_id = u.id');
		$this->db->join('branch b','b.b_id = u.branch_id');
		if(in_array('admin',$this->session->userdata('groups'))){
			if($b_id != 0){
			$this->db->where('u.branch_id',$b_id);
			}
		}
		else{
			$this->db->where('u.branch_id',$b_id);
		}
		$this->db->like('u_account_no',$accno,'both');
		$result = $this->db->get_where('account_master am',array('ug.group_id' => 2))->result_array();
		
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'account list','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'No. record found.','status'=>500));
		}
	}
}