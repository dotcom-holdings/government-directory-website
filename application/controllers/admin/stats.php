<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stats extends CI_Controller {
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
		$this->load->model('stat');
    }

    public function index() {
        $arr['page'] = 'stats';
		$arr['stats'] = $this->stat->get_all_stats();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/stats_list',$arr);
    }

   public function manage_stats($id=0,$type='Update') {
		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		$data['website_dd_data'] = $this->common->dropdown('websites',0,0,1);
		$this->form_validation->set_rules('web_traffic', 'Web Traffic', 'trim|xss_filter');
		$this->form_validation->set_rules('mobile_traffic', 'Mobile Traffic', 'trim|xss_filter');
		 
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->stat->update($id))
				{
					$data['message'] = "You have successfully updated the stat";
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
				if($this->stat->create())
				{
					$data['message'] = "You have successfully added the stat";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'stat';
		if($type=="Update")
		{
			$stat = $this->stat->get_stats($id);
			$data['stats'] = $stat[0];
		}
		else
		{
			$data['stats'] = array();
		}
        
        $this->load->view('admin/manage_stats',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('stats');
		
		redirect('admin/stats', 'refresh');
    }   

}

