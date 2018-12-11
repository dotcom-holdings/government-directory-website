<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_minings extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->library('http');
		$this->load->library('simple_html_dom');
		$this->load->library('web_browser');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->model('data_mining');
		$this->user_id = $this->session->userdata('id');
    }

    public function index() {
        $arr['page'] = 'data_mining';
		//$arr['data_minings'] = $this->data_mining->get_all_data_minings();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
		$arr['sites_dd_data'] = $this->common->dropdown('mined_sites',0,1);
        $this->load->view('admin/data_minings_list',$arr);
    }

   public function manage_data_mining($id=0,$type='Update',$action='') {
		if($this->input->post('sites'))
		{
			redirect('admin/data_minings/selected/'.$this->input->post('sites'), 'refresh');
		}
		redirect('admin/data_minings', 'refresh');
    }
    
	public function selected($id) {
		$shortname = $this->data_mining->get_shortname($id);
		redirect('admin/data_mining/data_minings_'.$shortname, 'refresh');
    }   

}

