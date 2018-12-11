<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends CI_Controller {
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
		$this->load->model('category');
    }

    public function index() {
        $arr['page'] = 'Category';
		$arr['categories'] = $this->category->get_all_categories();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/categories_list',$arr);
    }

   public function manage_category($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		
		$data['status_dd_data'] = $this->common->dropdown('status',0,0);

		if($type=="Add")
			$this->form_validation->set_rules('name', 'Name', 'required|is_unique[categories.name]');
		else
			$this->form_validation->set_rules('name', 'Name', 'required');
		 
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->category->update($id))
				{
					$data['message'] = "You have successfully updated the category";
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
				if($this->category->create())
				{
					$data['message'] = "You have successfully added the category";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'Category';
		if($type=="Update")
		{
			$category = $this->category->get_category($id);
			$data['category'] = $category[0];			
		}
		else
		{
			$data['category'] = array();
		}
        
        $this->load->view('admin/manage_category',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('category');
		$this->db->where('category_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/categories', 'refresh');
    }   

}

