<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
*
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('user');
    }

    public function index() {
        $arr['page'] = 'user';
		$arr['users'] = $this->user->get_all_users(); 
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id'); 
        $this->load->view('admin/users_list',$arr);
    }

    public function manage_user($id=0,$type='Update') {
		 $data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required');
		
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->user->update($id))
				{
					$data['message'] = "You have successfully edited the user" ;
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
				if($this->user->create())
				{
					$data['message'] = "You have successfully added the user";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'user';
        if($type=="Update")
		{
			$user = $this->user->get_user($id);
			$data['user'] = $user[0];
		}
		else
		{
			$data['user'] = array();
		}

		$data['usertype_dd_data'] = array('SA'=>'Super Admin','A'=>'Admin','U'=>'User','C'=>'Customer');         
        $this->load->view('admin/manage_user',$data);
    }
    
     public function disable($id) { 
        $user = $this->user->disable($id);
		redirect('admin/users', 'refresh'); 
    }
    
	public function enable($id) { 
        $user = $this->user->enable($id);
		redirect('admin/users', 'refresh');
    }
	
     public function delete_user() {
        // Code goes here
    }
    
    
    
    

}

