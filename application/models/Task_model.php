<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {
    public function insertTask($id = '')
    {
        if($id)
        {
            
            $data = array(
                'stime' => $this->input->post('stime'),
                'etime' => $this->input->post('etime'),
                'title' => $this->input->post('task'),
                'task' => $this->input->post('content'),
                'assign_to' => $this->input->post('staff'),
                'status' => $this->input->post('status'),
                'approved' => $this->input->post('approve'),
                'update_date' => date('Y/m/d'),
                
            );
            
            $this->db->where('id', $id);
            $this->db->update('task', $data);
             return true;
        }
        else{
            $data = array(
                'stime' => $this->input->post('stime'),
                'etime' => $this->input->post('etime'),
                'title' => $this->input->post('task'),
                'task' => $this->input->post('content'),
                'assign_to' => $this->input->post('staff'),
                'status' => 'incomplete',
                'create_date' => date('Y/m/d'),
                
            );
            //print_r($data);
             $this->db->insert('task',$data);
             return true;
        }
        
    }
    public function editTask($id)
    {
        $this->db->where('id', $id);
        $this->db->update('task', array('status' => $this->input->post('status')));
    }
    public function deletetask($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('task');
    }
    public function listTask($id = '')
    {
        if($id)
        {
        $query = $this->db->select('*,t.id as tid')
        ->from('task t')
        ->join('staff_tbl st','st.id = t.assign_to')
        ->where('t.id',$id)->get()->row();
        return $query;
        }
        $query = $this->db->select('*')
        ->from('task')->get();
        return $query;
    }
    public function approvedTask($staff)
    {
        $this->db->select('*')
        ->from('task')->where('approved',0)->where('assign_to',$staff);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result=$query->result_array();
            return $result;
        }
    }
}