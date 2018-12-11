<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fix extends CI_Controller {
/**
* JIDMAC Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* ITS Online
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('company');
		// to read all the data to the old/new cdn databases //
		//****************************************************//
		$CI = &get_instance();
		$this->db2 = $CI->load->database('new', TRUE);//cdn
		$this->db3 = $CI->load->database('old', TRUE);//old
		//****************************************************//
    }

    public function index() {
        $arr['page'] = 'company';
		//$arr['companies'] = $this->company->get_all_companies();
        $this->load->view('admin/fix_home',$arr);
    }

   public function manage_fix($type) {
		$data['message'] = "";
		$data['success'] = "";
		$data['type'] = $type;
		 
		if($this->input->post('update'))
		{
				if($this->company->fix_update($type))
				{
					$data['message'] = "You have successfully deleted the duplicate!";
					$data['success'] = "yes";
				}
				else				
				{
					$data['message'] = validation_errors();
					$data['success'] = "no";
				}
		}
		elseif($this->input->post('proceed'))
		{
        	$data['page'] = 'company';
			$name = $this->input->post('name');
			$data['db1_dd_data'] = $this->company->dropdown_db2($name);
			$data['db2_dd_data'] = $this->company->dropdown_db3($name);
		}
        
        $this->load->view('admin/manage_fix',$data);
    } 
     

}

