<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller { 

    /**
    * Index Page for this controller.
    * 
    * Maps to the following URL
    * 		https://example.com/index.php/welcome
    * 	- or -  
    * 		https://example.com/index.php/welcome/index
    * 	- or -
    * Since this controller is set as the default controller in 
    * config/routes.php, it's displayed at https://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->library('rssparser');
		$this->loggedin = $this->session->userdata('is_client_login')?$this->session->userdata('is_client_login'):0; 
		$this->userid = $this->session->userdata('id')?$this->session->userdata('id'):1;
    }
	
	public function testrss($company_id=0) {
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/lesotho-government/feed/');  
		$this->rssparser->set_cache_life(0);                       
		$news = $this->rssparser->getFeed(5);
		print_r($news);exit;
	}
	
	public function gallery($cat = 'gallery-wildlife',$page = '1')
{
        if ( ! file_exists(APPPATH.'views/pages/gallery.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['category'] =$cat;
		$data['page'] =$page;
		
	 
	    $this->load->view('vwHeader',$data);
		$this->load->view("pages/gallery", $data);
		$this->load->view('vwFooter',$data);
}
	

	public function gazette($prov ='ZA')
{
        if ( ! file_exists(APPPATH.'views/pages/Province.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		if($prov=='ZA-WC'){$data['cat'] ="Western Cape";}
		elseif($prov=='ZA-EC'){$data['cat'] ="Eastern Cape";}
		elseif($prov=='ZA-FS'){$data['cat'] ="Freestate";}
		elseif($prov=='ZA-GT'){$data['cat'] ="Gauteng";}
		elseif($prov=='ZA-NL'){$data['cat'] ="Kwazulu Natal";}
		elseif($prov=='ZA-LP'){$data['cat'] ="Limpopo";}
		elseif($prov=='ZA-MP'){$data['cat'] ="Mpumalanga";}
		elseif($prov=='ZA-NC'){$data['cat'] = "Northern Cape";}
		elseif($prov=='ZA-NW'){$data['cat'] ="North West";}
		else $data['cat'] = "South African";
	
		if($prov=='ZA-WC'){$data['post'] ="wcape-government";}
		elseif($prov=='ZA-EC'){$data['post'] ="ecape-government";}
		elseif($prov=='ZA-FS'){$data['post'] ="fs-government";}
		elseif($prov=='ZA-GT'){$data['post'] ="gau-government";}
		elseif($prov=='ZA-NL'){$data['post'] ="kzn-government";}
		elseif($prov=='ZA-LP'){$data['post'] ="lim-government";}
		elseif($prov=='ZA-MP'){$data['post'] ="mpg-government";}
		elseif($prov=='ZA-NC'){$data['post'] ="ncape-government";}
		elseif($prov=='ZA-NW'){$data['post'] ="nw-government";}
		else $data['post'] = "south-africa";
		
	
		$data['prov']=$prov;
		$data['loggedin'] = $this->loggedin==1?true:false;
	
		$this->load->library('rssparser');
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/'.$data["post"].'/feed/');  
		$this->rssparser->set_cache_life(5);                       
		$data['news'] = $this->rssparser->getFeed(1000);
	
		
		
        $this->load->view('vwHeader', $data);
        $this->load->view('pages/sa_gazettes', $data);
        $this->load->view('vwFooter', $data);
}
	
public function view($page="",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		$data['classified_images_top1'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1,'id');
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1,'id'+1);
		$data['classified_images_top_rand'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1,'rand()');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,5);
		$data['classified_images_top_banner2'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,5);
		$data['classified_images_top_banner3'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,1);
		$data['classified_images_top_banner4'] = $this->common->get_random_viewpage_banner(WEBSITE_ID,13,1);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,9);
		$data['classified_images_left1'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,30);
		$data['classified_images_left2'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,2);
		$data['classified_images_left3'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,5);
		$data['classified_images_left4'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,1);
		$data['classified_images_left5'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,5);
		$data['classified_images_left6'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,1);
		$data['classified_images_left7'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,5);
		$data['classified_images_left8'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,1);
		$data['classified_images_left9'] = $this->common->get_random_classified_banners(WEBSITE_ID,13,5);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rand()');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,3);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$this->load->library('rssparser');
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/government-co-za/feed/');  
		$this->rssparser->set_cache_life(5);                       
		$data['news'] = $this->rssparser->getFeed(1000);

		
		$this->load->view('vwHeader',$data);
		$this->load->view("pages/".$page, $data);
		$this->load->view('vwFooter',$data);

	}

	//stats_start
	public function update_stats(){
		$this->common->advert_stats(); 
	}
	
	public function advert_stats_shown(){
		$this->common->advert_stats_shown(); 
	}
	
	//banner upgrades
	public function upgrade_advert($id){
		$data['get_companyid_from_user'] = $id;
		$this->common->upgrade_banner($data['get_companyid_from_user'],WEBSITE_ID); 
		$this->session->set_flashdata('class_ad_upgrade', "You have successfully proccessed a request to upgrade your classified advertisement.");
		redirect('home/viewstat/'.date('m').'/'.$id.'', 'refresh');
	}
	
	public function process_upgrade($id){
		$this->common->process_banner_upgrade($id);
		redirect('home/banner_upgrades/processing', 'refresh');
	}
	
	public function complete_upgrade($id){
		$this->common->complete_banner_upgrade($id);
		redirect('home/banner_upgrades/complete', 'refresh');
	}
	
	public function cancel_upgrade($id){
		$this->common->cancel_banner_upgrade($id);
		redirect('home/banner_upgrades/cancelled', 'refresh');
	}
	public function adviews()
	{
	$CI = &get_instance();
			
    $this->db2 = $CI->load->database('db2', TRUE);
		
		 $company_ad_visited=$this->input->post("company_ad_visited");
		 $ad_type=$this->input->post("ad_type");
		 $ip=$this->input->post("ip");
		 $website_id=$this->input->post("website_id");
		
			$data = array(
			 'company_ad_visited'=>$company_ad_visited,
			 'ad_type'=>$ad_type,
			 'ip'=>$ip,
			 'website_id'=>$website_id
		     );
	 $res = $this->db2->insert('stats_ad_clicked', $data);
		echo $res;
	}
	//upgrades end
	
	public function add_video($id){
		$data['get_companyid_from_user'] = $id;
		
		$this->common->add_video($data['get_companyid_from_user'],WEBSITE_ID);
		
		$this->session->set_flashdata('add_video', "You have successfully proccessed a request to add a video advertisement.");
		redirect('home/viewstat/'.date('m').'/'.$id.'', 'refresh');
	}
	
public function get_companyid_from_user()
{
	echo $data['get_companyid_from_user'];// = $this->common->get_companyid_from_user($this->session->userdata('id'));
}
	
	public function add_banner(){
	$data['get_companyid_from_user'] = $this->common->get_companyid_from_user($this->session->userdata('id'));
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
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
	 $res = $this->db2->insert('add_banner', $data);
	 $this->session->set_flashdata('add_banner', "You have successfully proccessed a request to add a banner advertisement.");

		redirect('home/viewstat', 'refresh');
	}
	
	
	public function banner_upgrades($status="new",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['show_banner_upgrade'] = $this->common->show_banner_upgrade($status,$offset);
		$data['status']=$status;
		$data['offset']=$offset;
		
		
	$this->load->view('banner_upgrades', $data);
		
	}
	
	public function video_upgrades($status="new",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['show_video_upgrade'] = $this->common->show_video_upgrade($status,$offset);
		$data['status']=$status;
		$data['offset']=$offset;
		
		
	$this->load->view('video_upgrades', $data);
		
	}
	
	public function cron() {
			
		
	$this->load->view('cron', $data);
		
	}
	//video upgrades
	
	public function process_video_upgrade($id){
		$this->common->process_video_upgrade($id);
		redirect('home/video_upgrades/processing', 'refresh');
	}
	
	public function complete_video_upgrade($id){
		$this->common->complete_video_upgrade($id);
		redirect('home/video_upgrades/complete', 'refresh');
	}
	
	public function cancel_video_upgrade($id){
		$this->common->cancel_video_upgrade($id);
		redirect('home/video_upgrades/cancelled', 'refresh');
	}
	public function cancel_video_upgrades(){
		 echo "test";
	}
	//upgrades end
	
	public function advert_upgrades($status="new",$offset='0') {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['show_advert_upgrade'] = $this->common->show_advert_upgrade($status,$offset);
		$data['status']=$status;
		$data['offset']=$offset;
		
		
	$this->load->view('advert_upgrades', $data);
		
	}
	
	//advert upgrades
	
	public function process_advert_upgrade($id){
		$this->common->process_advert_upgrade($id);
		redirect('home/advert_upgrades/processing', 'refresh');
	}


	
	public function complete_advert_upgrade($id){
		$this->common->complete_advert_upgrade($id);
		redirect('home/advert_upgrades/complete', 'refresh');
	}
	
	public function cancel_advert_upgrade($id){
		$this->common->cancel_advert_upgrade($id);
		redirect('home/advert_upgrades/cancelled', 'refresh');
	}
	
	public function get_profile_views_company($id){
		echo $this->common->get_profile_views_company($id);
	}
	
	public function get_advert_views_company ($id){
		echo $this->common->get_advert_views_company($id);
	}	
	public function get_ads_shown ($id){
		
		//$num=array();
		//$num[0]=$this->common->get_ads_shown($id);
		//echo json_encode($num);
	  echo $this->common->get_ads_shown($id);
	}	 
	public function get_pcs_reached ($id){
		echo $this->common->get_pcs_reached($data['get_companyid_from_user']);
	}	
	public function get_advert_views_month ($id,$month){
		echo $this->common->get_advert_views_month($id,$month);
	}	
	public function get_returned_visits ($month){
		echo $this->common->get_returned_visits($month);
	}
	public function get_profile_views_month ($data,$month){
		echo $this->common->get_profile_views_month($data,$month);
	}	
	public function get_people_reached_month ($data,$month){
		echo $this->common->get_people_reached_month($data,$month);
	}	
	
	public function get_profile_views_month_of_year($get_companyid_from_user,$x)
	{
		echo $this->common->get_profile_views_month_of_year($get_companyid_from_user,$x);	
	}
	

	
	public function get_new_visits (){
		echo $this->common->get_new_visits();
	}
	
	public function get_chrome_visits()
	{
		echo $this->common->get_chrome_visits();
	}
	
	public function get_mozilla_visits()
	{
		echo $this->common->get_mozilla_visits();
	}
	
	public function get_safari_visits()
	{
		echo $this->common->get_safari_visits();
	}
    public function get_ie_visits()
	{
		echo $this->common->get_ie_visits();
	}
	
	
	
	//upgrades end
	 public function viewstat($month='',$company_id) { 
		 $data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
	 if(empty($month)){$month=date('m');}
	 $data['get_companyid_from_user'] = $company_id;
	 $data['get_companyname_from_user'] = $this->common->get_companyname_from_user($data['get_companyid_from_user']);
	 //$data['get_profile_views_company'] = $this->common->get_profile_views_company($data['get_companyid_from_user']);
//	 $data['get_advert_views_company'] = $this->common->get_advert_views_company($data['get_companyid_from_user']);
//	 $data['get_advert_views_month'] = $this->common->get_advert_views_month($data['get_companyid_from_user'],$month);
//	 $data['get_profile_views_month'] = $this->common->get_profile_views_month($data['get_companyid_from_user'],$month);
//	 $data['get_people_reached_month'] = $this->common->get_people_reached_month($data['get_companyid_from_user'],$month);
//	 $data['get_returned_visits'] = $this->common->get_returned_visits($month);
	
	 
	 
	 $data['get_web_visits'] = $this->common->get_web_visits();
		 
		$data['tests'] = $this->common->get_country_visits($month);
		$data['get_agent_id'] = 3;
	//data['get_return_visits'] = $this->common->get_return_visits($month,$data['get_agent_id']);  

		
		 
  //$data['get_ads_shown'] = $this->common->get_ads_shown($data['get_companyid_from_user']);
//	 $data['get_pcs_reached'] = $this->common->get_pcs_reached($data['get_companyid_from_user']);
//	 $data['get_new_visits'] = $this->common->get_new_visits();
	 $data['classified_images_top'] = $this->common->get_company_viewpage_banner($company_id);
										  
	 $data['get_chrome_visits'] = $this->common->get_chrome_visits();
	 $data['get_mozilla_visits'] = $this->common->get_mozilla_visits();
	 $data['get_safari_visits'] = $this->common->get_safari_visits();
	 $data['get_ie_visits'] = $this->common->get_ie_visits();
      
	 $data['month']=$month;
		 
	 $company_data = $this->common->get_company($company_id);
	 $data['company'] = $company_data[0];
	 
		 foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			$data['advert'] = $company->advert;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}  
		 
	 $this->load->view('view_stats_final',$data);
    } 
	
 public function companystat($month='',$company_id) { 
		 $data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
	 if(empty($month)){$month=date('m');}
	 $data['get_companyid_from_user'] = $company_id;
	 $data['get_companyname_from_user'] = $this->common->get_companyname_from_user($data['get_companyid_from_user']);
	 //$data['get_profile_views_company'] = $this->common->get_profile_views_company($data['get_companyid_from_user']);
//	 $data['get_advert_views_company'] = $this->common->get_advert_views_company($data['get_companyid_from_user']);
//	 $data['get_advert_views_month'] = $this->common->get_advert_views_month($data['get_companyid_from_user'],$month);
//	 $data['get_profile_views_month'] = $this->common->get_profile_views_month($data['get_companyid_from_user'],$month);
//	 $data['get_people_reached_month'] = $this->common->get_people_reached_month($data['get_companyid_from_user'],$month);
//	 $data['get_returned_visits'] = $this->common->get_returned_visits($month);
	
	 
	 
	 $data['get_web_visits'] = $this->common->get_web_visits();
		 
		$data['tests'] = $this->common->get_country_visits($month);
		$data['get_agent_id'] = 3;
	//data['get_return_visits'] = $this->common->get_return_visits($month,$data['get_agent_id']);  

		
		 
  //$data['get_ads_shown'] = $this->common->get_ads_shown($data['get_companyid_from_user']);
//	 $data['get_pcs_reached'] = $this->common->get_pcs_reached($data['get_companyid_from_user']);
//	 $data['get_new_visits'] = $this->common->get_new_visits();
	 $data['classified_images_top'] = $this->common->get_company_viewpage_banner($company_id);
										  
	 $data['get_chrome_visits'] = $this->common->get_chrome_visits();
	 $data['get_mozilla_visits'] = $this->common->get_mozilla_visits();
	 $data['get_safari_visits'] = $this->common->get_safari_visits();
	 $data['get_ie_visits'] = $this->common->get_ie_visits();
      
	 $data['month']=$month;
		 
	 $company_data = $this->common->get_company($company_id);
	 $data['company'] = $company_data[0];
	 
		 foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			$data['advert'] = $company->advert;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}  
		 
	 $this->load->view('companystat',$data);
    }
	
	public function success($link = 'http://www.sanews.gov.za/features-south-africa/youth-urged-be-innovative-start-businesses')
{
	
		$data['classified_images_left'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,5,'rank_id');
	
	
        if ( ! file_exists(APPPATH.'views/pages/success.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['link'] = $this->input->post('link');
		
		
        $this->load->view('vwHeader', $data);
        $this->load->view('pages/success', $data);
        $this->load->view('vwFooter', $data);
}	
	
	
public function press($link = 'https://www.pressportal.co.za/')
{
	
	$data['classified_images_left'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,5,'rank_id');
	
        if ( ! file_exists(APPPATH.'views/pages/pressread.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['link'] = $this->input->post('link');
		
		
        $this->load->view('vwHeader', $data);
        $this->load->view('pages/pressread', $data);
        $this->load->view('vwFooter', $data);
}	
	
	
	public function company_link() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
				
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_filter');
		$this->form_validation->set_rules('company', 'Company', 'required|trim|xss_filter');
		$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|trim|xss_filter');
			
		if($this->input->post("submit")){
 
			$to = "rico.g@adslive.co.za";

			if ($this->form_validation->run() == TRUE)
			{
				$subject = "Company link request from Governmentdirectory.co.za";
						$message = '
<html>
	<body>
		<table>
			<tr>
				<td colspan="2">
					Governmentdirectory.co.za Online link request received from;
				</td>
			</tr>
			<tr style="border-top:1pt solid black;">
				<td>
				</td>
			</tr>
			<tr>
				<td>
					Name: 
				</td>
				<td>
					'.$this->input->post("name").'
				</td>
			</tr>
			<tr>
				<td>
					Email: 
				</td>
				<td>
					'.$this->input->post("email").'
				</td>
			</tr>
			<tr>
				<td>
					Company to link: 
				</td>
				<td>
					'.$this->input->post("company").'
				</td>
			</tr>
			<tr>
				<td>
					Link page: 
				</td>
				<td>
					'.$this->input->post("link").'
				</td>
			</tr>
			<tr style="border-bottom:1pt solid black;">
				<td>
				</td>
			</tr>
			<tr>
				<td>
					Regards 
				</td>
			</tr>
			<tr>
				<td>
					Dot Com Holdings 
				</td>
			</tr>
		</table>
	</body>
</html>';
				$send_success = $this->common->send_email($to, $subject, $message);
				if($send_success)
					$data['alert'] = "Message sent successfully!<br> Please allow up to 24 hours for your company to be linked to your profile.";
				else
					$data['alert'] = "Message not sent - please try again!";	
			}
		}
		
		$this->load->view('company_link', $data); 
	}
	
	
	
	
    public function index($company_id=0) {
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/botswana-government/feed/');  
		//$this->rssparser->set_feed_url('https://www.france24.com/en/tag/botswana/rss');  
		$this->rssparser->set_cache_life(5);                       
		$data['news'] = $this->rssparser->getFeed(6);

		$data['loggedin'] = $this->loggedin==1?true:false;
        $data['page'] ='home';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id'); //
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,8);
		//$data['classified_images_left'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,5,'rank_id');
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,5,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,3);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
        $this->load->view('vwHome',$data);
    }
	
	public function stats() {
		$data['loggedin'] = $this->loggedin==1?true:false;
        $this->load->view('stats',$data);
    }
    
     public function view_stats() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		
		$data['company_dd_data'] = $this->common->stats_dropdown('companies',0,1,1);
		$this->form_validation->set_rules('company_id', 'Company Name', 'required|trim|xss_filter');

		if($this->input->post('view_stats')){
			$company_id = $this->input->post('company_id');
			if ($this->form_validation->run() == TRUE && $company_id>0)
			{
				/*$data['company'] = $this->common->get_company_name($company_id);
				
				$listing_shown = $this->common->get_company_stats($company_id,'listing_shown');
				$data['listing_shown'] = $listing_shown[0];
				$listing_visited = $this->common->get_company_stats($company_id,'listing_visited');
				$data['listing_visited'] = $listing_visited[0];
				$advert_shown = $this->common->get_company_stats($company_id,'advert_shown');
				$data['advert_shown'] = $advert_shown[0];
				$advert_visited = $this->common->get_company_stats($company_id,'advert_visited');
				$data['advert_visited'] = $advert_visited[0];
				$url_visited = $this->common->get_company_stats($company_id,'url_visited');
				$data['url_visited'] = $url_visited[0];
				$data['total_company_hits'] = $listing_shown[0]->count + $listing_visited[0]->count + $advert_shown[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
				
					$hits_website = $this->common->get_website_stats(WEBSITE_ID);
					$data['total_homepage_hits'] = $hits_website[0];
					$listing_shown_website = $this->common->get_website_stats(WEBSITE_ID,'listing_shown');
					$data['listing_shown_website'] = $listing_shown_website[0];
					$listing_visited_website = $this->common->get_website_stats(WEBSITE_ID,'listing_visited');
					$data['listing_visited_website'] = $listing_visited_website[0];
					$advert_shown_website = $this->common->get_website_stats(WEBSITE_ID,'advert_shown');
					$data['advert_shown_website'] = $advert_shown_website[0];
					$advert_visited_website = $this->common->get_website_stats(WEBSITE_ID,'advert_visited');
					$data['advert_visited_website'] = $advert_visited_website[0];
					$url_visited_website = $this->common->get_website_stats(WEBSITE_ID,'url_visited');
					$data['url_visited_website'] = $url_visited_website[0];
					$data['total_company_hits_website'] = $hits_website[0]->count;// + $listing_shown_website[0]->count + $listing_visited_website[0]->count + $advert_shown_website[0]->count + $advert_visited_website[0]->count + $url_visited_website[0]->count;
					
					$data['start_date'] = $start_date = $this->common->get_company_start_date($company_id); 
					
					$start_month = date_format(date_create($start_date),'m');
					$start_year = date_format(date_create($start_date),'Y'); 
					$current_month = date('m');
					$current_year = date('Y');
					$last_year = $current_year-1;
					
					$months = 0;*/
					/*if($start_year<$current_year){
						for($x=$start_month;$x<13;$x++){
							$hits_website_my1 = $this->common->get_website_stats(WEBSITE_ID,'',$x,$start_year);
							$data['total_website_hits_'.$x.'_'.$start_year] = $hits_website_my1[0]->count + 0;
							$months ++;
						}
					}*//*
					
						for($x=$current_month;$x<13;$x++){
							$hits_website_my1 = $this->common->get_website_stats(WEBSITE_ID,'',$x,$last_year);
							$data['total_website_hits_'.$x.'_'.$last_year] = $hits_website_my1[0]->count + 0;
							$months ++;
						}
					
					for($x=1;$x<$current_month+1;$x++){
						$hits_website_my2 = $this->common->get_website_stats(WEBSITE_ID,'',$x,$current_year);
						$data['total_website_hits_'.$x.'_'.$current_year] = $hits_website_my2[0]->count + 0;
						$months ++;
					}
					$data['months'] = $months;*/
					
					/*if($start_year<$current_year){
						for($x=$start_month;$x<13;$x++){
							$listing_shown = $this->common->get_company_stats($company_id,'listing_shown',$x,$start_year);
							$data['listing_shown_'.$x.'_'.$start_year] = $listing_shown[0]->count;
							$listing_visited = $this->common->get_company_stats($company_id,'listing_visited',$x,$start_year);
							$data['listing_visited_'.$x.'_'.$start_year] = $listing_visited[0]->count;
							$advert_shown = $this->common->get_company_stats($company_id,'advert_shown',$x,$start_year);
							$data['advert_shown_'.$x.'_'.$start_year] = $advert_shown[0]->count;
							$advert_visited = $this->common->get_company_stats($company_id,'advert_visited',$x,$start_year);
							$data['advert_visited_'.$x.'_'.$start_year] = $advert_visited[0]->count;
							$url_visited = $this->common->get_company_stats($company_id,'url_visited',$x,$start_year);
							$data['url_visited_'.$x.'_'.$start_year] = $url_visited[0]->count;
							$data['total_company_visited_'.$x.'_'.$start_year] = $listing_visited[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
							$data['total_company_hits_'.$x.'_'.$start_year] = $listing_shown[0]->count + $listing_visited[0]->count + $advert_shown[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
						}
					}*/
					/*
						for($x=$current_month;$x<13;$x++){
							$listing_shown = $this->common->get_company_stats($company_id,'listing_shown',$x,$last_year);
							$data['listing_shown_'.$x.'_'.$start_year] = $listing_shown[0]->count;
							$listing_visited = $this->common->get_company_stats($company_id,'listing_visited',$x,$last_year);
							$data['listing_visited_'.$x.'_'.$start_year] = $listing_visited[0]->count;
							$advert_shown = $this->common->get_company_stats($company_id,'advert_shown',$x,$last_year);
							$data['advert_shown_'.$x.'_'.$start_year] = $advert_shown[0]->count;
							$advert_visited = $this->common->get_company_stats($company_id,'advert_visited',$x,$last_year);
							$data['advert_visited_'.$x.'_'.$start_year] = $advert_visited[0]->count;
							$url_visited = $this->common->get_company_stats($company_id,'url_visited',$x,$last_year);
							$data['url_visited_'.$x.'_'.$start_year] = $url_visited[0]->count;
							$data['total_company_visited_'.$x.'_'.$last_year] = $listing_visited[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
							$data['total_company_hits_'.$x.'_'.$last_year] = $listing_shown[0]->count + $listing_visited[0]->count + $advert_shown[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
						}
					
					for($x=1;$x<$current_month+1;$x++){
						$listing_shown = $this->common->get_company_stats($company_id,'listing_shown',$x,$current_year);
						$data['listing_shown_'.$x.'_'.$current_year] = $listing_shown[0]->count;
						$listing_visited = $this->common->get_company_stats($company_id,'listing_visited',$x,$current_year);
						$data['listing_visited_'.$x.'_'.$current_year] = $listing_visited[0]->count;
						$advert_shown = $this->common->get_company_stats($company_id,'advert_shown',$x,$current_year);
						$data['advert_shown_'.$x.'_'.$current_year] = $advert_shown[0]->count;
						$advert_visited = $this->common->get_company_stats($company_id,'advert_visited',$x,$current_year);
						$data['advert_visited_'.$x.'_'.$current_year] = $advert_visited[0]->count;
						$url_visited = $this->common->get_company_stats($company_id,'url_visited',$x,$current_year);
						$data['url_visited_'.$x.'_'.$current_year] = $url_visited[0]->count;
						$data['total_company_visited_'.$x.'_'.$current_year] = $listing_visited[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
						$data['total_company_hits_'.$x.'_'.$current_year] = $listing_shown[0]->count + $listing_visited[0]->count + $advert_shown[0]->count + $advert_visited[0]->count + $url_visited[0]->count;
					}*/
					
					
				/*$chrome_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Chrome');
				$data['chrome_total'] = $chrome_total[0]->count;
				$mozilla_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Mozilla');
				$firefox_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Firefox');
				$data['firefox_total'] = $mozilla_total[0]->count + $firefox_total[0]->count;
				$ie_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Internet Explorer');
				$msie_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'MSIE');
				$data['ie_total'] = $ie_total[0]->count + $msie_total[0]->count;
				$safari_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Safari');
				$data['safari_total'] = $safari_total[0]->count+0;
				$opera_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Opera');
				$data['opera_total'] = $opera_total[0]->count+0;
				$netsape_total = $this->common->get_website_browser_stats(WEBSITE_ID,$company_id,'Netscape');
				$data['navigator_total'] = $netsape_total[0]->count+0;
				
				$retvis = $this->common->get_returning_visitors(WEBSITE_ID,$company_id);
				$data['returning_visitors'] = $retvis[0]->count>0?$retvis[0]->count-1:$retvis[0]->count;
				*/
				//print_r($data);exit;
				redirect('home/viewstat/'.date("m").'/'.$company_id.'', 'refresh');
			}
			else {
				$this->load->view('view_stats', $data);
			}
		} 
		else
		
		$this->load->view('view_stats', $data);
    }
	
	
	function get_url_contents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
	}
	
	function check_site_online($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);print_r($retcode);exit;
		if (200==$retcode) {
			return true;
		} else {
			return false;
		}
	}
	
	public function by_cat($cat_id,$by_city='') {
		if($by_city!=''){
			$city = $this->common->get_city_name($this->input->post('city_id'));
			$data['city'] = $city;
		} 
		else
			$data['city'] = '';
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/lesotho-government/feed/');  
		$this->rssparser->set_cache_life(30);                       
		$data['news'] = $this->rssparser->getFeed(4);
		$data['loggedin'] = $this->loggedin==1?true:false;
        $data['page'] ='home';
		$data['focus'] ='listing';
		$data['cat_id'] = $cat_id;
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_listings_by_gov_cat(WEBSITE_ID,$cat_id,$city);
		$data['listings_count'] = $this->common->get_listings_count_by_gov_cat(WEBSITE_ID,$cat_id,$city);
		$data['category'] = $this->common->get_gov_category_name($cat_id);
		$data['city_dd_data'] = $this->common->dropdown_cities('cities',0,1,1);
        $this->load->view('listings',$data);
    }
	
	public function company($company_id=0) {
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/government-co-za/feed/');  
		$this->rssparser->set_cache_life(30);                       
		$data['news'] = $this->rssparser->getFeed(4);
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['page'] ='Company';
		$data['alert'] = "";
		$company_data = $this->common->get_company($company_id);
		$data['company'] = $company_data[0];
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);

		$data['company_adverts'] = $this->common->get_company_adverts($company_id); 

		$viewpage_banner = $this->common->get_company_viewpage_banner($company_id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$classified_banner = $this->common->get_company_classified_banner($company_id);
		$data['classified_banner'] = $classified_banner[0]->image;
		$profile = $this->common->get_company_profile($company_id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			$data['webUrl'] = $company->website;
			$data['banner_promo_link'] = $company->classified_banner_promo_link;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}
		
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_filter');
		$this->form_validation->set_rules('message', 'Message', 'required|trim|xss_filter');
		$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|trim|xss_filter');
			
		if($this->input->post("submit")){
			$company_data = $company_data;
			foreach ($company_data as $company){ 
				$to = $company->email;
			}
			if ($this->form_validation->run() == TRUE)
			{
				$subject = "Online Enquiry From Government Directory";
				$message = '
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Government Directory</title>
</head>
<body>
<style type="text/css">
/* Client-specific Styles */
#outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
/* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
.ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: https://www.emailonacid.com/forum/viewthread/43/ */
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
a img {border:none;}
.image_fix {display:block;}
p {margin: 0px 0px !important;}

table td {border-collapse: collapse;}
table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
/*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
/*STYLES*/
table[class=full] { width: 100%; clear: both; }

/*################################################*/
/*IPAD STYLES*/
/*################################################*/
@media only screen and (max-width: 640px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important;
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 440px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 420px!important;height:219px!important;}
img[class="col2img"]{width: 420px!important;height:258px!important;}
img[class="image-banner"]{width: 440px!important;height:106px!important;}
td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
img[class="logo"]{padding:0!important;margin: 0 auto !important;}

}
/*##############################################*/
/*IPHONE STYLES*/
/*##############################################*/
@media only screen and (max-width: 480px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important; 
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 280px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 260px!important;height:136px!important;}
img[class="col2img"]{width: 260px!important;height:160px!important;}
img[class="image-banner"]{width: 280px!important;height:68px!important;}

}
</style>

<div class="block">
<!-- start of header -->
<table  width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
<tbody>
<tr>
<td>
<table  style="border-bottom: 1px solid #cccccc; " width="580" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">
<tbody>
<tr>
<td>
<!-- logo -->
<table width="280" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
<tbody>
<tr>
<td valign="middle" width="270" style="padding: 10px 0 10px 20px;" class="logo">
<div class="imgpop">
<a href="#"><img src="<?php echo HTTP_IMAGES_PATH; ?>coat_of_arms_ec.svg" alt="logo" border="0" style="display:block; border:none; outline:none; text-decoration:none;" st-image="edit" class="logo"></a>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End of logo -->
<!-- menu -->
<table width="280" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth">
<tbody>
<tr>
<td width="270" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 24px; padding: 10px 0;" align="right" class="menu" st-content="menu">
<a href="https://government.co.za/" style="text-decoration: none; color: #e3af01;">HOME</a>
&nbsp;|&nbsp;
<a href="https://government.co.za/home/about/" style="text-decoration: none; color: #e3af01;">ABOUT</a>
</td>
<td width="20"></td>
</tr>
</tbody>
</table>
<!-- End of Menu -->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- end of header -->
</div><div class="block">
<!-- image + text -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
<tbody>
<tr>
<td>
<table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
<tbody>
<tr>
<td width="100%" height="20"></td>
</tr>
<tr>
<td>
<table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
<tbody>
<tr>
<!-- start of image -->
<td align="center">
<a target="_blank" href="#"><img width="540" border="0" height="282" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="https://adsproof.com/mylab/newsletter/img/banner.png" class="bigimage"></a>
</td>
</tr>
<!-- end of image -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- title -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="rightimage-title">
'.$companyname.' - You have mail
</td>
</tr>
<!-- end of title -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- content -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">
Good Day, we have some news for you, a client with the details listed below would like for you to get in touch with them.
</td>
</tr>
<!-- end of content -->
<!-- Spacing -->
<tr>
<td width="100%" height="10"></td>
</tr>                                 
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>

<div class="block">
<!-- start of left image -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="leftimage">
<tbody>
<tr>
<td>
<table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
<tbody>
<!-- Spacing -->
<tr>
<td height="20"></td>
</tr>
<!-- Spacing -->
<tr>
<td>
<table width="540" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<th><h1>Client Details</h1></th>
<tr>
<td>
<!-- start of text content table -->
<table width="200" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<!-- image -->
<tr>
<td width="200" height="180" align="center">
<img src="https://adsproof.com/mylab/newsletter/img/email-logo.png" alt="" border="0" width="180" height="180" style="display:block; border:none; outline:none; text-decoration:none;">
</td>
</tr>
</tbody>
</table>
<!-- mobile spacing -->
<table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
<tbody>
<tr>
<td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
</tr>
</tbody>
</table>
<!-- mobile spacing -->
<!-- start of right column -->
<table width="330" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<!-- title -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="leftimage-title">
'.$this->input->post('name').'
</td>
</tr>
<!-- end of title -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- content -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="leftimage-paragraph">
<p><strong>Email:</strong> '.$this->input->post('email').'</p>
<p><strong>Message:</strong> '.$this->input->post('message').'.</p>
</td>
</tr>
<!-- end of content -->
<!-- Spacing -->
<tr>
<td width="100%" height="10"></td>
</tr>
<!-- button -->
<tr>
<td>
<table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
<tbody>
<tr>
<td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">

<span style="color: #ffffff; font-weight: 300;">
<a style="color: #ffffff; text-align:center;text-decoration: none;" href="mailto:'.$this->input->post('email').'">Answer Enquiry</a>
</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<!-- /button -->
</tbody>
</table>
<!-- end of right column -->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<!-- Spacing -->
<tr>
<td height="20"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- end of left image -->
</div>




<div class="block">
<!-- Start of preheader -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
<tbody>
<tr>
<td width="100%">
<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
<tbody>
<!-- Spacing -->
<tr>
<td width="100%" height="5"></td>
</tr>
<!-- Spacing -->
<tr>

</tr>
<!-- Spacing -->
<tr>
<td width="100%" height="5"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- End of preheader -->
</div>

</body></html>';
				$send_success = $this->common->send_email($to, $subject, $message);
				if($send_success)
					$data['alert'] = "Message sent successfully!";
				else
					$data['alert'] = "Message not sent - please try again!";	
			}
		}
		
        $this->load->view('show_company',$data);
    }
	
	public function lightbox_company($company_id) {
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['page'] ='company';
		$data['alert'] = "";
		$company_data = $this->common->get_company($company_id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($company_id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($company_id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}
					
        $this->load->view('show_company_lightbox',$data);
    }
	
	
	public function search() {
		$this->rssparser->set_feed_url('https://www.newspages.co.za/category/government-co-za/feed/');  
		$this->rssparser->set_cache_life(30);                       
		$data['news'] = $this->rssparser->getFeed(4);

		$data['loggedin'] = $this->loggedin==1?true:false;
		
		if($this->input->post("search")){
			$search_cat = $this->input->post("what");
			$search_place = $this->input->post("where");
			if($search_cat){
					$data['category'] = $search_cat;
					$select = 'what';
				if($search_place){
					$data['category'] .= ', '.$search_place;
					$select = 'both';
					}
				} elseif($search_place){
						$data['category'] = $search_place;
						$select = 'where';
				} else {
					$data['category'] = 'All Listings';
					$select = 'none';
			}
			
			if($select=='none')
				$data['featured_listings'] = $this->common->get_all_listings(WEBSITE_ID);
			else
				$data['featured_listings'] = $this->common->get_listings_by_search(WEBSITE_ID,$search_cat,$search_place);
		}
		else
			$data['featured_listings'] = $this->common->get_all_listings(WEBSITE_ID);
		
        $data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		
        $this->load->view('listings',$data);
    }
	
	
     public function do_login() {
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['justloggedin'] = false;
		$data['page'] ='login';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,1);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);

        if ($this->session->userdata('is_client_login')) {
            $data['error'] = 'You are already logged in!';
			$data['loggedin'] = true;
			$this->load->view('login', $data);
        } else {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login', $data);
            } else {
                $sql = "SELECT * FROM users WHERE username = '" . $user . "' AND password = '" . md5($password) . "'";
                $val = $this->db->query($sql);


                if ($val->num_rows) {
                    foreach ($val->result_array() as $recs => $res) {

                        $this->session->set_userdata(array(
                            'id' => $res['id'],
                            'user_name' => $res['user_name'],
                            'email' => $res['email'],                            
                            'is_client_login' => true
                                )
                        );
                    }
                    $data['error'] = 'You have been successfully logged in!';
					$data['justloggedin'] = true;
                } else {
                    $data['error'] = 'Username or Password incorrect';
                }
				$this->load->view('login', $data);
            }
        }
    }
	
	public function register() {
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,1);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);;
		
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|xss_filter');
		$this->form_validation->set_rules('cell', 'Cellphone', 'required|trim|xss_filter');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_filter|is_unique[users.username]');
		$this->form_validation->set_message('is_unique', 'This %s is taken - please choose another one!');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_filter|matches[confirm-password]');
		$this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|trim|xss_filter');
		$this->form_validation->set_message('matches', 'The %s does not match the Confirm Password!');
		$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|trim|xss_filter');

		if($this->input->post('register')){
			if ($this->form_validation->run() == TRUE)
			{
				$registered = $this->user->create();
				if($registered)
					$data['alert'] = "Registered successfully!";
				else
					$data['alert'] = "Not registered - please try again!";
			}
		}
		
		$this->load->view('register', $data);
    }
	
	public function postad() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['category_dd_data'] = $this->common->dropdown('categories_government',0,1,1);
		$data['province_dd_data'] = $this->common->dropdown_province('provinces',0,1,1,COUNTRY_ID);
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter|is_unique[companies.name]');
		$this->form_validation->set_message('is_unique', 'This %s is already on our database!');
		$this->form_validation->set_rules('address', 'Address', 'required|trim|xss_filter');
		$this->form_validation->set_rules('paddress', 'Postal Address', 'trim|xss_filter');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|xss_filter');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|xss_filter');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|xss_filter');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_filter');
		$this->form_validation->set_rules('website', 'Company Website', 'trim|xss_filter');
		$this->form_validation->set_rules('about', 'About Us', 'trim|xss_filter');
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim|xss_filter|is_natural_no_zero');
		$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|trim|xss_filter');
		$this->form_validation->set_message('is_natural_no_zero', 'The %s field must be chosen!');

		if($this->input->post('postad')){
			if ($this->form_validation->run() == TRUE)
			{
				$to = $this->input->post('email');
				$to_IT = 'rico.g@adslive.co.za';
				$client_subject = "Advert Validation In Progress";
				$subject = "New Free Listing Posted";
				$id = $this->common->create_listing();
				$message = '
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Government Directory of South Africa</title>
</head>
<body>
<style type="text/css">
/* Client-specific Styles */
#outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
/* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
.ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: https://www.emailonacid.com/forum/viewthread/43/ */
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
a img {border:none;}
.image_fix {display:block;}
p {margin: 0px 0px !important;}

table td {border-collapse: collapse;}
table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
/*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
/*STYLES*/
table[class=full] { width: 100%; clear: both; }

/*################################################*/
/*IPAD STYLES*/
/*################################################*/
@media only screen and (max-width: 640px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important;
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 440px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 420px!important;height:219px!important;}
img[class="col2img"]{width: 420px!important;height:258px!important;}
img[class="image-banner"]{width: 440px!important;height:106px!important;}
td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
img[class="logo"]{padding:0!important;margin: 0 auto !important;}

}
/*##############################################*/
/*IPHONE STYLES*/
/*##############################################*/
@media only screen and (max-width: 480px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important; 
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 280px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 260px!important;height:136px!important;}
img[class="col2img"]{width: 260px!important;height:160px!important;}
img[class="image-banner"]{width: 280px!important;height:68px!important;}

}
</style>
</div><div class="block">
<!-- image + text -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
<tbody>
<tr>
<td>
<table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
<tbody>
<tr>
<td width="100%" height="20"></td>
</tr>
<tr>
<td>
<table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
<tbody>
<tr>
<!-- start of image -->
<td align="center">
<a target="_blank" href="#"><img width="540" border="0" height="282" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="https://adsproof.com/mylab/newsletter/img/banner.png" class="bigimage"></a>
</td>
</tr>
<!-- end of image -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- title -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="rightimage-title">
	We have mail!
