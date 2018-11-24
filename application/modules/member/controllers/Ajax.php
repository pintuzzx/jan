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
	
	function member_list(){
		$u_id = $this->session->userdata('user_id');
		if(in_array('admin',$this->session->userdata('groups'))){
			$this->db->select('*');
		}
		else{
			$b_id = (int)$this->Member_model->get_user_branch();
			$this->db->select('*');
			$this->db->where('branch_id',$b_id);
		}
		$result = $this->db->get_where('users',array('active'=>1))->result_array();
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'member list','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'','status'=>500));
		}
	}
	
	function member_list_filter(){
		$b_id = (int)$this->input->post('b_id');
		
		if(in_array('admin',$this->session->userdata('groups'))){
			$this->db->select('*');
			if($b_id != 0){
				$this->db->where('branch_id',$b_id);
			}
		}
		else{
			$this->db->select('*');
			$this->db->where('branch_id',$b_id);
		}
		$result = $this->db->get_where('users',array('active'=>1))->result_array();
		
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'member list','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'','status'=>500));
		}
	}
}