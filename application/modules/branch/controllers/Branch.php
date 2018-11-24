<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Branch extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url_helper'));
        $this->load->library(array('form_validation','session'));
        $this->load->database();
		$this->load->model(array('Branch_model'));
    }

    function index(){
		$data['header'] = $this->load->view('template/header','',true);
		$data['topnav'] = $this->load->view('template/topbarnav','',true);
		$data['sidenav'] = $this->load->view('template/sidenav','',true);
		$data['main_body'] = $this->load->view('index',$data,true);
		$data['footer'] = $this->load->view('template/footer',$data,true);
        $this->load->view('template/index',$data);
    }
	
	function create_branch(){
		if($this->input->post('branch_id')){
			$this->form_validation->set_rules('branch_id', 'Branch Id', 'required|trim');
			$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
			$this->form_validation->set_rules('branch_address', 'Branch Address', 'required|trim');
			$this->form_validation->set_rules('branch_contactno', 'Branch Contact No.', 'required|trim');
			
			if ($this->form_validation->run() == FALSE) {
				$msg = validation_errors();
				echo json_encode(array('data'=>'','msg'=>$msg,'Status'=>500));
			}
			else {
				$data['b_id'] = $this->input->post('branch_id');
				$data['name'] = $this->input->post('branch_name');
				$data['address'] = $this->input->post('branch_address');
				$data['contact_no'] = $this->input->post('branch_contactno');
				$data['update_at'] = date('Y-m-d h:i:s');			
				$data['updated_by'] = $this->session->userdata('user_id');
				$result = $this->Branch_model->update_branch($data);
				if($result){
					echo json_encode(array('data'=>'','msg'=>'Branch Updated Successfully.','Status'=>200));
				}
				else{
					echo json_encode(array('data'=>'','msg'=>'Branch Not Updated.','Status'=>500));
				}
			}
		}
		else{
			$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
			$this->form_validation->set_rules('branch_address', 'Branch Address', 'required|trim');
			$this->form_validation->set_rules('branch_contactno', 'Branch Contact No.', 'required|trim');
			
			if ($this->form_validation->run() == FALSE) {
				$msg = validation_errors();
				echo json_encode(array('data'=>'','msg'=>$msg,'Status'=>500));
			}
			else {
				$data['name'] = $this->input->post('branch_name');
				$data['address'] = $this->input->post('branch_address');
				$data['contact_no'] = $this->input->post('branch_contactno');
				$data['created_at'] = date('Y-m-d h:i:s');			
				$data['created_by'] = $this->session->userdata('user_id');
				$result = $this->Branch_model->create_branch($data);
				if($result){
					echo json_encode(array('data'=>'','msg'=>'Branch Created Successfully.','Status'=>200));
				}
				else{
					echo json_encode(array('data'=>'','msg'=>'Branch Not Created.','Status'=>500));
				}
			}
		}
	}
}