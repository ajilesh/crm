<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
        $this->load->model('Task_model');
        $this->load->model('Staff_model');
        $this->load->model('Department_model');
    }
    public function index()
    {
        $staff['staff'] = $this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/add-task',$staff);
        $this->load->view('admin/footer');
    }
    public function taskInsert()
    {
        $this->form_validation->set_rules('task', 'Task', 'required');
        $this->form_validation->set_rules('stime', 'Start Time', 'required');
        $this->form_validation->set_rules('etime', 'End Time', 'required');
        //$this->form_validation->set_rules('wsoftware', 'Software', 'required');
        // $this->form_validation->set_rules('etime', 'End Time', 'required');
        // $this->form_validation->set_rules('etime', 'End Time', 'required');
        
        if($this->form_validation->run() !== false)
        {
            $id = $this->input->post('hide_id');
            if($id)
            {
                $query = $this->Task_model->insertTask($id);
                
            }
            else{
                $query = $this->Task_model->insertTask();
            if($query==true)
            {
                
                $this->session->set_flashdata('success', "New Report Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Task Adding Failed.");
            }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
        $this->load->view('admin/header');
        $this->load->view('admin/add-task');
        $this->load->view('admin/footer');
        }
    }
    //staff task edit
    public function staffTaskEdit()
    {
        $id = $this->input->post('hide_id');
        $this->Task_model->editTask($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    //task edit
    public function taskEdit($id)
    {
        //echo $id;
        $data['data'] = $this->Task_model->listTask($id);
        $data['staff'] = $this->Staff_model->select_staff();
        // $data['data'] = $this->Task_model->listTask($id);
        // $dep_id = $this->Task_model->listTask($id);
        // $data['department'] = $this->Department_model->select_department_byID($dep_id->department_id);
        $this->load->view('staff/header');
        $this->load->view('staff/edit-task',$data);
        $this->load->view('staff/footer');
    }
    //task view
    public function taskView($id)
    {
        $data['data'] = $this->Task_model->listTask($id);
        $dep_id = $this->Task_model->listTask($id);
        $data['department'] = $this->Department_model->select_department_byID($dep_id->department_id);
        $this->load->view('staff/header');
        $this->load->view('staff/staff-task-view',$data);
        $this->load->view('staff/footer');
    }
    //edit task
    public function editTask($id)
    {
        $data['data'] = $this->Task_model->listTask($id);
        $data['staff'] = $this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/edit-task',$data);
        $this->load->view('admin/footer');
    }
    //delete task
    public function deleteTask($id)
    {
         $this->Task_model->deleteTask($id);
         redirect($_SERVER['HTTP_REFERER']);
        
    }
    public function listTask()
    {
        $query['data'] = $this->Task_model->listTask();
        $this->load->view('admin/header');
        $this->load->view('admin/list-task',$query);
        $this->load->view('admin/footer');
    }
    public function staffListTask()
    {
        $staff=$this->session->userdata('userid');
        $query['data'] = $this->Task_model->approvedTask($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/list-task',$query);
        $this->load->view('staff/footer');
    }
}