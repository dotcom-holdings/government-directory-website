<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class subcategories extends CI_Controller {
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
		$this->load->model('subcategory');
    }

    public function index() {
        $arr['page'] = 'subcategory';
		$arr['subcategories'] = $this->subcategory->get_all_subcategories();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/subcategories_list',$arr);
    }

   public function manage_subcategory($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		
		$data['status_dd_data'] = $this->common->dropdown('status',0,0);
		$data['category_dd_data'] = $this->common->dropdown('categories',0,1);

		if($type=="Add")
			$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter|is_unique[subcategories.name]');
		else
			$this->form_validation->set_rules('name', 'Name', 'requiredtrim|xss_filter');
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim|xss_filter');
		 
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->subcategory->update($id))
				{
					$data['message'] = "You have successfully updated the subcategory";
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
			//print_r($_POST);exit;
			if ($this->form_validation->run() == TRUE)
			{
				if($this->subcategory->create())
				{
					$data['message'] = "You have successfully added the subcategory";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'subcategory';
		if($type=="Update")
		{
			$subcategory = $this->subcategory->get_subcategory($id);
			$data['subcategory'] = $subcategory[0];			
		}
		else
		{
			$data['subcategory'] = array();
		}
        
        $this->load->view('admin/manage_subcategory',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('subcategory');
		$this->db->where('subcategory_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/subcategories', 'refresh');
    }   

}

