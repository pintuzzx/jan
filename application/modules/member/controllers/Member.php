<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Member extends CI_Controller {
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
	
	function add_member(){
		$data['branches'] = $this->Branch_model->branch_list(); 
		$data['users'] = $this->Member_model->user_list(); 
		$data['header'] = $this->load->view('template/header','',true);
		$data['topnav'] = $this->load->view('template/topbarnav','',true);
		$data['sidenav'] = $this->load->view('template/sidenav','',true);
		$data['main_body'] = $this->load->view('add_member',$data,true);
		$data['footer'] = $this->load->view('template/footer',$data,true);
        $this->load->view('template/index',$data);
	}
	
	function member_create(){
		$data['member_branch'] = $this->input->post('member_branch');
		$data['member_gender'] = $this->input->post('member_gender');
		$data['member_dob'] = $this->input->post('member_dob');
		$data['member_cast'] = $this->input->post('member_cast');
		$data['member_first_name'] = $this->input->post('member_first_name');
		$data['member_last_name'] = $this->input->post('member_last_name');
		$data['member_mail'] = $this->input->post('member_mail');
		$data['member_f_h'] = $this->input->post('member_f_h');
		$data['member_f_h_name'] = $this->input->post('member_f_h_name');
		$data['member_f_h_contactno'] = $this->input->post('member_f_h_contactno');
		$data['member_parmanent_address'] = $this->input->post('member_parmanent_address');
		$data['member_business'] = $this->input->post('member_business');
		$data['member_business_address'] = $this->input->post('member_business_address');
		$data['member_business_contactno'] = $this->input->post('member_business_contactno');
		$data['member_nominee_name'] = $this->input->post('member_nominee_name');
		$data['member_nominee_age'] = $this->input->post('member_nominee_age');
		$data['member_nominee_relation'] = $this->input->post('member_nominee_relation');
		$data['memeber_is_member'] = $this->input->post('memeber_is_member');
		$data['member_photo'] = $this->input->post('member_photo');
		$data['member_signature'] = $this->input->post('member_signature');
		$data['member_refrence'] = $this->input->post('member_refrence');
		$data['ip'] = $this->input->ip_address();
		$mem = $this->Member_model->create_user($data); 
		if($mem){
			$file_name = $_FILES['member_photo']['name'];
			$event_title = $mem.'_mem';
			$x = explode('.',$file_name);
			$_FILES['userFile']['name'] = $event_title.'.'.end($x);
			$_FILES['userFile']['type'] = $_FILES['member_photo']['type'];
			$_FILES['userFile']['tmp_name'] = $_FILES['member_photo']['tmp_name'];
			$_FILES['userFile']['error'] = $_FILES['member_photo']['error'];
			$_FILES['userFile']['size'] = $_FILES['member_photo']['size'];
			
			$uploadPath = './members';
			$config['overwrite'] = true;
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPEG';
			$config['file_name'] = $event_title.'.'.end($x);
			$photo = $event_title.'.'.end($x);
				
			$this->load->library('image_lib');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('member_photo');	
			
			//////////////////////////
			
			$file_name = $_FILES['member_signature']['name'];
			$event_title = $mem.'_sign';
			$x = explode('.',$file_name);
			$_FILES['userFile']['name'] = $event_title.'.'.end($x);
			$_FILES['userFile']['type'] = $_FILES['member_signature']['type'];
			$_FILES['userFile']['tmp_name'] = $_FILES['member_signature']['tmp_name'];
			$_FILES['userFile']['error'] = $_FILES['member_signature']['error'];
			$_FILES['userFile']['size'] = $_FILES['member_signature']['size'];
			
			$uploadPath = './members';
			$config['overwrite'] = true;
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPEG';
			$config['file_name'] = $event_title.'.'.end($x);
			$sign = $event_title.'.'.end($x);
			
			$this->load->library('image_lib');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('member_signature');	
			$this->db->where('id',$mem);
			$this->db->update('users',array(
							'photo' => $photo,
							'sign' => $sign ));
			echo json_encode(array('data'=>'','msg'=>'Member added successfully.','status'=>200));
		}
		else{
			echo json_encode(array('data'=>'','msg'=>'Member not added.','status'=>500));
		}
	}	
	
	function member_list(){
		$this->db->select('u.id,u.username,u.gender,u.phone,u.email,u.address');
		$this->db->join('branch b','b.b_id = u.branch_id');
		$result = $this->db->get_where('users u',array('u.active'=>1))->result_array();
		if(count($result)>0){
			echo json_encode(array('data'=>'','msg'=>'member list.','status'=>200));
		}
		else{
			echo json_encode(array('data'=>'','msg'=>'member list.','status'=>500));
		}
	}
}