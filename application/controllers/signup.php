<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signup extends CI_Controller {

    /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    * 	- or -  
    * 		http://example.com/index.php/welcome/index
    * 	- or -
    * Since this controller is set as the default controller in 
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see http://codeigniter.com/user_guide/general/urls.html
    */
    public function __construct() {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->model('common');
    }

    public function index() {
        
    } 
	
	public function register($type) {
		$data['message'] = "";
		$data['success'] = "";
		
		
		if($type=="contractor")
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email]');
			$this->form_validation->set_rules('cell', 'Cell Phone', 'required|min_length[10]');
			$this->form_validation->set_rules('id_number', 'Identity Number/Reg Number', 'required|min_length[13]');
		}
		if($type=="tenant")
		{
			$this->form_validation->set_rules('unit_number', 'Unit Number', 'required');
			$this->form_validation->set_rules('id_number', 'Identity Number', 'required|min_length[13]');
		}
		
		if($this->input->post('register'))
		{
			$this->load->model($type);
			if ($this->form_validation->run() == TRUE)
			{
				if($type=="tenant")
				{
					if($this->tenant->create_tenant())
					{
						$data['message'] = "You have registered successfully" ;
						$data['success'] = "yes";
					}
					else
					{
						$data['message'] = validation_errors();
						$data['success'] = "no";
					}
				}
				elseif($type=="contractor")
				{
					if($this->contractor->create_contractor())
					{
						$data['message'] = "You have registered successfully" ;
						$data['success'] = "yes"; 
					}
					else
					{
						$data['message'] = validation_errors();
						$data['success'] = "no";
					}
				}
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
		$data['contractor_dd_data'] = $this->common->dropdown('contractor');
		$data['property_dd_data'] = $this->common->dropdown('property');
		$data['dept_dd_data'] = $this->common->dropdown('departments');
		$this->load->model('term');
		$terms = $this->term->get_terms();
		$data['terms'] = $terms[0]->text;
		
        $this->load->view($type.'_signup',$data);
    }


}