</td>
</tr>
<!-- end of title -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- content -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">
Good Day, we have  a client with the details listed below, who would like to get a free listing with us.
</td>
</tr>
<!-- end of content -->
<!-- Spacing -->
<tr>
<td width="100%" height="10"></td>
</tr>                                 
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>

<div class="block">
<!-- start of left image -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="leftimage">
<tbody>
<tr>
<td>
<table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
<tbody>
<!-- Spacing -->
<tr>
<td height="20"></td>
</tr>
<!-- Spacing -->
<tr>
<td>
<table width="540" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<th><h1>Client Details</h1></th>
<tr>
<td>
<!-- start of text content table -->
<table width="200" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<!-- image -->
<tr>
<td width="200" height="180" align="center">
<img src="https://adsproof.com/mylab/newsletter/img/email-logo.png" alt="" border="0" width="180" height="180" style="display:block; border:none; outline:none; text-decoration:none;">
</td>
</tr>
</tbody>
</table>
<!-- mobile spacing -->
<table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
<tbody>
<tr>
<td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
</tr>
</tbody>
</table>
<!-- mobile spacing -->
<!-- start of right column -->
<table width="330" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<!-- title -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="leftimage-title">
'.$this->input->post('name').'
</td>
</tr>
<!-- end of title -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- content -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="leftimage-paragraph">
<p><strong>Email:</strong> '.$this->input->post('email').'</p>
<p><strong>Telephone:</strong> '.$this->input->post('telephone').'.</p>
<p><strong>Mobile:</strong> '.$this->input->post('mobile').'.</p>
<p><strong>Fax:</strong> '.$this->input->post('fax').'.</p>
<p><strong>About:</strong> '.$this->input->post('about_us').'</p>
</td>
</tr>
<!-- end of content -->
<!-- Spacing -->
<tr>
<td width="100%" height="10"></td>
</tr>
<!-- button -->
<tr>
<td>
<table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
<tbody>
<tr>
<td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">

