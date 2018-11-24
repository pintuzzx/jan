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
		$this->load->model('Branch_model');
    }

    function index(){
		echo "access denied.";
    }
	function branch_list(){
		$result = $this->Branch_model->branch_list();
		if(count($result)>0){
			echo json_encode(array('data'=>$result,'msg'=>'','status'=>200));
		}
		else{
			echo json_encode(array('msg'=>'No record Found.','status'=>500));
		}
	}
	
	function branch_delete(){
		$b_id = $this->input->post('b_id');
		$result = $this->Branch_model->branch_delete($b_id);
		if($result){
			echo json_encode(array('data'=>'','msg'=>'Branch Deleted Successfully.','status'=>200));
		}
		else{
			echo json_encode(array('data'=>'','msg'=>'Branch Not Deleted.','status'=>500));
		}
	}
}