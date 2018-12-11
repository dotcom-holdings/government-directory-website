<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departments extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->model('department');
    }

    public function index() {
        $arr['page'] = 'department';
		$arr['departments'] = $this->department->get_all_department();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/departments_list',$arr);
    }

   public function manage_department($id=0,$type='Update') {
		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		if($type=="Add")
			$this->form_validation->set_rules('name', 'Name', 'required|is_unique[department.name]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		//$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		//$this->form_validation->set_rules('website', 'Website', 'required');
		 
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->department->update($id))
				{
					$data['message'] = "You have successfully updated the department";
					$data['success'] = "yes";
				}				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		else
		if($this->input->post('Add'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->department->create())
				{
					$data['message'] = "You have successfully added the department";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'department';
		if($type=="Update")
		{
			$department = $this->department->get_department($id);
			$contacts = $this->department->get_contacts($id);
			$data['department'] = $department[0];
			$data['contacts'] = $contacts;
		}
		else
		{
			$data['department'] = array();
		}
		$data['province_dd_data'] = $this->common->dropdown('provinces');
        
        $this->load->view('admin/manage_department',$data);
    }
    
     public function contact_delete($id,$type_id) {
        $this->db->where('id', $type_id);
		$this->db->delete('contact');
		
		redirect('admin/departments/manage_department/'.$id, 'refresh');
    }
    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('department');
		$this->db->where('department_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/departments', 'refresh');
    }   

}