<span style="color: #ffffff; font-weight: 300;">
<a style="color: #ffffff; text-align:center;text-decoration: none;" href="https://government.co.za/home/company/'.$id.'">View Company</a>
</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<!-- /button -->
</tbody>
</table>
<!-- end of right column -->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<!-- Spacing -->
<tr>
<td height="20"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- end of left image -->
</div>




<div class="block">
<!-- Start of preheader -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
<tbody>
<tr>
<td width="100%">
<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
<tbody>
<!-- Spacing -->
<tr>
<td width="100%" height="5"></td>
</tr>
<!-- Spacing -->
<tr>

</tr>
<!-- Spacing -->
<tr>
<td width="100%" height="5"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- End of preheader -->
</div>

</body></html>';

//
// Client Email Copy
//

				
				$send_success = $this->common->send_email($to_IT, $subject, $message);
				
				$client_message = '
<html xmlns="https://www.w3.org/1999/xhtml"><head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lesotho Government Directory</title>
   </head>
<body>
<style type="text/css">
         /* Client-specific Styles */
         #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: https://www.emailonacid.com/forum/viewthread/43/ */
         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
         a img {border:none;}
         .image_fix {display:block;}
         p {margin: 0px 0px !important;}
         
         table td {border-collapse: collapse;}
         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
         /*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
         /*STYLES*/
         table[class=full] { width: 100%; clear: both; }
         
         /*################################################*/
         /*IPAD STYLES*/
         /*################################################*/
         @media only screen and (max-width: 640px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #ffffff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #ffffff !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
         table[class="sthide"]{display: none!important;}
         img[class="bigimage"]{width: 420px!important;height:219px!important;}
         img[class="col2img"]{width: 420px!important;height:258px!important;}
         img[class="image-banner"]{width: 440px!important;height:106px!important;}
         td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
         td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
         img[class="logo"]{padding:0!important;margin: 0 auto !important;}

         }
         /*##############################################*/
         /*IPHONE STYLES*/
         /*##############################################*/
         @media only screen and (max-width: 480px) {
         a[href^="tel"], a[href^="sms"] {
         text-decoration: none;
         color: #ffffff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
         text-decoration: default;
         color: #ffffff !important; 
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 280px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
         table[class="sthide"]{display: none!important;}
         img[class="bigimage"]{width: 260px!important;height:136px!important;}
         img[class="col2img"]{width: 260px!important;height:160px!important;}
         img[class="image-banner"]{width: 280px!important;height:68px!important;}
         
         }
      </style>
<div class="block">
   <!-- image + text -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
                  <tbody>
                     <tr>
                        <td width="100%" height="20"></td>
                     </tr>
                     <tr>
                        <td>
                           <table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
                              <tbody>
                                 <tr>
                                    <!-- start of image -->
                                    <td align="center">
                                       <a target="_blank" href="https://government.co.za/"><img width="70%" border="0" height="auto" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="https://adsproof.com/mylab/newsletter/img/banner.png" class="bigimage"></a>
                                    </td>
                                 </tr>
                                 <!-- end of image -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="20"></td>
                                 </tr>
                                 <!-- Spacing -->
                                 <!-- title -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:center;line-height: 24px;" st-title="rightimage-title">
                                       <h1>Congratulations</h1>
                                       <h2>Your Advert Has been Successfully Submitted!</h2>
                                    </td>
                                 </tr>
                                 <!-- end of title -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="20"></td>
                                 </tr>
                                 <!-- Spacing -->
                                 <!-- content -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 17px; color: #95a5a6; text-align:center;line-height: 24px;" st-content="rightimage-paragraph">
                                      	<h3>Thank You for Submitting your Advert. Please note that it will take up to 24 hours to see it live</h3>
                                    </td>
                                 </tr>
                                 <!-- end of content -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>                                 
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="20"></td>
                                 </tr>
                                 <!-- Spacing -->
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
</div>
<div class="block">
<!-- Start of preheader -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
<tbody>
<tr>
<td width="100%" align="center">
<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
	<tbody>
		<!-- Spacing -->
		<tr>
			<td width="100%" height="5"></td>
		</tr>
		<!-- Spacing -->
		<tr>
			<td width="100%" align="center">
				<a target="_blank" href="https://government.co.za/"><img width="20%" border="0" height="auto" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="https://government.co.za/assets/img/adslive.png" class="bigimage"></a>
			</td>
		</tr>
		<!-- Spacing -->
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<!-- Spacing -->
		<tr>
			<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:center;line-height: 15px;">
				<p>African Directory Services (Pty) Ltd – The way to connect with Africa ®</p>
				<p>Telephone: (+27) 11 3336803 / 0860 366387</p>
				<p>Copyright © 2016 by African Directory Services. All Rights Reserved.</p>
			</td>
		</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- End of preheader -->
</div>

</body></html>';
				$client_send_success = $this->common->client_send_email($to, $client_subject, $client_message);
				if($id)
					$data['alert'] = "Ad successfully posted. You will receive an email with further details.";
				else
					$data['alert'] = "Not posted - please try again!";
			}
		}
		
		$this->load->view('postad', $data);
    }
	
	public function google_search() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);		
		$data['locations_dd_data'] = $this->common->dropdown('locations',0,1,1);
		$data['category_dd_data'] = $this->common->dropdown('categories',0,1,1);
		
		$data['cat'] = $this->input->post('cat');
		$data['what'] = $this->input->post('what');
		$data['where'] = $this->input->post('where');
		
		//get current location
		if($this->input->post("where")){
				$address = $this->input->post("where");
				$address = ucwords(strtolower($address));
		}
		else {
			$ip = $this->common->find_ip_details();
			$city = $this->common->get_ip_info($ip, "city"); 
			$country = $this->common->get_ip_info($ip, "country");
			$comma = $city!=''?' ,':'';
			$address = $country==''?"Durban, South Africa":$city.$comma.$country;
		}
		$lladdress = str_replace(',',' ',$address);
		$lladdress = str_replace(" ", "+", $lladdress); // replace all the white space with "+" sign to match with google search pattern
		$url = "https://maps.google.com/maps/api/geocode/json?sensor=false&address=".$lladdress;
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$json = json_decode($response); 
		$data['lat'] = $json->results[0]->geometry->location->lat;
		$data['lng'] = $json->results[0]->geometry->location->lng;
		$data['address'] = $address;
		
		$this->load->view('google_search', $data); 
	}
	
	public function about() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,5);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,1);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		
		$this->load->view('about', $data); 
	}
	
	public function terms() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('terms', $data); 
	}	
	
	public function govdepartments() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('govdepartments', $data); 
	}	
	
	public function landmarks() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('landmarks', $data); 
	}	
	
 public function govministries() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('govministries', $data); 
	}
	
	public function tenders() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('tenders', $data); 
	}
	
	public function channel() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('channel', $data); 
	}
	
	public function mobile() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('mobile', $data); 
	}
	
	public function contact() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,1);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_filter');
		$this->form_validation->set_rules('message', 'Message', 'required|trim|xss_filter');
		$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required|trim|xss_filter');
			
		if($this->input->post("submit")){
 
			$to = "info@adslive.co.za";

			if ($this->form_validation->run() == TRUE)
			{
				$subject = "Lesotho Government Directory";
						$message = '<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lesotho Government Directory</title>
</head>
<body>
<style type="text/css">
/* Client-specific Styles */
#outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
/* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
.ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: https://www.emailonacid.com/forum/viewthread/43/ */
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
a img {border:none;}
.image_fix {display:block;}
p {margin: 0px 0px !important;}

table td {border-collapse: collapse;}
table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
/*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
/*STYLES*/
table[class=full] { width: 100%; clear: both; }

/*################################################*/
/*IPAD STYLES*/
/*################################################*/
@media only screen and (max-width: 640px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important;
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 440px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 420px!important;height:219px!important;}
img[class="col2img"]{width: 420px!important;height:258px!important;}
img[class="image-banner"]{width: 440px!important;height:106px!important;}
td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
img[class="logo"]{padding:0!important;margin: 0 auto !important;}

}
/*##############################################*/
/*IPHONE STYLES*/
/*##############################################*/
@media only screen and (max-width: 480px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important; 
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 280px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 260px!important;height:136px!important;}
img[class="col2img"]{width: 260px!important;height:160px!important;}
img[class="image-banner"]{width: 280px!important;height:68px!important;}

}
</style>

