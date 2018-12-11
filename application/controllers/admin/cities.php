<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cities extends CI_Controller {
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
		$this->load->model('city');
    }

    public function index() {
        /*$arr['page'] = 'city';
		$arr['cities'] = $this->city->get_all_cities();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/cities_list',$arr);*/
		$this->manage_city();
    }

   public function manage_city($id=0,$type='Add',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		$data['country'] = $this->common->getcountry();

		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[cities.name]');
		$this->form_validation->set_rules('country', 'Country', 'trim|xss_filter');
		$this->form_validation->set_rules('province', 'Province', 'trim|xss_filter');
		 
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->city->update($id))
				{
					$data['message'] = "You have successfully updated the city";
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
				if($this->city->create())
				{
					$data['message'] = "You have successfully added the city";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'city';
		if($type=="Update")
		{
			$city = $this->city->get_city($id);
			$data['city'] = $city[0];			
		}
		else
		{
			$data['city'] = array();
		}
        
        $this->load->view('admin/manage_city',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('cities');
		
		redirect('admin/cities', 'refresh');
    }
	

	public function ajax_province_list($country_id,$selected='')
    {
        $data['province'] = $this->common->getprovince($country_id);
		$data['selected'] = $selected;
        $this->load->view('admin/ajax_get_province',$data);
    }
    
    public function ajax_city_list($province_id,$selected='')
    {
        $data['city'] = $this->common->getcity($province_id);
		$data['selected'] = $selected;
        $this->load->view('admin/ajax_get_city',$data); 
    }  
	
	public function ajax_lat_list($city_id)
    {
        $data['latgeo'] = $this->common->getgeo($city_id);
        $this->load->view('admin/ajax_get_lat',$data);
    } 
	
	public function ajax_lon_list($city_id)
    {
        $data['longeo'] = $this->common->getgeo($city_id);
        $this->load->view('admin/ajax_get_lon',$data);
    } 

}

