<?php
Class Stat extends CI_Model
{
	private $stat = 'stats';

	public function __construct()
	{
		$CI = &get_instance();
		$this->db2 = $CI->load->database('db2', TRUE);
		$this->load->helper('url');
		
	}
	 
	 //stats startv
function advert_stats() {
				
		$ip = $_SERVER['REMOTE_ADDR'];
		$company_listing_visited = $this->input->post('company_listing_visited')?$this->input->post('company_listing_visited'):0;
		$company_ad_visited = $this->input->post('company_ad_visited')?$this->input->post('company_ad_visited'):0;
		$company_web_visited = $this->input->post('company_web_visited')?$this->input->post('company_web_visited'):0;
		$ad_type = $this->input->post('ad_type')?$this->input->post('ad_type'):'';
		$category_clicked = $this->input->post('category_clicked')?$this->input->post('category_clicked'):0;
		$category_type = $this->input->post('category_type')?$this->input->post('category_type'):'';
			
		
	if($company_ad_visited){
	$data = array(
				'ad_type'=>$ad_type,
				'company_ad_visited'=>$company_ad_visited,
				'ip'=>$ip,
				'website_id'=>WEBSITE_ID
			);
			$this->db2->insert('stats_ad_clicked', $data);
		
	}
}
	
	
public function get_subscribers_count() {
		
        $query = $this->db->query('SELECT COUNT(id) as counts FROM email_subscribers  ');
		foreach($query->result_array() as $row) {
			$counts = $row['counts'];
		} 
        return ($counts);
		
	}

	


   public function get_listing_count($year) {
		
        $query = $this->db->query('SELECT COUNT(id) as counts FROM companies WHERE  country_id = "'.COUNTRY_ID.'"  ');
		foreach($query->result_array() as $row) {
			$counts = $row['counts'];
		}
		 $query1 = $this->db->query('SELECT COUNT(id) as counts1 FROM free_listings WHERE  country_id = "'.COUNTRY_ID.'"');
		foreach($query1->result_array() as $row1) {
			$counts1 = $row1['counts1'];
		}
        return ($counts+$counts1);
		
	}	
	
		function advert_stats_shown() {
				
		$ip = $_SERVER['REMOTE_ADDR'];
		$company_listing_shown = $this->input->post('company_listing_shown')?$this->input->post('company_listing_shown'):0;
		$company_ad_shown = $this->input->post('company_ad_shown')?$this->input->post('company_ad_shown'):0;
		
	if($company_ad_shown){
	$data = array(
				'company_ad_shown'=>$company_ad_shown,
				'ip'=>$ip,
				'website_id'=>WEBSITE_ID			
			);
			$this->db2->insert('stats_ads_shown', $data);
		
	}
	}
		
	public function get_companyid_from_user($id='10') {
		$tenant = array();
        $query = $this->db2->query('SELECT id FROM companies WHERE user_id='.$id);
		foreach($query->result_array() as $row) {
			$company_id = $row['id'];
		}
        return $company_id;
		
	}
		
	public function get_companyname_from_user($id) {
		$tenant = array();
        $query = $this->db2->query('SELECT name FROM companies WHERE user_id='.$id);
		foreach($query->result_array() as $row) {
			$company_name = $row['name'];
		}
        return $company_name;
		
	}
	
	public function get_profile_views_company($company_id) {
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE ad_type <> "advert" and 
		website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        return $profile_views;
		
	}
		
	public function get_advert_views_company($company_id) {
        $query = $this->db2->query('SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' AND ad_type = "advert" ');
		foreach($query->result_array() as $row) {
			$advert_views = $row['advert_views'];
		}
        return $advert_views;
		
	}
		
	public function get_pcs_reached($company_id) {
        $query = $this->db2->query('SELECT COUNT(id) as visits FROM stat_tracker WHERE website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$visits = $row['visits'];
		}
        return $visits;
		
	}
		
    public function get_new_visits() {
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE month='.date('m').' and  year='.date('Y').' and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		
	public function get_ads_shown($company_id) {
		
        $query = $this->db2->query('SELECT COUNT(id) as advert_shown  FROM stats_ads_shown ');
		foreach($query->result_array() as $row) {
			$advert_shown = $row['advert_shown'];
		}
        return $advert_shown;
		
	}

		public function get_advert_views_month($company_id , $month) {
        $query = $this->db2->query('SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' AND ad_type = "advert" and MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').' ');
		foreach($query->result_array() as $row) {

			$advert_views = $row['advert_views'];
		}
        return $advert_views;
		
	}
		
	public function get_returned_visits($month) {
        $query = $this->db2->query('SELECT COUNT(id) as visits FROM stats_visit WHERE website_id = '.WEBSITE_ID.' AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$visits = $row['visits'];
		}
        return $visits;
		
	}
	
	public function get_profile_views_month($company_id,$month) {
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE  ad_type <> "advert" AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').' and website_id = '.WEBSITE_ID.' ');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        return $profile_views;
		
	}
		
	public function get_people_reached_month($company_id,$month) {
		
        $query = $this->db2->query('SELECT COUNT(DISTINCT ip) as people_reached FROM stats_ads_shown WHERE MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').' and website_id = '.WEBSITE_ID.'') ;
		foreach($query->result_array() as $row) {
			$people_reached = $row['people_reached'];
		}
        return $people_reached;
		
	}
	
	public function get_chrome_visits() {
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "chrome%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		public function get_mozilla_visits() {
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "firefox%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		public function get_safari_visits() {
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "Safari%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
		
        return $new_visits;
		
	}
		public function get_ie_visits() {
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "Mozilla%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		
	

	public function get_country_visits($month) {
		
	$this->db2->select('country,COUNT(DISTINCT id) as total');  
    $this->db2->from('stat_tracker');
    $this->db2->where('website_id',''.WEBSITE_ID.'');
	$this->db2->where('MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
    $this->db2->group_by('country');
    return $this->db2->get()->result();

		
	}
		
	
		
	public function get_return_visits($month,$agent_id) { 
		
	$this->db2->select('COUNT(id) as returns');
    $this->db2->from('stats_visit');
    $this->db2->where('agent_id',''.$agent_id.'');
	$this->db2->where('website_id',''.WEBSITE_ID.'');
	$this->db2->where('MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
    return $this->db2->get()->result();

		
	}
	public function get_web_visits() {
		
        $this->db2->select('DISTINCT(browser)');
    $this->db2->from('stat_tracker');
	$this->db2->where('website_id',''.WEBSITE_ID.'');
	$this->db2->order_by('browser');
    return $this->db2->get()->result();
	}	
		
	public function get_profile_views_month_of_year($month) {
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' AND ad_type <> "advert"  AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        echo $profile_views.",";
		
	}
		
	public function get_advert_views_month_of_year($company_id,$month) {
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' AND ad_type = "advert"  AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').' ');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        echo $profile_views.",";
		
	}
	//upgrades 
		
	function upgrade_banner($id,$website_id){
		$data = array(
			'company_id'=>$id,
			'website_id'=>$website_id
		);
		
	 	$res = $this->db2->insert('upgrade_classified_advert', $data);
		return $this->db2->insert_id();
		
	}
		
		function add_video($id,$website_id){
		$data = array(
			'company_id'=>$id,
			'website_id'=>$website_id
		);
		
	 	$res = $this->db2->insert('add_video_ad', $data);
		return $this->db2->insert_id();
		
	}
	//show sales upgrades
	public function show_banner_upgrade($status,$offset) {
		
        $this->db2->select('*');
    $this->db2->from('add_banner');
    $this->db2->where('proccess',$status);
	$this->db2->order_by('timestamp','Desc');
	$this->db2->limit(5, $offset);
    return $this->db2->get()->result();
	
	
	}
    
		public function process_banner_upgrade($id) {
			
		$data = array('proccess' => "Processing" );

		$this->db2->where('id', $id);
		$this->db2->update('add_banner', $data);
	
	}
		
		public function complete_banner_upgrade($id) {
			
		$data = array('proccess' => "complete" );

		$this->db2->where('id', $id);
		$this->db2->update('add_banner', $data);
	
	}
		
		public function cancel_banner_upgrade($id) {
			
		$data = array('proccess' => "cancelled" );

		$this->db2->where('id', $id);
		$this->db2->update('add_banner', $data);
	
	}
		
	function get_website($id) {
        $query = $this->db2->query('SELECT name FROM websites WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	//upgrade videos
		public function show_video_upgrade($status,$offset) {
		
        $this->db2->select('*');
    $this->db2->from('add_video_ad');
	$this->db2->where('proccess',$status);
	$this->db2->order_by('timestamp','Desc');
	$this->db2->limit(5, $offset);
    return $this->db2->get()->result();
	
	
	}
		
	public function process_video_upgrade($id) {
			
		$data = array('proccess' => "Processing" );

		$this->db2->where('id', $id);
		$this->db2->update('add_video_ad', $data);
	
	}
		
		public function complete_video_upgrade($id) {
			
		$data = array('proccess' => "complete" );

		$this->db2->where('id', $id);
		$this->db2->update('add_video_ad', $data);
	
	}
		
		public function cancel_video_upgrade($id) {
			
		$data = array('proccess' => "cancelled" );

		$this->db2->where('id', $id);
		$this->db2->update('add_video_ad', $data);
	
	}
		
		
	//advert videos
		public function show_advert_upgrade($status,$offset) {
		
        $this->db2->select('*');
    $this->db2->from('upgrade_classified_advert');
	$this->db2->where('proccess',$status);
	$this->db2->order_by('timestamp','Desc');
	$this->db2->limit(5, $offset);
    return $this->db2->get()->result();
	

	
	}
		
	public function process_advert_upgrade($id) {
			
		$data = array('proccess' => "Processing" );

		$this->db2->where('id', $id);
		$this->db2->update('upgrade_classified_advert', $data);
	
	}
		
		public function complete_advert_upgrade($id) {
			
		$data = array('proccess' => "complete" );

		$this->db2->where('id', $id);
		$this->db2->update('upgrade_classified_advert', $data);
	
	}
		
		public function cancel_advert_upgrade($id) {
			
		$data = array('proccess' => "cancelled" );

		$this->db2->where('id', $id);
		$this->db2->update('upgrade_classified_advert', $data);
	
	}
//stats end
	
}