<div class="block">
<!-- start of header -->
<table  width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
<tbody>
<tr>
<td>
<table  style="border-bottom: 1px solid #cccccc; " width="580" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">
<tbody>
<tr>
<td>
<!-- logo -->
<table width="280" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
<tbody>
<tr>
<td valign="middle" width="270" style="padding: 10px 0 10px 20px;" class="logo">
<div class="imgpop">
<a href="#"><img src="<?php echo HTTP_IMAGES_PATH; ?>coat_of_arms_ec.svg" alt="logo" border="0" style="display:block; border:none; outline:none; text-decoration:none;" st-image="edit" class="logo"></a>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End of logo -->
<!-- menu -->
<table width="280" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth">
<tbody>
<tr>
<td width="270" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 24px; padding: 10px 0;" align="right" class="menu" st-content="menu">
<a href="https://government.co.za/" style="text-decoration: none; color: #e3af01;">HOME</a>
&nbsp;|&nbsp;
<a href="https://government.co.za/home/about" style="text-decoration: none; color: #e3af01;">ABOUT</a>
</td>
<td width="20"></td>
</tr>
</tbody>
</table>
<!-- End of Menu -->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- end of header -->
</div><div class="block">
<!-- image + text -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
<tbody>
<tr>
<td>
<table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
<tbody>
<tr>
<td width="100%" height="20"></td>
</tr>
<tr>
<td>
<table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
<tbody>
<tr>
<!-- start of image -->
<td align="center">
<a target="_blank" href="#"><img width="540" border="0" height="282" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="https://adsproof.com/mylab/newsletter/img/banner.png" class="bigimage"></a>
</td>
</tr>
<!-- end of image -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- title -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="rightimage-title">
You have mail
</td>
</tr>
<!-- end of title -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- content -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">
Good Day, we have some news for you, a client with the details listed below would like for you to get in touch with them.
</td>
</tr>
<!-- end of content -->
<!-- Spacing -->
<tr>
<td width="100%" height="10"></td>
</tr>                                 
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>

