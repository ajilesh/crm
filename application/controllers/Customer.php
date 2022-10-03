<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
        $this->load->model('Customer_model');
        $this->load->model('Home_model');
    }
    //customer index
    public function index()
    {
        $data['country']=$this->Home_model->select_countries();
        $this->load->view('staff/header');
        $this->load->view('staff/customer',$data);
        $this->load->view('staff/footer');
    }
    //insert customer
    public function insert()
    {
        $this->form_validation->set_rules('cname', 'Full Name', 'required');
        $this->form_validation->set_rules('cemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('cmobile', 'Mobile Number ', 'required');
        $this->form_validation->set_rules('ccity', 'City', 'required');
        $this->form_validation->set_rules('cstate', 'State', 'required');
        $this->form_validation->set_rules('ccountry', 'Country', 'required');
        if($this->form_validation->run() !== false)
        {
            $query = $this->Customer_model->insertCustomer();
            if($query==true)
            {
                
                $this->session->set_flashdata('success', "New Report Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Report Adding Failed.");
            }
            redirect('add-customer');
        }
        else{
            $this->load->view('staff/header');
        $this->load->view('staff/customer');
        $this->load->view('staff/footer');
        }
    }
}    