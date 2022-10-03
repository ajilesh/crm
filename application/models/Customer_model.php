<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function insertCustomer()
    {
        $name=$this->input->post('cname');
        $email=$this->input->post('cemail');
        $mobile=$this->input->post('cmobile');
        $city=$this->input->post('ccity');
        $state=$this->input->post('cstate');
        $country=$this->input->post('ccountry');
        $address=$this->input->post('caddress');
        $data = array(
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'address' => $address,
            'status' => 1
        );
        $this->db->insert("customer",$data);
        return $this->db->insert_id();
    }
    public function getCustomer()
    {
       $query = $this->db->select('*')->get('customer');
       return $query;
    }
}