<div class="block">
<!-- start of left image -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="leftimage">
<tbody>
<tr>
<td>
<table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
<tbody>
<!-- Spacing -->
<tr>
<td height="20"></td>
</tr>
<!-- Spacing -->
<tr>
<td>
<table width="540" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<th><h1>Client Details</h1></th>
<tr>
<td>
<!-- start of text content table -->
<table width="200" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<!-- image -->
<tr>
<td width="200" height="180" align="center">
<img src="https://adsproof.com/mylab/newsletter/img/email-logo.png" alt="" border="0" width="180" height="180" style="display:block; border:none; outline:none; text-decoration:none;">
</td>
</tr>
</tbody>
</table>
<!-- mobile spacing -->
<table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
<tbody>
<tr>
<td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
</tr>
</tbody>
</table>
<!-- mobile spacing -->
<!-- start of right column -->
<table width="330" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
<tbody>
<!-- title -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="leftimage-title">
'.$this->input->post('name').'
</td>
</tr>
<!-- end of title -->
<!-- Spacing -->
<tr>
<td width="100%" height="20"></td>
</tr>
<!-- Spacing -->
<!-- content -->
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="leftimage-paragraph">
<p><strong>Email:</strong> '.$this->input->post('email').'</p>
<p><strong>Message:</strong> '.$this->input->post('message').'.</p>
</td>
</tr>
<!-- end of content -->
<!-- Spacing -->
<tr>
<td width="100%" height="10"></td>
</tr>
<!-- button -->
<tr>
<td>
<table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
<tbody>
<tr>
<td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">

