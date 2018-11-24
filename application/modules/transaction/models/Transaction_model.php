<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    public function create_transaction($data)
    {
       // print_r($data);die;
        $result = $this->db->insert('transactions',$data);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function get_user_details($id)
    {
        $result = $this->db->query("SELECT t1.user_id,t1.u_account_no,t2.a_id,t2.ac_type,t3.b_id,t3.name FROM `account_master` t1,`account_type_master` t2,`branch` t3 where ((t1.u_account_no = '".$id."' && t1.branch_id = t3.b_id) && t1.ac_type_id = t2.a_id)");
        return $result;
    }

}