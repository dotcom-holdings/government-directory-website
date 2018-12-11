<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistics extends CI_Controller {
	
	 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('stat');
		$this->load->model('user');
		$this->load->library('rssparser');
		$this->loggedin = $this->session->userdata('is_client_login')?$this->session->userdata('is_client_login'):0; 
		$this->userid = $this->session->userdata('id')?$this->session->userdata('id'):1;
    }
	
	
public function update_stats(){
		$this->stat->advert_stats(); 
	}
	
	public function advert_stats_shown(){
		$this->stat->advert_stats_shown(); 
	}
	
	//banner upgrades
	public function upgrade_advert(){
		$data['get_companyid_from_user'] = $this->stat->get_companyid_from_user($this->session->userdata('id'));
		$this->stat->upgrade_banner($data['get_companyid_from_user'],WEBSITE_ID); 
		$this->session->set_flashdata('class_ad_upgrade', "You have successfully proccessed a request to upgrade your classified advertisement.");
		redirect('statistics/stats', 'refresh');
	}
	
	public function process_upgrade($id){
		$this->stat->process_banner_upgrade($id);
		redirect('home/banner_upgrades/processing', 'refresh');
	}
	
	public function complete_upgrade($id){
		$this->stat->complete_banner_upgrade($id);
		redirect('home/banner_upgrades/complete', 'refresh');
	}
	
	public function cancel_upgrade($id){
		$this->stat->cancel_banner_upgrade($id);
		redirect('home/banner_upgrades/cancelled', 'refresh');
	}
	//upgrades end
	
	
	public function get_profile_views_company($year){
		echo $this->stat->get_profile_views_company($year);
	}	
	
	public function get_advert_views_company($year){  
		
		$data['get_advert_views_company']="201809";
		echo $this->stat->get_advert_views_company($year); 
	}
	public function get_pcs_reached($year){
		echo $this->stat->get_pcs_reached($year);
	}
	public function get_new_visits($year){
		echo $this->stat->get_new_visits($year);
	}
	public function get_listing_count($year){ 
		echo $this->stat->get_listing_count($year);
	}
 	public function get_subscribers_count(){
		echo $this->stat->get_subscribers_count();
	}
	public function get_companies_views($year){
		$get_profile_views_company=$this->stat->get_profile_views_company($year);
		$get_advert_views_company=$this->stat->get_advert_views_company($year);
		echo $get_profile_views_company+$get_advert_views_company;
	}
	public function get_directory_views($year){
		$views = $this->stat->get_listing_count($year)/4;
		echo round($views,0)-15;
	}
	public function get_advert_views_month($get_companyid_from_user, $month , $year) {
 		echo $this->stat->get_advert_views_month($get_companyid_from_user,$month,$year);
	}
	public function get_returned_visits($month,$year){
 		echo $this->stat->get_returned_visits($month,$year);
	}
	public function get_profile_views_month($month,$year){
 		echo $this->stat->get_profile_views_month($month,$year);
	}
	public function get_people_reached_month($month,$year){
 		echo $this->stat->get_people_reached_month($month,$year);
	}