<span style="color: #ffffff; font-weight: 300;">
<a style="color: #ffffff; text-align:center;text-decoration: none;" href="mailto:'.$this->input->post('email').'">Answer Enquiry</a>
</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<!-- /button -->
</tbody>
</table>
<!-- end of right column -->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<!-- Spacing -->
<tr>
<td height="20"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- end of left image -->
</div>




<div class="block">
<!-- Start of preheader -->
<table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
<tbody>
<tr>
<td width="100%">
<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
<tbody>
<!-- Spacing -->
<tr>
<td width="100%" height="5"></td>
</tr>
<!-- Spacing -->
<tr>

</tr>
<!-- Spacing -->
<tr>
<td width="100%" height="5"></td>
</tr>
<!-- Spacing -->
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- End of preheader -->
</div>

</body></html>';
				$send_success = $this->common->send_email($to, $subject, $message);
				if($send_success)
					$data['alert'] = "Message sent successfully!";
				else
					$data['alert'] = "Message not sent - please try again!";	
			}
		}
		
		$this->load->view('contact', $data); 
	}
	
	public function advertise() {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['registered'] = false;
		$data['page'] ='search';
		$data['focus'] ='listing';
		
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,7);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		$data['featured_listings'] = $this->common->get_featured_listings(WEBSITE_ID);
		
		$this->load->view('advertise', $data); 
	}
	        
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('title');
         $this->session->unset_userdata('ag_country');
        
        $this->session->unset_userdata('is_client_login');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('home', 'refresh');
    }

    public function links($type) {
		$data['user_id'] = $this->userid;
		$data['loggedin'] = $this->loggedin==1?true:false;
		$data['type'] = $type;
		$data['classified_images_top'] = $this->common->get_classified_ads(WEBSITE_ID,0,4,3,1000,'rank_id');
		$data['classified_images_top_banner'] = $this->common->get_random_viewpage_banner(WEBSITE_ID);
		$data['classified_images_left'] = $this->common->get_random_classified_banners(WEBSITE_ID,0,8);
		$data['classified_image_top_right'] = $this->common->get_classified_ads(WEBSITE_ID,0,2,1,1,'rank_id');
		$data['classified_images_right'] = $this->common->get_government_random_classified_banners(WEBSITE_ID,1,4);
		$data['videos'] = $this->common->get_featured_videos(WEBSITE_ID);
		$data['gov_categories'] = $this->common->get_gov_categories();
		
		$this->load->view('documents/link', $data); 
	}

}

