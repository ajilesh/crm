<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workreport extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
        $this->load->model('Department_model');
        $this->load->model('Report_model');
        $this->load->model('Customer_model');
        $this->load->model('Report_model');
        $this->load->model('Staff_model');
    }
    //all report
    public function allReport()
    {
       $data['staff'] = $this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/allreport',$data);
        $this->load->view('admin/footer');
    }
    //pdf report
    public function pdfReport($id = '')
    {
        // Get output html
        //$html = 'test';
        $data['datas'] = $this->Report_model->pdfReport($id);
        $html = $this->load->view('staff/repo', $data, true);
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    // work report
    public function workReport()
    {
        $data['department']=$this->Department_model->select_departments();
        $data['customer'] = $this->Customer_model->getCustomer();
        // foreach ($data as $row)
        // {
        //     echo $row['id'];
        // }
        $this->load->view('staff/header');
        $this->load->view('staff/report',$data);
        $this->load->view('staff/footer');
    }
    //delete report
    public function deleteListReport($id)
    {
        $this->Report_model->deleteReport($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    //view list report
    public function viewListreport($id)
    {
        $data['data'] = $this->Report_model->singleReport($id);
        $this->load->view('staff/header');
        $this->load->view('staff/view-list-report',$data);
        $this->load->view('staff/footer');
    }
    public function adminViewListreport($id)
    {
        $data['data'] = $this->Report_model->singleReport($id);
        $this->load->view('admin/header');
        $this->load->view('admin/view-list-report',$data);
        $this->load->view('admin/footer');
    }
    //staff list report
    public function staffListreport()
    {
        $id = $this->session->userdata('userid');
        $data['datas'] = $this->Report_model->getReport($id);
        $this->load->view('staff/header');
        $this->load->view('staff/list-report',$data);
        $this->load->view('staff/footer');
    }
    //list report
    public function listReport()
    {
        $query['data'] = $this->Report_model->getReport();
        // foreach($query->result() as $data)
        // {
        //     echo $data->mobile;
        // }
        $this->load->view('admin/header');
        $this->load->view('admin/listreport',$query);
        $this->load->view('admin/footer');
    }
    //search report
    public function searchReport()
    {
        
        $this->Report_model->serachReport();
    }
    // work report insert
    public function workReportInsert()
    {
        $this->form_validation->set_rules('content', 'Report', 'required');
        $this->form_validation->set_rules('stime', 'Start Time', 'required');
        $this->form_validation->set_rules('etime', 'End Time', 'required');
        //$this->form_validation->set_rules('wsoftware', 'Software', 'required');
        // $this->form_validation->set_rules('etime', 'End Time', 'required');
        // $this->form_validation->set_rules('etime', 'End Time', 'required');
        
        if($this->form_validation->run() !== false)
        {
            $file = '';
            if(!empty($_FILES['ureport']['name']))
            {
                $config['upload_path'] = 'uploads/reports/'; 
                $config['allowed_types'] = '*'; 
                //$config['max_size'] = '100'; // max_size in kb 
                $config['file_name'] = $_FILES['ureport']['name']; 
                $this->load->library('upload',$config); 
                if (!$this->upload->do_upload('ureport')) 
                    {
                        $error = $this->upload->display_errors();
                        //print_r($error);
                    }
                    else 
                    {
                        $filename = $this->upload->data();
                        $file = $filename['file_name'];
                        $query = $this->Report_model->reportInsert($file);
                    }
                
            }
            else{
                $query = $this->Report_model->reportInsert($file);
            }
            // $query = $this->Report_model->reportInsert();
            if($query==true)
            {
                
                $this->session->set_flashdata('success', "New Report Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Report Adding Failed.");
            }
            redirect('work-report');
        }
        else{
        $this->load->view('staff/header');
        $this->load->view('staff/report');
        $this->load->view('staff/footer');
        }
        // $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        // $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        // $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        // $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        // $this->form_validation->set_rules('txtcity', 'City', 'required');
        // $this->form_validation->set_rules('txtstate', 'State', 'required');
        // $this->form_validation->set_rules('slccountry', 'Country', 'required');
        //$this->Report_model->reportInsert();
        
        
    }
}