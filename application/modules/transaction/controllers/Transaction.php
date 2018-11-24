<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url_helper'));
        $this->load->library(array('form_validation','session'));
        $this->load->database();
        $this->load->model('Transaction_model');

    }
    function index(){
        $data['result'] = $this->Transaction_model->get_transaction()->result_array();
       // print_r($data);die;
		$data['header'] = $this->load->view('template/header','',true);
		$data['topnav'] = $this->load->view('template/topbarnav','',true);
		$data['sidenav'] = $this->load->view('template/sidenav','',true);
		$data['main_body'] = $this->load->view('index',$data,true);
		$data['footer'] = $this->load->view('template/footer',$data,true);
        $this->load->view('template/index',$data);
    }
    function trans_money(){
        
       // $this->form_validation->set_rules('ac_holder_name','Account holder Name','required|trim');
        $this->form_validation->set_rules('ac_no','Account Number','required|trim');
        $this->form_validation->set_rules('ac_type','Account Type','required|trim');
        $this->form_validation->set_rules('branch_name','Branch Name','required|trim');
        $this->form_validation->set_rules('amount','Amount','required|trim');
        $this->form_validation->set_rules('crdr_mode','Credit/Debit Mode','required|trim');
        $this->form_validation->set_rules('trans_mode','Transaction Mode','required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            // $this->data['msg'] = validation_errors();
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           // echo json_encode(array('data'=>'','msg'=>$msg,'Status'=>500));
            
            $data['header'] = $this->load->view('template/header','',true);
            $data['topnav'] = $this->load->view('template/topbarnav','',true);
            $data['sidenav'] = $this->load->view('template/sidenav','',true);
            $data['main_body'] = $this->load->view('trans_money',$data,true);
            $data['footer'] = $this->load->view('template/footer',$data,true);
            $this->load->view('template/index',$data);
        }
        else {
           // $data['name'] = $this->input->post('ac_holder_name');
            $data['account_no'] = $this->input->post('ac_no');
            //$data['name'] = $this->input->post('ac_type');
            $data['branch_id'] = $this->input->post('branch_name');
            $data['amount'] = $this->input->post('amount');
            $data['crdr_mode'] = $this->input->post('crdr_mode');
            $data['trans_mode'] = $this->input->post('trans_mode');
            $data['detail'] = $this->input->post('trans_detail');
            $data['created_at'] = date('Y-m-d h:i:s');			
            $data['created_by'] = $this->session->userdata('user_id');
            $result = $this->Transaction_model->create_transaction($data);
            //print_r($result);die;
            if($result){
                //echo json_encode(array('data'=>'','msg'=>'Transaction is Successfully completed.','Status'=>200));
                $this->session->set_flashdata('message','Transaction is Successful.');
            }
            else{
                //echo json_encode(array('data'=>'','msg'=>'Transaction is not Successful.','Status'=>500));
                $this->session->set_flashdata('message','Transaction is not Successful.');
            }            

                $data['header'] = $this->load->view('template/header','',true);
                $data['topnav'] = $this->load->view('template/topbarnav','',true);
                $data['sidenav'] = $this->load->view('template/sidenav','',true);
                $data['main_body'] = $this->load->view('trans_money',$data,true);
                $data['footer'] = $this->load->view('template/footer',$data,true);
                $this->load->view('template/index',$data);
        }
    }
    
}