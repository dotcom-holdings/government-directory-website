<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Websites extends CI_Controller {
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
		$this->load->model('website');
    }

    public function index() {
        $arr['page'] = 'website';
		$arr['websites'] = $this->website->get_all_websites();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/websites_list',$arr);
    }

   public function manage_website($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		
		$data['status_dd_data'] = $this->common->dropdown('status',0,0);
		$data['design_dd_data'] = $this->common->dropdown('design',0,0);

		if($type=="Add")
			$this->form_validation->set_rules('name', 'Name', 'required|is_unique[websites.name]');
		$this->form_validation->set_rules('description', 'Description', 'required');
		 
		if($this->input->post('Update'))
		{

			if ($this->form_validation->run() == TRUE)
			{
				if($this->website->update($id))
				{
					$data['message'] = "You have successfully updated the website";
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
				if($this->website->create())
				{
					$data['message'] = "You have successfully added the website";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'Website';
		if($type=="Update")
		{
			$website = $this->website->get_website($id);
			$data['website'] = $website[0];			
		}
		else
		{
			$data['website'] = array();
		}
        
        $this->load->view('admin/manage_website',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('websites');
		
		redirect('admin/websites', 'refresh');
    }   

}

