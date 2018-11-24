<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
 
class Account extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url_helper'));
        $this->load->library(array('form_validation','session','upload'));
        $this->load->database();
		$this->load->model(array('Member_model','branch/Branch_model'));
    }

    function index(){
		if(!in_array('admin',$this->session->userdata('groups'))){
			$b_id = (int)$this->Member_model->get_user_branch();
			$data['branches'] = $this->Branch_model->branch_list();
			foreach($data['branches'] as $key => $value){
				if($value['b_id'] == $b_id){
					continue;
				}
				else{
					unset($data['branches'][$key]);
				}
			}
		}
		else{
			$data['branches'] = $this->Branch_model->branch_list(); 
		}
		$data['header'] = $this->load->view('template/header','',true);
		$data['topnav'] = $this->load->view('template/topbarnav','',true);
		$data['sidenav'] = $this->load->view('template/sidenav','',true);
		$data['main_body'] = $this->load->view('index',$data,true);
		$data['footer'] = $this->load->view('template/footer',$data,true);
        $this->load->view('template/index',$data);
    }
	
	function new_account(){
		$data['branches'] = $this->Branch_model->branch_list();
		$data['header'] = $this->load->view('template/header','',true);
		$data['topnav'] = $this->load->view('template/topbarnav','',true);
		$data['sidenav'] = $this->load->view('template/sidenav','',true);
		$data['main_body'] = $this->load->view('add_account',$data,true);
		$data['footer'] = $this->load->view('template/footer',$data,true);
        $this->load->view('template/index',$data);
	}
	
	function open_account(){
		$data['u_id'] = $this->input->post('account_members');
		$data['ac_type_id'] = $this->input->post('account_type');
		$data['branch_id'] = $this->input->post('account_branch');
		$data['amount'] = $this->input->post('account_amount');
		
		if($data['ac_type_id'] == 55){
			$this->db->select('*');
			$result = $this->db->get_where('account_master',array('user_id'=>$data['u_id'],'status'=>1))->result_array();
			if(count($result)>0){
				echo json_encode(array('msg'=>'User already have a account.','status'=>500));
				die;
			}
		}
		$this->db->trans_begin();
		///open Account
		$this->db->select('count(*)+1 as count');
		$max_id = $this->db->get_where('account_master',array('branch_id'=>$data['branch_id'],'ac_type_id'=>$data['ac_type_id'],'status'=>1))->result_array();
		
		$accoun_counter = str_pad($max_id[0]['count'], 6, "0", STR_PAD_LEFT);
		$user_id = str_pad($data['u_id'], 4, "0", STR_PAD_LEFT);
		$branch_id = str_pad($data['branch_id'], 2, "0", STR_PAD_LEFT);
		
		$u_account_id = $data['ac_type_id'].$branch_id.$user_id.$accoun_counter;
		//account master
		$this->db->insert('account_master',array(
			'user_id' => $data['u_id'],
			'branch_id' => $data['branch_id'],
			'ac_type_id' => $data['ac_type_id'],
			'u_account_no' => $u_account_id,
			'created_at' => date('Y-m-d h:i:s'),
			'created_by' => $this->session->userdata('user_id'),
			'amount' => $data['amount'],
			'status' => 1
		));
		
		//add record into transection table
		$trans['account_no'] = $u_account_id;
		$trans['detail'] = 'Account open';
		$trans['mode'] = 'cash';
		$trans['crdr_mode'] = 'credit';
		$trans['amount'] = $data['amount'];
		$trans['created_at'] = date('Y-m-d h:i:s');
		$trans['created_by'] = $this->session->userdata('user_id');
		$trans['branch_id'] = $data['branch_id'];
		$this->db->insert('transactions',$trans);
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}
		else{
			$this->db->trans_commit();
			echo json_encode(array('data'=>$u_account_id,'msg'=>'Account created successfully.','status'=>200));
		}
	}
}