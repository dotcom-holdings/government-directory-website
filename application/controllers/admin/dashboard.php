<?php
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
*
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('company');
		$this->load->model('website');
		$this->load->model('location');
		$this->load->model('category');
		$this->load->model('featured_listing');
		$this->load->model('classified_ad');
		$this->load->model('user');
		$this->load->model('data_mining');
    }

    public function index() {
        $arr['page']='dash';
		$arr['user_type'] = $this->session->userdata('user_type'); 
		$arr['user_id'] = $this->session->userdata('id');  
		$arr['company_count'] = $this->company->count_companies();
		$arr['website_count'] = $this->website->count_websites();
		$arr['fix_count'] = $this->company->count_duplicates();
		$arr['category_count'] = $this->category->count_categories();
		$arr['featured_listings_count'] = $this->featured_listing->count_featured_listings();
		$arr['classified_ads_count'] = $this->classified_ad->count_classified_ads();
		$arr['users_count'] = $this->user->count_users();
		$arr['data_mining_count'] = $this->data_mining->count_data_mining();
        $this->load->view('admin/vwDashboard',$arr);
    }

}

