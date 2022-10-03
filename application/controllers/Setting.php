<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
        $this->load->model('Department_model');
    }
    public function index()
    {
        $data['department'] = $this->department();
        
        $this->load->view('admin/header');
        $this->load->view('admin/role',$data);
        $this->load->view('admin/footer');
    }
    public function department()
    {
        return $this->Department_model->select_departments();
    }
}