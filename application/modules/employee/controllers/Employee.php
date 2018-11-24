<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of signin
 *
 * @author https://www.roytuts.com
 */
class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url_helper'));
        $this->load->library(array('form_validation','session'));
        $this->load->database();
    }

    function index(){
		$data['header'] = $this->load->view('template/header','',true);
		$data['topnav'] = $this->load->view('template/topbarnav','',true);
		$data['sidenav'] = $this->load->view('template/sidenav','',true);
		$data['main_body'] = $this->load->view('blank',$data,true);
		$data['footer'] = $this->load->view('template/footer',$data,true);
        $this->load->view('template/index',$data);
    }
}