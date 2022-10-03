<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function reportInsert($file = '')
    {
        date_default_timezone_set("Asia/Muscat");
        $date = date('Y/m/d');
        //echo $date;
        //$this->input->post('stime');
        $stime = strtotime($this->input->post('stime'));
        $etime = strtotime($this->input->post('etime'));
        
        $data = array(
            'user_id' => $this->session->userdata('userid'),
            'start_time' => date('h:i A', $stime),
            'end_time' => date('h:i A', $etime),
            'report_file' => $file,
            'report_content' => $this->input->post('content'),
            'source' => $this->input->post('source'),
            'cust_name' => $this->input->post('cname'),
            'shop_name' => $this->input->post('shop_name'),
            'area' => $this->input->post('shop_area'),
            'city' => $this->input->post('shop_city'),
            'mobile' => $this->input->post('phone'),
            'whatsapp' => $this->input->post('whatsapp'),
            //'image' => $this->input->post('sphoto'),
            'wsoftware' => $this->input->post('wsoftware'),
            'status' => 1,
            'date' => $date,
            'department_id' => $this->input->post('department'),
        );
        $this->db->insert('work_report',$data);
        return true;
        
    }
    //delete report
    public function deleteReport($id)
    {
        
        if($id)
        {
            $rquery = $this->db->select('report_file')->from('work_report')->where('id',$id)->get();
            $rfile = $rquery->row();
            if($rfile->report_file != '')
            {
                $dfile = 'uploads/reports/'.$rfile->report_file;
                unlink($dfile);
                $this->db->delete('work_report', array('id' => $id));
            }
            else{
                $this->db->delete('work_report', array('id' => $id));
            }
        }
    }
    public function singleReport($id = '')
    {
        if($id != '')
        {
    $query = $this->db->select('*,c.mobile as cmobile')
           ->from('work_report as wr')
           ->where('wr.id', $id)
           ->join('customer as c', 'c.id = wr.cust_name','left')
           ->get();
        //$query = $this->db->get_where('work_report',array('id'=>$id));
        return $query->row();
        }
    }
    public function getReport($id = '')
    {
        if($id != '')
        {
        $query = $this->db->get_where('work_report',array('user_id'=>$id));
        return $query;
        }
        $query = $this->db->select('*')
        ->from('work_report')->get();
        return $query;
    }
    public function pdfReport($id = '')
    {
        $query = $this->db->get_where('work_report',array('id'=>$id));
        return $query;
    }
    public function serachReport()
    {
        
       $staff = $this->input->post('staff');
       if($staff != 'all')
       {
        $staffs = ' AND user_id = '.$staff;
       }
       else{
        $staffs = '';
       }
       
    //    $sdate = $this->input->post('sdate');
    //    $edate = $this->input->post('edate');
       $sdate = date('Y/m/d', strtotime($this->input->post('sdate')));
       $edate = date('Y/m/d', strtotime($this->input->post('edate')));
       $query = $this->db->select('*')
       ->from('work_report')
       ->where('date BETWEEN "'.$sdate.'" AND "'.$edate.'"'.$staffs.'')->get();
       $num = $query->num_rows();
       $table = '';
       $i = 1;
       
        //$table .= '<table class="table" id="reporttables">';
        $table .= '<thead><tr>';
        $table .= '<th>Sl No</th><th>User Name</th><th>Start Time</th><th>End Time</th><th>Date</th><th>Report</th><th>Department</th><th>Action</th>';
        $table .= '</thead></tr>';
        $table .= '<tbody>';
       if($num > 0)
       {
        $table .= '<div class="col-md-9"></div><div class="col-md-3"><div class="form-group"><button type="button" id="print_report" class="btn btn-primary form-control">Export</button></div></div>';
        foreach($query->result() as $data)
        {
            $query1 = $this->db->select('*')
                     ->from('staff_tbl as st')
                     ->where('st.id',$data->user_id)
                     ->join('department_tbl as dt','dt.id = st.department_id')
                     ->get();
                     foreach($query1->result() as $datas)
                     {
                        $table .= '<tr>';
                        $table .= '<td>'.$i++.'</td>';
                        $table .= '<td>'.$datas->staff_name.'</td>';
                       // $table .= '<td>'.$data->source.'</td>';
                        //$table .= '<td>'.$data->shop_name.'</td>';
                        //$table .= '<td>'.$data->area.'</td>';
                        //$table .= '<td>'.$data->city.'</td>';
                        //$table .= '<td>'.$data->mobile.'</td>';
                        //$table .= '<td>'.$data->whatsapp.'</td>';
                        $table .= '<td>'.$data->start_time.'</td>';
                        $table .= '<td>'.$data->end_time.'</td>';
                        $table .= '<td>'.$data->date.'</td>';
                        $table .= ($data->report_file != '') ? '<td><a href="'.base_url().'uploads/reports/'.$data->report_file.'" download="'.$data->report_file.'"> Download </a></td>' : '"<td></td>"';
                        //$table .= '<td><a href="'.base_url().'uploads/reports/'.$data->report_file.'" download="'.$data->report_file.'"> Download </a></td>';
                        $table .= '<td>'.$datas->department_name.'</td>';
                        $table .= '<td><a href="'.base_url().'admin-view-list-report/'.$data->id.'" class="btn btn-success">View</a>&nbsp;<a target="_blank" href="'.base_url().'report-pdf/'.$data->id.'" class="btn btn-primary">PDF</a></td>';
                        $table .= '</tr>';
                     }
            
        }
       

       }
    //    else{
    //     $table .= '<tr>';
    //     $table .= '<td>No Data</td>';
    //     $table .= '</tr>';
        
    //    }
       $table .= '</tbody>';
       //$table .= '</table>';
       echo $table;
    }

}