public function country_ajax_stats($month='',$year=''){
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
	 if(empty($month)){$month=date('m');}
	 if(empty($year)){$year=date('Y');}	
		
//	 $data['get_profile_views_company'] = $this->stat->get_profile_views_company($data['get_companyid_from_user'],$year);
//	 $data['get_advert_views_company'] = $this->stat->get_advert_views_company($data['get_companyid_from_user'],$year);
//	 $data['get_advert_views_month'] = $this->stat->get_advert_views_month($data['get_companyid_from_user'],$month,$year);
//	 $data['get_profile_views_month'] = $this->stat->get_profile_views_month($data['get_companyid_from_user'],$month,$year);
//	 $data['get_people_reached_month'] = $this->stat->get_people_reached_month($data['get_companyid_from_user'],$month,$year);
//	 $data['get_returned_visits'] = $this->stat->get_returned_visits($month,$year);
//	
//	 
//	 
//	 
//		 
 	$data['tests'] = $this->stat->get_country_visits($month,$year);
//		$data['get_agent_id'] = 3;
//	//data['get_return_visits'] = $this->stat->get_return_visits($month,$year,$data['get_agent_id']);  
//
//		
//		 
//	 $data['get_ads_shown'] = $this->stat->get_ads_shown($data['get_companyid_from_user']);
//	 $data['get_pcs_reached'] = $this->stat->get_pcs_reached($data['get_companyid_from_user'],$year);
//	 $data['get_new_visits'] = $this->stat->get_new_visits($year);
//										  
//	 $data['get_chrome_visits'] = $this->stat->get_chrome_visits($year);
//	 $data['get_mozilla_visits'] = $this->stat->get_mozilla_visits($year);
//	 $data['get_safari_visits'] = $this->stat->get_safari_visits($year);
//	 $data['get_ie_visits'] = $this->stat->get_ie_visits($year);
     $data['get_web_visits'] = $this->stat->get_web_visits();
	 $data['month']=$month;
	 $data['year']=$year;
		$this->load->view('country_ajax_stats', $data);
	}
	
	public function browser_ajax_stats($month='',$year=''){
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
	 if(empty($month)){$month=date('m');}
	 if(empty($year)){$year=date('Y');}	
		
//	 $data['get_profile_views_company'] = $this->stat->get_profile_views_company($data['get_companyid_from_user'],$year);
//	 $data['get_advert_views_company'] = $this->stat->get_advert_views_company($data['get_companyid_from_user'],$year);
//	 $data['get_advert_views_month'] = $this->stat->get_advert_views_month($data['get_companyid_from_user'],$month,$year);
//	 $data['get_profile_views_month'] = $this->stat->get_profile_views_month($data['get_companyid_from_user'],$month,$year);
//	 $data['get_people_reached_month'] = $this->stat->get_people_reached_month($data['get_companyid_from_user'],$month,$year);
//	 $data['get_returned_visits'] = $this->stat->get_returned_visits($month,$year);
//	
//	 
//	 
//	 
//		 
 	$data['tests'] = $this->stat->get_country_visits($month,$year);
//		$data['get_agent_id'] = 3;
//	//data['get_return_visits'] = $this->stat->get_return_visits($month,$year,$data['get_agent_id']);  
//
//		
//		 
//	 $data['get_ads_shown'] = $this->stat->get_ads_shown($data['get_companyid_from_user']);
//	 $data['get_pcs_reached'] = $this->stat->get_pcs_reached($data['get_companyid_from_user'],$year);
//	 $data['get_new_visits'] = $this->stat->get_new_visits($year);
//										  
//	 $data['get_chrome_visits'] = $this->stat->get_chrome_visits($year);
//	 $data['get_mozilla_visits'] = $this->stat->get_mozilla_visits($year);
//	 $data['get_safari_visits'] = $this->stat->get_safari_visits($year);
//	 $data['get_ie_visits'] = $this->stat->get_ie_visits($year);
     $data['get_web_visits'] = $this->stat->get_web_visits();
	 $data['month']=$month;
	 $data['year']=$year;
		$this->load->view('browser_ajax_stats', $data);
	}
	public function add_video(){
		$data['get_companyid_from_user'] = $this->stat->get_companyid_from_user($this->session->userdata('id'));
		
		$this->stat->add_video($data['get_companyid_from_user'],WEBSITE_ID);
		
		$this->session->set_flashdata('add_video', "You have successfully proccessed a request to add a video advertisement.");
		redirect('statistics/stats', 'refresh');
	}
	
	public function add_banner(){
	$data['get_companyid_from_user'] = $this->stat->get_companyid_from_user($this->session->userdata('id'));
     $vp=$this->input->post("vp");
		 $cb=$this->input->post("cbanner");
		 $clb=$this->input->post("clbanner");
		 $pb=$this->input->post("promo_banner");
	 $data = array(
			'company_id'=>$data['get_companyid_from_user'],
			 'viewpage_banner'=>$vp,
			 'classified_banner'=>$cb,
			 'classified_large'=>$clb,
			 'promo_banner'=>$pb,
			'website_id'=>WEBSITE_ID
		);
	 $res = $this->db->insert('add_banner', $data);
	 $this->session->set_flashdata('add_banner', "You have successfully proccessed a request to add a banner advertisement.");
		redirect('statistics/upgrades', 'refresh');
	}
	
	
	public function banner_upgrades($status="new",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['show_banner_upgrade'] = $this->stat->show_banner_upgrade($status,$offset);
		$data['status']=$status;
		$data['offset']=$offset;
		
		
	$this->load->view('banner_upgrades', $data);
		
	}
	
	public function video_upgrades($status="new",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['show_video_upgrade'] = $this->stat->show_video_upgrade($status,$offset);
		$data['status']=$status;
		$data['offset']=$offset;
		
		
	$this->load->view('video_upgrades', $data);
		
	}
	
	//video upgrades
	
	public function process_video_upgrade($id){
		$this->stat->process_video_upgrade($id);
		redirect('home/video_upgrades/processing', 'refresh');
	}
	
	public function complete_video_upgrade($id){
		$this->stat->complete_video_upgrade($id);
		redirect('home/video_upgrades/complete', 'refresh');
	}
	
	public function cancel_video_upgrade($id){
		$this->stat->cancel_video_upgrade($id);
		redirect('home/video_upgrades/cancelled', 'refresh');
	}
	//upgrades end
	
	public function advert_upgrades($status="new",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['show_advert_upgrade'] = $this->stat->show_advert_upgrade($status,$offset);
		$data['status']=$status;
		$data['offset']=$offset;
		
		
	$this->load->view('advert_upgrades', $data);
		
	}
	
	//advert upgrades
	
	public function process_advert_upgrade($id){
		$this->stat->process_advert_upgrade($id);
		redirect('home/advert_upgrades/processing', 'refresh');
	}
	
	public function complete_advert_upgrade($id){
		$this->stat->complete_advert_upgrade($id);
		redirect('home/advert_upgrades/complete', 'refresh');
	}
	
	public function cancel_advert_upgrade($id){
		$this->stat->cancel_advert_upgrade($id);
		redirect('home/advert_upgrades/cancelled', 'refresh');
	}
	//upgrades end
	public function stats($month='',$year='2018') { 
	$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
	 if(empty($month)){$month=date('m');}
	 if(empty($year)){$year=date('Y');}	
		
	 $data['get_profile_views_company'] = $this->stat->get_profile_views_company($data['get_companyid_from_user'],$year);
	 $data['get_advert_views_company'] = $this->stat->get_advert_views_company($data['get_companyid_from_user'],$year);
	 $data['get_advert_views_month'] = $this->stat->get_advert_views_month($data['get_companyid_from_user'],$month,$year);
	 $data['get_profile_views_month'] = $this->stat->get_profile_views_month($data['get_companyid_from_user'],$month,$year);
	 $data['get_people_reached_month'] = $this->stat->get_people_reached_month($data['get_companyid_from_user'],$month,$year);
	 $data['get_returned_visits'] = $this->stat->get_returned_visits($month,$year);
	
	 
	 
	 
		 
		$data['tests'] = $this->stat->get_country_visits($month,$year);
		$data['get_agent_id'] = 3;
	//data['get_return_visits'] = $this->stat->get_return_visits($month,$year,$data['get_agent_id']);  

		
		 
	 $data['get_ads_shown'] = $this->stat->get_ads_shown($data['get_companyid_from_user']);
	 $data['get_pcs_reached'] = $this->stat->get_pcs_reached($data['get_companyid_from_user'],$year);
	 $data['get_new_visits'] = $this->stat->get_new_visits($year);
										  
	 $data['get_chrome_visits'] = $this->stat->get_chrome_visits($year);
	 $data['get_mozilla_visits'] = $this->stat->get_mozilla_visits($year);
	 $data['get_safari_visits'] = $this->stat->get_safari_visits($year);
	 $data['get_ie_visits'] = $this->stat->get_ie_visits($year);
      
	 $data['month']=$month;
	 $data['year']=$year;
	 $data['get_web_visits'] = $this->stat->get_web_visits();
	     
		
	 $this->load->view('generalstats',$data);
		 }
	
	public function upgrades(){
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		

		$this->load->view('vwHeader',$data);
		$this->load->view('upgrades',$data);
		$this->load->view('vwFooter',$data);
	}
}