<?php
	Class Common extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('user_agent'); 
		$this->load->library('ip2location_lib'); 
		$this->load->library('session'); 
	} 
	
		
	//stats start
		function stats_dropdown($table,$id=0,$ps=1,$ob=1,$custom='') 
    {
		$user_id = $this->session->userdata('id');
		$this -> db -> select('id, name');
		$this -> db -> from($table);
		$this -> db -> where('user_id',$user_id);
		
		if($id!=0)  
		{
			$this -> db -> where('id',$id);
		}
		
		if($ob==0)  
		{
			$this->db->order_by('id');
		}
		else
		{
			$this->db->order_by('name');
		}

		$query = $this -> db -> get();
		
		$dd_data = array();
		if($ps==1) {
			if($custom=='')
				$dd_data[0] = "Please Select";
			else
				$dd_data[0] = "".$custom;
		}

		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}
		function insert_stats() {
		
		$this->load->library('user_agent');
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
        $browser = $this->agent->browser();
		$src = $this->agent->is_referral()?explode('/',$this->agent->referrer()):NULL;
		$from_page = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:$_SERVER['PHP_SELF'];
		$cur_link = uri_string() == NULL ? 'home' : end(explode('/',uri_string()));
		$browser_version = $this->agent->version();
		$device = $this->agent->is_mobile() ? $this->agent->mobile() : "PC";
		$os = $this->agent->platform();
		$curr_page = $_SERVER['PHP_SELF'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		 
			
		$query = $this->db2->query("SELECT ip FROM stat_tracker
                               WHERE website_id = ".WEBSITE_ID." and ip = '".$ip."'");
    		if($query->num_rows() == 0){
			$getloc = json_decode(file_get_contents("http://api.ipstack.com/$ip?access_key=16e1bc45bd0d2ad17d225676fc967781"));

				
			$data = array(
				'browser'=>$browser,
				'browser_version'=>$browser_version,
				'os'=>$os,
				'device'=>$device,
				'ip'=>$ip,
				'date_visited'=>date('Y-m-d'),
				'first_time_visited'=>date('H:i:s'),
				'last_time_visited'=>date('H:i:s'),
				'month'=>date('m'),
				'year'=>date('Y'),
				'page'=>"page",
				'from_page'=>$from_page,
				'country'=>$getloc->country_name,
				'region'=>$getloc->region_name,
				'city'=>$getloc->city,
				'latitude'=>$getloc->latitude,
				'longitude'=>$getloc->longitude,
				'code'=>$getloc->zip_code,
				'website_id'=>WEBSITE_ID
				
			);
			$this->db2->insert('stat_tracker', $data);
		}else{}
				
	}

		
		function update_stats() {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		$this->load->library('user_agent');
		$ip = $_SERVER['REMOTE_ADDR'];
		$getloc = json_decode(file_get_contents("http://api.ipstack.com/$ip?access_key=16e1bc45bd0d2ad17d225676fc967781"));
			
		$query = $this->db2->query("SELECT id,ip FROM stat_tracker WHERE website_id = ".WEBSITE_ID." and ip = '".$ip."' ");
    		
		 foreach ($query->result() as $row)
					{
							$row->id;

					}
			
			if($query->num_rows() > 0){
				
			$data = array(
				'agent_id'=> $row->id,
				'country'=>$getloc->country_name,
				'website_id'=>WEBSITE_ID
			);
			$this->db2->insert('stats_visit', $data);			
		}else{}
				
	}

function advert_stats() {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);	
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
		function advert_stats_shown() {
				$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
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
		
	public function get_companyid_from_user($id) {
		$tenant = array();
        $query = $this->db->query('SELECT id FROM companies WHERE user_id='.$id);
		foreach($query->result_array() as $row) {
			$company_id = $row['id'];
		}
        return $company_id;
		
	}
		
	public function get_companyname_from_user($id) {
		$tenant = array();
        $query = $this->db->query('SELECT name FROM companies WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$company_name = $row['name'];
		}
        return $company_name;
		
	}
	
	public function get_profile_views_company($company_id) { 
        $CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);  
		if($company_id==''){
			redirect('home/company_link', 'refresh');
			
		}else{
		$query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' and company_ad_visited='.$company_id.' and  ad_type <> "advert"');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        return $profile_views;
		}
	}
		
	public function get_advert_views_company($company_id) {
        
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
		$query = $this->db2->query('SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' and company_ad_visited='.$company_id.' and  ad_type = "advert"');
		foreach($query->result_array() as $row) {
			$advert_views = $row['advert_views'];
		}
        return $advert_views;
		
	}
		
	public function get_pcs_reached($company_id) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as visits FROM stat_tracker WHERE website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$visits = $row['visits'];
		}
        return $visits;
		
	}
		
    public function get_new_visits() {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE website_id = '.WEBSITE_ID.' and month='.date('m').' and  year='.date('Y').' and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		
	public function get_ads_shown($company_id) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as advert_shown  FROM stats_ads_shown WHERE company_ad_shown ='.$company_id.'');
		foreach($query->result_array() as $row) {
			$advert_shown = $row['advert_shown'];
		}
        return $advert_shown;
		
	}

		public function get_advert_views_month($company_id , $month) {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' and company_ad_visited='.$company_id.' and  ad_type = "advert" and MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$advert_views = $row['advert_views'];
		}
        return $advert_views;
		
	}
		
	public function get_returned_visits($month) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as visits FROM stats_visit WHERE website_id = '.WEBSITE_ID.' AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$visits = $row['visits'];
		}
        return $visits;
		
	}
	
	public function get_profile_views_month($company_id,$month) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' and company_ad_visited='.$company_id.' and  ad_type <> "advert" AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        return $profile_views;
		
	}
		
	public function get_people_reached_month($company_id,$month) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
        $query = $this->db2->query('SELECT COUNT(DISTINCT ip) as people_reached FROM stats_ads_shown WHERE website_id = '.WEBSITE_ID.' and company_ad_shown ='.$company_id.' AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$people_reached = $row['people_reached'];
		}
        return $people_reached;
		
	}
	
	public function get_chrome_visits() {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "chrome%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		public function get_mozilla_visits() {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "firefox%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		public function get_safari_visits() {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "Safari%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
		
        return $new_visits;
		
	}
		public function get_ie_visits() {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like "Mozilla%" and website_id = '.WEBSITE_ID.'');
		foreach($query->result_array() as $row) {
			$new_visits = $row['new_visits'];
		}
        return $new_visits;
		
	}
		
	function get_classified_ad_company($website_id,$company_id)
	{
		
		$sql = 'SELECT classified_ads.url,companies.name,companies.website,companies.id FROM classified_ads LEFT JOIN companies on classified_ads.company_id='.$company_id.' WHERE classified_ads.status_id=1 limit 1';
				
		$query = $this->db->query($sql);
        return $query->result();
	}

	public function get_country_visits($month) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
	$this->db2->select('country,COUNT(DISTINCT id) as total');  
    $this->db2->from('stat_tracker');
    $this->db2->where('website_id',''.WEBSITE_ID.'');
	$this->db2->where('MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
    $this->db2->group_by('country');
    return $this->db2->get()->result();

		
	}
		
	
		
	public function get_return_visits($month,$agent_id) { 
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
	$this->db2->select('COUNT(id) as returns');
    $this->db2->from('stats_visit');
    $this->db2->where('agent_id',''.$agent_id.'');
	$this->db2->where('website_id',''.WEBSITE_ID.'');
	$this->db2->where('MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
    return $this->db2->get()->result();

		
	}
	public function get_web_visits() {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $this->db2->select('DISTINCT(browser)');
    $this->db2->from('stat_tracker');
	$this->db2->where('website_id',''.WEBSITE_ID.'');
	$this->db2->order_by('browser');
    return $this->db2->get()->result();
	}	
		
	public function get_profile_views_month_of_year($company_id,$month) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' and company_ad_visited='.$company_id.' and  ad_type <> "advert" AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        echo $profile_views.",";
		
	}
		
	public function get_advert_views_month_of_year($company_id,$month) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
        $query = $this->db2->query('SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id = '.WEBSITE_ID.' and company_ad_visited='.$company_id.' and  ad_type = "advert"  AND MONTH(timestamp) = '.$month.' AND YEAR(timestamp) = '.date('Y').'');
		foreach($query->result_array() as $row) {
			$profile_views = $row['profile_views'];
		}
        echo $profile_views.",";
		
	}
	//upgrades 
		
	function upgrade_banner($id,$website_id){
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		$data = array(
			'company_id'=>$id,
			'website_id'=>$website_id
		);
		
	 	$res = $this->db2->insert('upgrade_classified_advert', $data);
		return $this->db2->insert_id();
		
	}
		
		function add_video($id,$website_id){
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		$data = array(
			'company_id'=>$id,
			'website_id'=>$website_id
		);
		
	 	$res = $this->db2->insert('add_video_ad', $data);
		return $this->db2->insert_id();
		
	}
	//show sales upgrades
	public function show_banner_upgrade($status,$offset) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
        $this->db2->select('*');
    $this->db2->from('add_banner');
    $this->db2->where('proccess',$status);
	$this->db2->order_by('timestamp','Desc');
	$this->db2->limit(5, $offset);
    return $this->db2->get()->result();
	
	
	}
    
		public function process_banner_upgrade($id) {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
		$data = array('proccess' => "Processing" );

		$this->db2->where('id', $id);
		$this->db2->update('add_banner', $data);
	
	}
		
		public function complete_banner_upgrade($id) {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
		$data = array('proccess' => "complete" );

		$this->db2->where('id', $id);
		$this->db2->update('add_banner', $data);
	
	}
		
		public function cancel_banner_upgrade($id) {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
		$data = array('proccess' => "cancelled" );

		$this->db2->where('id', $id);
		$this->db2->update('add_banner', $data);
	
	}
		
	function get_website($id) {
        $query = $this->db->query('SELECT name FROM websites WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	//upgrade videos
		public function show_video_upgrade($status,$offset) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
        $this->db2->select('*');
    $this->db2->from('add_video_ad');
	$this->db2->where('proccess',$status);
	$this->db2->order_by('timestamp','Desc');
	$this->db2->limit(5, $offset);
    return $this->db2->get()->result();
	
	
	}
		
	public function process_video_upgrade($id) {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
		$data = array('proccess' => "Processing" );

		$this->db2->where('id', $id);
		$this->db2->update('add_video_ad', $data);
	
	}
		
		public function complete_video_upgrade($id) {
			$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
		$data = array('proccess' => "complete" );

		$this->db2->where('id', $id);
		$this->db2->update('add_video_ad', $data);
	
	}
		
		public function cancel_video_upgrade($id) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
		$data = array('proccess' => "cancelled" );


		$this->db2->where('id', $id);
		$this->db2->update('add_video_ad', $data);
	
	}
		
		
	//advert videos
		public function show_advert_upgrade($status,$offset) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
        $this->db2->select('*');
    $this->db2->from('upgrade_classified_advert');
	$this->db2->where('proccess',$status);
	$this->db2->order_by('timestamp','Desc');
	$this->db2->limit(5, $offset);
    return $this->db2->get()->result();
	
	
	}
		
	public function process_advert_upgrade($id) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
		
		$data = array('proccess' => "Processing" );

		$this->db2->where('id', $id);
		$this->db2->update('upgrade_classified_advert', $data);
	
	}
		
		public function complete_advert_upgrade($id) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);
			
		$data = array('proccess' => "complete" );

		$this->db2->where('id', $id);
		$this->db2->update('upgrade_classified_advert', $data);
	
	}
		
		public function cancel_advert_upgrade($id) {
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);	
		$data = array('proccess' => "cancelled" );

		$this->db2->where('id', $id);
		$this->db2->update('upgrade_classified_advert', $data);
	
	}
//stats end
	
	
	
	function get_classified_ads($website_id,$cat_id=0,$position=2,$size=1,$limit=0,$order_by="rand()")
	{
		$sql = 'SELECT classified_ads.url,companies.name,companies.website,companies.id FROM classified_ads LEFT JOIN companies on classified_ads.company_id=companies.id'; 
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' WHERE website_id='.$website_id.' and classified_ads.status_id=1 and classified_ads.position_id='.$position.' and classified_ads.size_id='.$size;
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id='.$cat_id;
		}
		
		$sql .= ' order by '.$order_by;
		
		if($limit>0){
			$sql .= ' limit '.$limit;	
		}
		
		$query = $this->db->query($sql);
        return $query->result();
	}
	
	
	function get_government_classified_ads($website_id,$cat_id=0,$position=2,$size=1,$limit=1,$order_by="rand()")
	{
		$sql = 'SELECT classified_ads.url,companies.name,companies.website,companies.id FROM classified_ads LEFT JOIN companies on classified_ads.company_id=companies.id'; 
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' WHERE website_id='.$website_id.' and classified_ads.status_id=1 and classified_ads.position_id='.$position.' and classified_ads.size_id='.$size;
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)';
		}
		$sql .= ' order by '.$order_by.' limit '.$limit;
		
		$query = $this->db->query($sql);
        return $query->result();
	}
		

	function get_random_viewpage_banner($website_id,$cat_id=0,$limit=1)
	{
		$sql = 'SELECT viewpage_banners.url,companies.name,companies.website,companies.id FROM viewpage_banners LEFT JOIN companies on viewpage_banners.company_id=companies.id'; 
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' LEFT JOIN website_company on website_company.company_id=companies.id';
		$sql .= ' WHERE website_company.website_id='.$website_id;
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id='.$cat_id;
		}
		$sql .= ' order by rand() limit '.$limit;
		$query = $this->db->query($sql);
        return $query->result();
	}
	
	function get_random_classified_banners($website_id,$cat_id=0,$limit=1)
	{
		$sql = 'SELECT classified_banners.url,companies.name,companies.website,companies.id FROM classified_banners LEFT JOIN companies on classified_banners.company_id=companies.id'; 
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' LEFT JOIN website_company on website_company.company_id=companies.id';
		$sql .= ' WHERE website_company.website_id='.$website_id;
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id='.$cat_id;
		}
		$sql .= ' order by rand() limit '.$limit;
		$query = $this->db->query($sql);
        return $query->result();
	}
	
	function get_government_random_classified_banners($website_id,$cat_id=0,$limit=1)
	{
		$sql = 'SELECT classified_banners.url,companies.name,companies.website,companies.id FROM classified_banners LEFT JOIN companies on classified_banners.company_id=companies.id'; 
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' LEFT JOIN website_company on website_company.company_id=companies.id';
		$sql .= ' WHERE website_company.website_id='.$website_id;
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id in (2,3,4,5,6,7,8,9,10,11,12,13,14,15)';
		}
		$sql .= ' order by rand() limit '.$limit;
		$query = $this->db->query($sql);
        return $query->result();
	}
	
	function get_company_viewpage_banner($id) 
	{
		$query = $this->db->query('SELECT viewpage_banners.url as image FROM companies LEFT JOIN viewpage_banners on viewpage_banners.company_id=companies.id WHERE companies.id='.$id.' limit 1');
        return $query->result();
	}

	function get_company_classified_banner($id)
	{
		$query = $this->db->query('SELECT classified_banners.url as image FROM companies LEFT JOIN classified_banners on classified_banners.company_id=companies.id WHERE companies.id='.$id.' limit 1');
        return $query->result();
	}

	function get_company_adverts($id)
	{
		$query = $this->db->query('SELECT adverts.* FROM adverts 
		LEFT JOIN companies on companies.id=adverts.company_id 
		WHERE companies.id='.$id);
        return $query->result();
	}
	
	function get_company_profile($id)
	{
		$query = $this->db->query('SELECT profiles.url as image FROM companies LEFT JOIN profiles on profiles.company_id=companies.id WHERE companies.id='.$id.' limit 1');
        return $query->result();
	}
	
	function get_main_categories() 
	{
		$query = $this->db->query('SELECT id,name FROM categories order by name asc');
        return $query->result();
	}
		
	function get_company($id)
	{
		$query = $this->db->query('SELECT companies.*,logos.url as logo,adverts.url as advert,profiles.url as profile, companies.website FROM companies 
			LEFT JOIN logos on logos.company_id=companies.id 
			LEFT JOIN adverts on adverts.company_id=companies.id 
			LEFT JOIN profiles on profiles.company_id=companies.id WHERE companies.id='.$id);
        return $query->result();
	}
		
	/*function get_featured_listings($website_id,$cat_id=0)
	{
		$sql = 'SELECT r1.id,logos.url as logo,r1.name,r1.address,r1.telephone FROM companies as r1';
		
		$sql .= ' JOIN
       (SELECT (RAND() *
                     (SELECT MAX(id)
                        FROM companies)) AS id)
        AS r2';
		
		$sql .= ' LEFT JOIN logos on logos.company_id=r1.id';
		
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=r1.id';
		}

		$sql .= ' WHERE r1.id >= r2.id';

		if($cat_id>0){
			$sql .= ' and category_company_government.category_id='.$cat_id;
		}
		$sql .= " and (logos.url<>'' or logos.url<>'/')";
		$sql .= ' LIMIT 20';

		$query = $this->db->query($sql);
		
        return $query->result();
	}*/
	
	function get_featured_listings($website_id,$cat_id=0)
	{
		$sql = 'SELECT companies.id,logos.url as logo,companies.name,companies.address,companies.telephone FROM featured_listings LEFT JOIN companies on featured_listings.company_id=companies.id LEFT JOIN logos on logos.company_id=companies.id';
		
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' WHERE featured_listings.website_id='.$website_id.' and featured_listings.status_id=1';
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id='.$cat_id;
		}
		$sql .= ' order by featured_listings.rank_id';
		$query = $this->db->query($sql);
        return $query->result();
	}
	
	function get_listings_by_cat($website_id,$cat_id,$city='')
	{
		$sql = 'SELECT companies.id,logos.url as logo,companies.name,companies.address,companies.telephone FROM companies LEFT JOIN logos on logos.company_id=companies.id';
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id ';
			$sql .= ' WHERE category_company_government.category_id='.$cat_id;	
			
			if($city!='')
				$sql .= ' AND companies.address like "%'.$city.'%"';	
					
			$sql .= ' ORDER BY companies.search_rank_id,companies.name';
			
			if($city=='')
				$sql .= ' LIMIT 200';
			
		$query = $this->db->query($sql);
       return $query->result();
	}
	
	function get_listings_count_by_cat($website_id,$cat_id,$city='')
	{
		$sql = 'SELECT companies.id FROM companies';
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id ';	
			$sql .= ' WHERE category_company_government.category_id='.$cat_id;
			
			if($city!='')
				$sql .= ' AND companies.address like "%'.$city.'%"';	
											
		$query = $this->db->query($sql);
       return $query->num_rows();
	}
	
		function get_listings_by_gov_cat($website_id,$cat_id,$city='')
	{
		$sql = 'SELECT companies.id,logos.url as logo,companies.name,companies.address,companies.telephone FROM companies LEFT JOIN logos on logos.company_id=companies.id';
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id ';
			//$sql .= ' LEFT OUTER JOIN website_company on website_company.company_id=companies.id ';	
			$sql .= ' WHERE category_company_government.category_id='.$cat_id;	
			//$sql .= ' AND website_company.website_id='.$website_id;
			$sql .= ' AND companies.address like "%'.COUNTRY_NAME.'%"';
			
			if($city!='')
				$sql .= ' AND companies.address like "%'.$city.'%"';	
					
			$sql .= ' ORDER BY companies.freelisting,companies.id DESC,companies.search_rank_id,companies.name';
			
			if($city=='')
				$sql .= ' LIMIT 200';
			
		$query = $this->db->query($sql);
       return $query->result();
	}
	
	function get_listings_count_by_gov_cat($website_id,$cat_id,$city='')
	{
		$sql = 'SELECT companies.id,logos.url as logo,companies.name,companies.address,companies.telephone FROM companies LEFT JOIN logos on logos.company_id=companies.id';
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id ';
			//$sql .= ' LEFT OUTER JOIN website_company on website_company.company_id=companies.id ';	
			$sql .= ' WHERE category_company_government.category_id='.$cat_id;	
			//$sql .= ' AND website_company.website_id='.$website_id;
			$sql .= ' AND companies.address like "%'.COUNTRY_NAME.'%"';
			
			if($city!='')
				$sql .= ' AND companies.address like "%'.$city.'%"';	
			
		$query = $this->db->query($sql);
       return $query->num_rows();
	}
	
		
	function get_all_listings($website_id)
	{
		$sql = 'SELECT companies.id,logos.url as logo,companies.name,companies.address,companies.telephone FROM companies LEFT JOIN logos on logos.company_id=companies.id';	
		//$sql .= ' LEFT OUTER JOIN website_company on website_company.company_id=companies.id ';	
		//$sql .= ' WHERE website_company.website_id='.$website_id;	
		$sql .= ' WHERE companies.address like "%'.COUNTRY_NAME.'%"';
			$sql .= ' ORDER BY companies.search_rank_id,companies.name LIMIT 250';
		$query = $this->db->query($sql);
       return $query->result();
	}
	
	function get_listings_by_search($website_id,$cat='',$place='')
		{
			$sql = 'SELECT DISTINCT companies.id,classified_ads.url as imageurl,logos.url as logo,classified_ads.position_id=2,classified_ads.size_id=1,companies.name,companies.address,companies.telephone FROM companies LEFT JOIN classified_ads on classified_ads.company_id=companies.id LEFT JOIN logos on logos.company_id=companies.id';

			$sql .= ' LEFT OUTER JOIN website_company on website_company.company_id=companies.id ';
			$sql .= ' LEFT OUTER JOIN tags on tags.company_id=companies.id ';
			$sql .= ' WHERE website_company.website_id='.$website_id;
			$sql .= ' AND';

			if($place!=''){

				if($cat!=''){
					//$sql .= ' companies.name like "%'.$cat.'%"';
					$sql .= ' tags.name like "%'.$cat.'%"';
					$sql .= ' AND companies.address like "%'.$place.'%" ';
				}
				else
					$sql .= ' companies.address like "%'.$place.'%" ';
			}
			elseif($cat!=''){
				//$sql .= ' companies.name like "%'.$cat.'%"';	
				$sql .= ' tags.name like "%'.$cat.'%"';
			}
			$sql .= ' ORDER BY companies.freelisting ASC,companies.name ASC,companies.search_rank_id ASC LIMIT 250';
			$query = $this->db->query($sql);

			return $query->result();
		}
	
	function get_gov_categories()
	{
		$query = $this->db->query('SELECT id,name FROM categories_government order by name');
        return $query->result();
	}
		
	function get_featured_videos($website_id,$cat_id=0)
	{
		$query = $this->db->query('SELECT companies.website,featured_videos.rank_id,videos.url as url,companies.name FROM featured_videos LEFT JOIN companies on featured_videos.company_id=companies.id LEFT JOIN videos on videos.company_id=companies.id WHERE featured_videos.website_id='.$website_id.' and featured_videos.status_id=1 order by rand() limit 1');
        return $query->result();
	}
	
	function get_classified_ads_bottom($website_id,$cat_id=0)
	{
		$sql = 'SELECT promotions.url,companies.name,companies.website FROM promotions LEFT JOIN companies on promotions.company_id=companies.id'; 
	
		if($cat_id>0){
			$sql .= ' LEFT JOIN category_company_government on category_company_government.company_id=companies.id';
		}
		$sql .= ' WHERE promotions.website_id='.$website_id;
		if($cat_id>0){
			$sql .= ' and category_company_government.category_id='.$cat_id;
		}
		$query = $this->db->query($sql);
        return $query->result();
	}
	
	function dropdown($table,$id=0,$ps=1,$ob=1) 
    {
		$this -> db -> select('id, name');
		$this -> db -> from($table);
		
		if($id!=0)  
		{
			$this -> db -> where('id',$id);
		}
		
		if($ob==0)  
		{
			$this->db->order_by('id');
		}
		else
		{
			$this->db->order_by('name');
		}

		$query = $this -> db -> get();
		
		$dd_data = array();
		if($ps==1) $dd_data[0] = "Please Select";
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}

	function dropdown_province($table,$id=0,$ps=1,$ob=1,$country_id=0) 
    {
		$this -> db -> select('id, name, country_id');
		$this -> db -> from($table);
		
		if($id!=0)  
		{
			$this -> db -> where('id',$id);
		}
		if($country_id!=0)  
		{
			$this -> db -> where('country_id',$country_id);
		}
		
		if($ob==0)  
		{
			$this->db->order_by('id');
		}
		else
		{
			$this->db->order_by('name');
		}

		$query = $this -> db -> get();
		
		$dd_data = array();
		if($ps==1) $dd_data[0] = "Please Select";
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}
		
	function dropdown_cities($table,$id=0,$ps=1,$ob=1) 
    {
		$this -> db -> select('id, name');
		$this -> db -> from($table);
		
		if($id!=0)  
		{
			$this -> db -> where('id',$id);
		}
		
		$this->db->where_in('province_id', array('3238','3239','3240','3241','3242','3243','3244','3245','3246','3247','3248','3249','3250','3251'));
		
		if($ob==0)  
		{
			$this->db->order_by('id');
		}
		else
		{
			$this->db->order_by('name');
		}

		$query = $this -> db -> get();
		
		$dd_data = array();
		if($ps==1) $dd_data[0] = "Please Select";
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}
	
	function get_city_name($id) {
        $query = $this->db->query('SELECT name FROM cities WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	
	function find_ip_details(){
		$xfwd     = $this->mm_strip($_SERVER["HTTP_X_FORWARDED_FOR"]); 
		$address  = $this->mm_strip($_SERVER["REMOTE_ADDR"]); 
		$port     = $this->mm_strip($_SERVER["REMOTE_PORT"]); 
		$method   = $this->mm_strip($_SERVER["REQUEST_METHOD"]); 
		$protocol = $this->mm_strip($_SERVER["SERVER_PROTOCOL"]); 
		$agent    = $this->mm_strip($_SERVER["HTTP_USER_AGENT"]); 
		
		if ($xfwd !== '') {
			$IP = $xfwd;
			$proxy = $address;
			$host = @gethostbyaddr($xfwd);
		} else {
			$IP = $address;
			$host = @gethostbyaddr($address);
		}
		return $IP;
	}
	
	function get_ip_info($ip, $purpose = "location", $deep_detect = TRUE) {
		$output = NULL;
		$purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
		$support    = array("country", "countrycode", "state", "region", "city", "location", "address");
		$continents = array(
			"AF" => "Africa",
			"AN" => "Antarctica",
			"AS" => "Asia",
			"EU" => "Europe",
			"OC" => "Australia (Oceania)",
			"NA" => "North America",
			"SA" => "South America"
		);
			//$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			$url = "http://www.geoplugin.net/json.gp?ip=" . $ip;
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$ipdat = @json_decode($response); 
			
			if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
				switch ($purpose) {
					case "location":
						$output = array(
							"city"           => @$ipdat->geoplugin_city,
							"state"          => @$ipdat->geoplugin_regionName,
							"country"        => @$ipdat->geoplugin_countryName,
							"country_code"   => @$ipdat->geoplugin_countryCode,
							"continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
							"continent_code" => @$ipdat->geoplugin_continentCode
						);
						 break;
					case "address":
						$address = array($ipdat->geoplugin_countryName);
						if (@strlen($ipdat->geoplugin_regionName) >= 1)
							$address[] = $ipdat->geoplugin_regionName;
						if (@strlen($ipdat->geoplugin_city) >= 1)
							$address[] = $ipdat->geoplugin_city;
						$output = implode(", ", array_reverse($address));
						break;
					case "city":
						$output = @$ipdat->geoplugin_city;
						break;
					case "state":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "region":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "country":
						$output = @$ipdat->geoplugin_countryName;
						break;
					case "countrycode":
						$output = @$ipdat->geoplugin_countryCode;
						break;
				}
			}
		return $output;
	}
	
	function mm_strip($string) {
			$string = trim($string); 
			$string = strip_tags($string);
			$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
			$string = str_replace("\n", "", $string);
			$string = trim($string); 
			return $string;
		}

		function send_email($to, $subject, $message, $attachments=false, $debug=false) {
		$this->load->library('email');
			$config['config'] =  array(
			'protocol' => "smtp",
			'smtp_port' => "25",
			'host' => "smtp.adslive.co.za",
			'from' => "info@adslive.co.za",
			'from_name' => "Government Directory South Africa",
			'user' => "nick@adslive.co.za",
			'password' => "Qwerty500"
		);

		$email_config = $config['config']; 
		
		if(strlen($email_config['to_override'])>0) {
			$to = $email_config['to_override'];
		}
		
		if($email_config['protocol']=="smtp") {
			$config['protocol'] = "smtp";
			$config['smtp_host'] = $email_config['host'];
			$config['smtp_user'] = $email_config['user'];
			$config['smtp_pass'] = $email_config['password']; 
		} else {
			$config['protocol'] = $email_config['protocol'];
		}

		$config['mailtype'] = "html";
		$config['wordwrap'] = true;
		$this->email->initialize($config);
		$this->email->from($email_config['from'], $email_config['from_name']);
		$this->email->message($message);
		$this->email->subject($subject); 
		$this->email->to($to);//$to 
		$this->email->bcc('do_not_reply@dotcomholdings.co.za');//do_not_reply@dotcomholdings.co.za
		$this->email->send();
		return true;
	}

	function client_send_email($to, $client_subject, $client_message, $attachments=false, $debug=false) {
		$this->load->library('email');
		$config['config'] =  array(
			'protocol' => "smtp",
			'smtp_port' => "25",
			'host' => "smtp.adslive.co.za",
			'from' => "info@adslive.co.za",
			'from_name' => "Government Directory South Africa",
			'user' => "nick@adslive.co.za",
			'password' => "Qwerty500"
			/*'host' => "smtp.sendalytic.com",
			'from' => "info@adslive.co.za",
			'from_name' => "Lesotho Government Directory",
			'user' => "Shane29619",
			'password' => "aH9dkwoUPhTKYvX9eQNeCT0t6Syy05DG"*/
		);

		$email_config = $config['config']; 
		
		if(strlen($email_config['to_override'])>0) {
			$to = $email_config['to_override'];
		}
		
		if($email_config['protocol']=="smtp") {
			$config['protocol'] = "smtp";
			$config['smtp_host'] = $email_config['host'];
			$config['smtp_user'] = $email_config['user'];
			$config['smtp_pass'] = $email_config['password']; 
		} else {
			$config['protocol'] = $email_config['protocol'];
		}

		$config['mailtype'] = "html";
		$config['wordwrap'] = true;
		$this->email->initialize($config);
		$this->email->from($email_config['from'], $email_config['from_name']);
		$this->email->message($client_message);
		$this->email->subject($client_subject); 
		$this->email->to($to);
		$this->email->bcc('lucky@adslive.co.za');
		$this->email->send();
		return true;
	}
	
function create_listing() {
		 $address = $this->input->post('address');
		 $paddress = $this->input->post('paddress');
		 $address = ucwords(strtolower($address));
		 $paddress = ucwords(strtolower($paddress));
	 	 $data = array(
			'name'=>$this->input->post('name'),
			'address'=>$address,
			'paddress'=>$paddress,
			'telephone'=>$this->input->post('telephone'),
			'mobile'=>$this->input->post('mobile'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email'),
			'website'=>$this->input->post('website'),
			'about_us'=>$this->input->post('about_us'),
			'status'=>0,
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'country_id'=>COUNTRY_ID,
			'province_id'=>$this->input->post('province_id'),
			'freelisting'=>1,
		);
		
	 	$res = $this->db->insert('companies', $data);
		$id = $this->db->insert_id();


		//category
		$category = array(
			'company_id'=>$id,
			'category_id'=>$this->input->post('category_id')
		);
		$this->db->where('company_id', $id);
		$this->db->where('category_id', $this->input->post('category_id'));
		$query = $this->db->get('category_company_government');
		if ($query->num_rows() > 0){
			$this->db->where('company_id', $id);
			$this->db->where('category_id', $this->input->post('category_id'));
			$this->db->update('category_company_government', $category);
		}
		else{
			$this->db->insert('category_company_government', $category);
		}

		//website
		$website = array(
				'company_id'=>$id,
				'website_id'=>WEBSITE_ID
			);
		$this->db->where('company_id', $id);
		$this->db->where('website_id', WEBSITE_ID);
		$query = $this->db->get('website_company');
		if ($query->num_rows() > 0){
			$this->db->where('company_id', $id);
			$this->db->where('website_id', WEBSITE_ID);
			$this->db->update('website_company', $website);
		}
		else{
			$this->db->insert('website_company', $website);
		}
		
		//tags
		$category = array(
				'company_id'=>$id,
				'name'=>$this->input->post('name')
			);
		$this->db->where('company_id', $id);
		$this->db->where('name', $this->input->post('name'));
		$query = $this->db->get('tags');
		if ($query->num_rows() > 0){
			$this->db->where('company_id', $id);
			$this->db->where('name', $this->input->post('name'));
			$this->db->update('tags', $category);
		}
		else{
			$this->db->insert('tags', $category);
		}
		
		return $id;
	}
	
	function insert_id_relations_to_old($id,$cdn_id,$old_id,$name){
		$data = array(
			'current_id'=>$id,
			'cdn_id'=>$cdn_id,
			'old_id'=>$old_id,
			'name'=>$name
		);
		
	 	$res = $this->db->insert('id_relations_to_old', $data);
		return $this->db->insert_id();
	}
	
	function get_id_relations_to_old($id){
        $query = $this->db->query('SELECT * FROM id_relations_to_old WHERE current_id='.$id);
        return $query->result();
	}
	
	function get_category_name($id) {
        $query = $this->db->query('SELECT name FROM categories WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	
	function get_gov_category_name($id) {
        $query = $this->db->query('SELECT name FROM categories_government WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	
	function get_old_category_id($name) {
		$CI = &get_instance();
		$this->db3 = $CI->load->database('old', TRUE);
        $query = $this->db3->query('SELECT id FROM categories WHERE name like "%'.$id.'%"');
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	
	function get_location_id($name) {
        $query = $this->db->query('SELECT id FROM locations WHERE name like "'.$name.'"');
		foreach($query->result_array() as $row) {
			$item = $row['id'];
		}
        return $item;
	}
	
	function get_logos($id){
        $query = $this->db->query('SELECT * FROM logos WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_viewpage_banners($id){
        $query = $this->db->query('SELECT * FROM viewpage_banners WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_classified_banners($id){
        $query = $this->db->query('SELECT * FROM classified_banners WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_adverts($id){
        $query = $this->db->query('SELECT * FROM adverts WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_profiles($id){
        $query = $this->db->query('SELECT * FROM profiles WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_videos($id){
        $query = $this->db->query('SELECT * FROM videos WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_promotions($id){
        $query = $this->db->query('SELECT * FROM promotions WHERE entry_id='.$id);
        return $query->result();
	}
	
	function get_gallery($id){
        $query = $this->db->query('SELECT * FROM galleries WHERE entry_id='.$id);
        return $query->result();
	}
	
	function write_image_to_file($filename,$role,$entry_id=0){
		$data = array(
			'url'=>$filename,
			'entry_id'=>$entry_id
		);
		$this->db->where('url', $filename);
		$this->db->where('entry_id', $entry_id);
		$query = $this->db->get($role);
		if ($query->num_rows() > 0){
			$this->db->where('url', $filename);
			$this->db->where('entry_id', $entry_id);
			$this->db->update($role, $data);
		}
		else{
			$this->db->insert($role, $data);
		}
	}
	
	function delete_image($id,$role, $filename="")
	{
		if($filename==""){
			$this->db->where('id', $id);
			$query = $this->db->get($role);
			$result = $query->result();
			$filename = $result[0]->filename;
		}
		
		$up_path = substr(BASEPATH,0,-7);
		$up_path = $up_path.'uploads/'.$role.'/';
		unlink($up_path.$filename);
		
		$this->db->where('id', $id);
		$this->db->delete($role);
		
		//clean up db
		$this->db->where('id', 0);
		$this->db->where('url', $filename);
		$this->db->delete($role);
		
		return;
	}
	
	function get_checkboxes($table,$id=0) 
    {
		$this -> db -> select('id, name');
		$this -> db -> from($table);
		
		if($id!=0)  
		{
			$this -> db -> where('id',$id);
		}
		
		$this->db->order_by('name');

		$query = $this -> db -> get();
		
		$dd_data = array();
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}
	
	function dropdown_categories() 
    {
		$sql = "SELECT id, concat('Category ',id,': Response Time: ',response_time,' hrs, Resolution Time: ',resolution_time,' hrs') as name FROM categories";
		
		$query = $this->db->query($sql);
		
		$dd_data = array();
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}

	function dropdown_admin_users()  
    {
		$sql = "SELECT id,name FROM users WHERE user_type='A' OR user_type='SA'";
		
		$query = $this->db->query($sql);
		
		$dd_data = array();
		$dd_data[0] = 'Please Select';
		foreach ($query->result_array() as $tablerow) {
  		  $dd_data[$tablerow['id']] = $tablerow['name'];
		}
		return $dd_data;	
	}
	
	
	
	public function get_config($var) {
		if($_SESSION['site_config']) {
			$config = $_SESSION['site_config'];
		} else {
			$config = array();
			$this->db->select('*');
			$query = $this->db->get('config');
			foreach ($query->result_array() as $row) {
				$config[$row['name']] = $row['val'];
			}
			$_SESSION['site_config'] = $config;
		}
		if($var) {
			return $config[$var];
		} else {
			return $config;
		}
	}
	
	public function get_logged_in_id() {
		$logged_in = $this->session->userdata('logged_in');
		return $logged_in['user_id'];
	}
	
	public function user_check() {
		if(!$this->session->userdata('id')) {
			$this->session->set_flashdata('success_message', "Login Required!");
			redirect('admin/home', 'refresh');
			exit; 
		}
	}
	 
	public function get_user($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->users);
	}
	
	function get_user_name($id) {
        $query = $this->db->query('SELECT name FROM users WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$item = $row['name'];
		}
        return $item;
	}
	
	public function get_user_levels()  {
		$query = $this -> db -> select('id, name')
							 -> order_by('id')
							 -> get('user_levels');
		
		return $query->result_array();	
	}
	
	public function get_users_user_levels($id=FALSE, $get_field=FALSE) {
		$logged_in = $this->session->userdata('logged_in');
		if(!$id) {
			$id = $logged_in['user_id'];
		}
		if($get_field=="name" || $get_field=="id") {
			$query = $this->db->select('user_levels.id as user_level_id, user_levels.name')
							  ->where('users.id', $id)
							  ->join('users', 'users.userlevel=user_levels.id')
							  ->get('user_levels');
			$row = $query->row();
			$field_val = $row->$get_field;
			
			return $field_val;
		} else {
			return $this->db->select('user_levels.id as user_level_id, user_levels.name')
							->where('users.id', $id)
							->join('users', 'users.userlevel=user_levels.id')
							->get('user_levels');
		}
	}
	
	public function get_users_by_user_level($user_level_id) {
		$this -> db -> select('user_id, first_name, last_name');
		$this -> db -> from('users');
		$this -> db -> where('users.active', 1);
		if($user_level_id>0) {
			$this -> db -> where('user_level_id', $user_level_id);
			$query = $this -> db -> get();
			
			//echo $this->db->last_query(); exit;
			$return = array();
			foreach ($query->result_array() as $row) {
				$return[$row['user_id']] = $row['first_name']." ".$row['last_name'];
			}
			return $return;
		} else {
			return false;
		}	
	}
	
	public function get_user_level_permissions($user_level_id=FALSE) {
		if($user_level_id==FALSE) {
			$user_levels = $this->get_users_user_levels();
			//echo $this->db->last_query();
			if ($user_levels->num_rows()>= 1) {
				$user_level = $user_levels->row();
				$user_level_id = $user_level->user_level_id;
			} else {
				return false;
			}
		}
		//echo ":".$user_level_id; exit;
		$query = $this->db->select('user_level_permissions.id as user_level_permissions_id, name, value, type')
		                  ->where('user_level_id', $user_level_id)
		                  ->join('permission_rules', 'permission_rules.id=user_level_permissions.rule_id')
		                  ->get('user_level_permissions');
		if ($query->num_rows()>=1) {
			$permissions = array();
			foreach($query->result_array() as $row) {
				$permissions[$row['name']] = array();
				$permissions[$row['name']]['value'] = $row['value'];
				$permissions[$row['name']]['type'] = $row['type'];
				$permissions[$row['name']]['id'] = $row['user_level_permissions_id'];
			}
			return $permissions;
		} else {
			return false;
		}
	}
	
	public function get_clean_permissions($user_level_id=FALSE) {
		if($user_level_id>0) {
			$permissions = $this->get_user_level_permissions($user_level_id);
		} else {
			if($this->permissions==false) {
				$this->permissions = $this->get_user_level_permissions();
			}
			$permissions = $this->permissions;
		}
		$formatted_permissions = array();
		if(is_array($permissions)) {
			foreach($permissions as $key => $val) {
				$name = $key;
				$value = $val['value'];
				$type = $val['type'];
				
				if($type=="boolean") {
					if($value==1) {
						$formatted_permissions[$name] = true;
					} else {
						$formatted_permissions[$name] = false;
					}
				} elseif($type=="static_array") {
					$expl_value = explode(",", $value);
					
					$formatted_permissions[$name] = $expl_value;
				} else {
					$formatted_permissions[$name] = $value;
				}
			}
		}
		return $formatted_permissions;
	}
	
	public function check_rule($rule, $user_level_id=FALSE, $value_check=NULL, $comparison=NULL) {
		if($user_level_id>0) {
			$permissions = $this->get_user_level_permissions($user_level_id);
		} else {
			$permissions = $this->get_user_level_permissions();
		}
		//print_r($permissions); exit;
		if(is_array($permissions)) {
			if(is_array($rule)) { 
				$return = array();
				foreach($rule as $key => $each_rule) {
					$each_rule = trim($each_rule);
					$value = $permissions[$each_rule]['value'];
					$type = $permissions[$each_rule]['type'];
					
					if($type=="boolean" || $value_check!=NULL) {
						if($value_check!=NULL) {
							if($value==$value_check) {
								$return[$each_rule] = true;
							} else {
								$return[$each_rule] = false;
							}
						} else {
							if($value==1) {
								$return[$each_rule] = true;
							} else {
								$return[$each_rule] = false;
							}
						}
					} elseif($type=="static_array") {
						$expl_value = explode(",", $value);
						if($value_check!=NULL) {
							if(is_array($value_check)){
								if($value_check==$expl_value) {
									$return[$each_rule] = true;
								} else {
									$found = false;
									foreach($value_check as $each_val) {
										if(in_array($each_val, $expl_value)) {
											$found = true;
										}
									}
									$return[$each_rule] = $return;
								}
							} else {
								if(in_array($value_check, $expl_value)) {
									$return[$each_rule] = true;
								} else {
									$return[$each_rule] = false;
								}
							}
						} else {
							$return[$each_rule] = $expl_value;
						}
					} else {
						$return[$each_rule] = $value;
					}
				}
				if($comparison=="and" || $comparison=="or") {
					if($comparison=="and") {
						$and_return = true;
						foreach($return as $each_return) {
							if($each_return!=true) {
								$and_return = false;
							}
						}
						return $and_return;
					} elseif($comparison=="or") {

						$or_return = false;
						foreach($return as $each_return) {
							if($each_return==true) {
								$or_return = true;
							}
						}
						return $or_return;
					}
				} else {
					return $return;
				}
			} else {
				$value = $permissions[trim($rule)]['value'];
				$type = $permissions[trim($rule)]['type'];
				
				if($type=="boolean" || $value_check!=NULL) {
					if($value_check!=NULL) {
						if($value==$value_check) {
							return true;
						} else {
							return false;
						}
					} else {
						if($value==1) {
							return true;
						} else {
							return false;
						}
					}
				} elseif($type=="static_array") {
					$expl_value = explode(",", $value);
					if($value_check!=NULL) {
						if(is_array($value_check)){
							if($value_check==$expl_value) {
								return true;
							} else {
								$return = false;
								foreach($value_check as $each_val) {
									if(in_array($each_val, $expl_value)) {
										$return = true;
									}
								}
								return $return;
							}
						} else {
							if(in_array($value_check, $expl_value)) {
								return true;
							} else {
								return false;
							}
						}
					} else {
						return $expl_value;
					}
				} else {
					return $value;
				}
			}
		} else {
			return false;
		}
	}
	
	public function check_rules($rules, $and_or='or', $value=true, $user_level_id=0) {
		if(!is_array($rules)) {
			$temp_rules = array();
			$expl_rules = explode(',', str_replace(' ', '', $rules));
			foreach($expl_rules as $each_rule) {
				if(strlen($each_rule)>0) {
					$temp_rules[] = trim($each_rule);
				}
			}
			if(count($temp_rules)>1) {
				$rules = $temp_rules;
			} else {
				echo "Invalid use of multiple rule check function. First arguement must be an array or comma-separated string of 2 or more rules.";
				exit;
			}
		} elseif(count($rules)<2) {
			echo "Invalid use of multiple rule check function. First arguement must be an array or comma-separated string of 2 or more rules.";
			exit;
		}
		
		if($value!=true && $value!=false) {
			echo "Invalid use of multiple rule check function. Only true or false accepted for third arguement.";
			exit;
		} elseif($value==true) {
			$value = NULL;
		}
		
		if($user_level_id===0 || $user_level_id>0) {
		} else {
			echo "Invalid use of multiple rule check function. Only numeric user level id accepted for fourth arguement.";
			exit;
		}
		
		if(strtolower($and_or)=="and" || strtolower($and_or)=="or") {
			return $this->check_rule($rules, $user_level_id, $value, strtolower($and_or));
		} else {
			echo "Invalid use of multiple rule check function. Only 'and' or 'or' accepted for second arguement.";
			exit;
		}
	}
	
	public function check_user_access($user_id, $user_level_id=FALSE) {
		$permissions = $this->get_clean_permissions();
		if($user_level_id>0) {
			$user_user_level = $user_level_id;
		} else {
			$user_user_level = $this->get_users_user_levels($user_id, 'id');
		}
		//echo $user_user_level."<br />"; print_r($permissions['user_level_access']); exit;
		if(in_array($user_user_level, $permissions['user_level_access'])) {
			return true;
		} else {
			return false;
		}
	}
	
	public function check_user_level_access($user_level_id, $user_id) {
		$permissions = $this->get_clean_permissions($user_level_id);
		$user_user_level = $this->get_users_user_levels($user_id, 'id');
		
		if(in_array($user_user_level, $permissions['user_level_access'])) {
			return true;
		} else {
			return false;
		}
	}
	
	public function get_user_level_access($user_level_id=false, $user_id=false) {
		if($user_level_id>0) {
		} else {
			$logged_in = $this->session->userdata('logged_in');
			$user_level_id = $logged_in['userlevel'];
		}
		if($user_id>0) {
			$user_user_level = $this->get_users_user_levels($user_id, 'id');
			$permissions = $this->get_clean_permissions($user_level_id);
		} else {
			$permissions = $this->get_clean_permissions($user_level_id);
		}
		
		$user_levels_access = $permissions['user_level_access'];
		
		$query = $this->db->select('id, name')
		                  ->where_in('id', $user_levels_access)
		                  ->order_by('id', 'DESC')
		                  ->get('user_levels');
		$user_levels = array();
		foreach($query->result_array() as $row) {
			$user_levels[$row['id']] = $row['name'];
		}
		
		return $user_levels;
	}
	
	public function rebuild_permissions($return=FALSE) {
		$debug = true;
		$debug_return = "";
		
		if($debug==true) {
			$debug_return .= "<br /><br />&lt;REBUILD PERMISSIONS DEBUG&gt;";
		}
		
		$types = array(
			'static_array',
			'boolean'
		);
		$default_type = 'boolean';
		
		$default_values = array(
			'static_array' => '',
			'boolean' => 0
		);
		$permission_rules = array();
		$config_rules = $this->config->item('permission_rules');
		foreach($config_rules as $cat => $each) {
			foreach($each as $key => $val) {
				$permission_rules[$key] = $val;
			}
		}
		
		$query = "SELECT * FROM permission_rules ORDER BY id";
		$current_permission_rules_results = mysql_query($query);
		
		$current_permission_rules = array();
		while($row = mysql_fetch_array($current_permission_rules_results)) {
			$current_permission_rules[$row['id']] = array();
			foreach($row as $key => $val) {
				if(!is_numeric($key)) {
					$current_permission_rules[$row['id']][$key] = $val;
				}
			}
		}
		
		$query = "SELECT * FROM user_level_permissions ORDER BY id";
		$current_user_level_permissions_results = mysql_query($query);
		
		$current_user_level_permissions = array();
		while($row = mysql_fetch_array($current_user_level_permissions_results)) {
			$current_user_level_permissions[$row['id']] = array();
			foreach($row as $key => $val) {
				if(!is_numeric($key)) {
					$current_user_level_permissions[$row['id']][$key] = $val;
				}
			}
		}
		
		$new_id = 0;
		$rules_array = array();
		$id_match = array();
		foreach($permission_rules as $name => $type) {
			$new_id += 1;
			if(in_array($type, $types) && strlen($type)>0) {
			} else {
				$type = $default_type;
			}
			$rules_array[] = array(
				'id' => $new_id,
				'name' => $name,
				'type' => $type,
				'default_value' => $default_values[$type] 
			);
			$id_match[$name] = array('new_id' => $new_id);
		}
		
		foreach($current_permission_rules as $old_id => $each_rule) {
			$id_match[$each_rule['name']]['old_id'] = $old_id;
		}
		
		$cross_reference = array();
		foreach($id_match as $name => $each_match) {
			if($each_match['old_id']>0) {
				$cross_reference[$each_match['old_id']] = $each_match['new_id'];
			}
		}
		
		$permissions_array = array();
		foreach($current_user_level_permissions as $key => $each_permission) {
			$permissions_array[] = array(
				'user_level_id' => $each_permission['user_level_id'],
				'rule_id' => $cross_reference[$each_permission['rule_id']],
				'value' => $each_permission['value']
			);
		}
		
		if($debug==true) {
			$arrays = array(
				'types',
				'default_values',
				'permission_rules',
				'current_permission_rules',
				'current_user_level_permissions',
				'rules_array',
				'id_match',
				'cross_reference',
				'permissions_array'
			);
			foreach($arrays as $each_array) {
				$debug_return .= "
				<h1>".$each_array."</h1>
				<pre>
					".print_r(${$each_array}, true)."
				</pre>
				<br />
				";
			}
			$debug_return .= "<br /><br />";
		}
		
		$query = "TRUNCATE TABLE permission_rules";
		mysql_query($query);
		$query = "TRUNCATE TABLE user_level_permissions";
		mysql_query($query);
		
		foreach($rules_array as $each_rule) {
			$keys = "";
			$values = "";
			foreach($each_rule as $each_field => $each_value) {
				$keys .= $each_field.",";
				$values .= "'".mysql_real_escape_string($each_value)."',";
			}
			$keys = substr($keys, 0, strlen($keys)-1);
			$values = substr($values, 0, strlen($values)-1);
			$query = "INSERT INTO permission_rules(".$keys.") VALUES(".$values.")";
			if($debug==true) {
				$debug_return .= $query ."<br />";
			}
			mysql_query($query);
		}
		if($debug==true) {
			$debug_return .= "<br /><br />";
		}
		foreach($permissions_array as $each_permission) {
			$keys = "";
			$values = "";
			$cont = true;
			foreach($each_permission as $each_field => $each_value) {
				$keys .= $each_field.",";
				$values .= "'".mysql_real_escape_string($each_value)."',";
				if($each_value!=0) {
				} else {
					$cont = false;
				}
			}
			$keys = substr($keys, 0, strlen($keys)-1);
			$values = substr($values, 0, strlen($values)-1);
			if($cont==true) {
				$query = "INSERT INTO user_level_permissions(".$keys.") VALUES(".$values.")";
				if($debug==true) {
					$debug_return .= $query."<br />";
				}
			}
			mysql_query($query);
		}
		if($debug==true) {
			$debug_return .= "<br /><br />&lt;END OF DEBUG&gt;";
		}
		
		if($return==true) {
			return $debug_return;
		} else {
			return true;
		}
	}

	public function get_users_by_rule($rule, $condition=FALSE) {
		if(!is_array($rule)) {
			$rule = explode(",", $rule);
		} else {
		}
		
		$extra_tables = array(
			'store_access' => 'store_access.user_id=users.id',
			'warehouses' => 'store_access.store_id=warehouses.id'
		);
		$incl_extra_tables = array();
		
		if(is_array($rule) && count($rule)>0) {
			$rule_where_or = array();
			
			if($condition) {
				if(is_array($condition)) {
					foreach($condition as $table => $each_condition) {
						if(is_array($each_condition)) {
							foreach($each_condition as $key => $each_each_condition) {
								if(is_array($each_each_condition)) {
									foreach($each_each_condition as $val) {
										//$rule_where_or[$table.".".$key] = $val;
										$rule_where_or[] = array(
											'key' => $table.".".$key,
											'value' => $val
										);
									}
								} else {
									//$rule_where_or[$table.".".$key] = $each_each_condition;
									$rule_where_or[] = array(
										'key' => $table.".".$key,
										'value' => $each_each_condition
									);
								}
							}
						}
						if(strlen($extra_tables[$table])>0) {
							if(!in_array($table, $incl_extra_tables)) {
								$incl_extra_tables[] = $table;
							}
						}
					}
				}
			}
	
			$this->db->select('users.*');
			$this->db->join('user_level_permissions', 'users.userlevel=user_level_permissions.user_level_id');
			$this->db->join('permission_rules', 'user_level_permissions.rule_id=permission_rules.id');
			foreach($incl_extra_tables as $each_table) {
				$this->db->join($each_table, $extra_tables[$each_table]);
			}
			foreach($rule as $each_rule) {
				$this->db->where("users_groups.group_id IN (SELECT group_permissions.group_id FROM group_permissions, permission_rules WHERE group_permissions.rule_id=permission_rules.id AND permission_rules.name='".mysql_real_escape_string($each_rule)."')");
			}
			if(count($rule_where_or)>0) {
				$or_where = "(";
				foreach($rule_where_or as $each_rule) {
					$or_where .= $each_rule['key']."='".$each_rule['value']."' OR ";
				}
				$or_where = substr($or_where, 0, strlen($or_where)-4).")";
				$this->db->where($or_where);
			}
			$this->db->group_by('users.id');
			$query = $this->db->get('users');
			
			return $query->result_array();
		} else {
			return false;
		}
	}
	
	public function notify($rule, $subject, $message, $condition=FALSE) {
		$notifications = $this->config->item('notifications', 'ion_auth');
		$notifications_config = $notifications['config'];
		
		$emails = array();
		$all_notification_users = $this->get_users_by_rule(array($rule, 'receive_all_notifications'));
		foreach($all_notification_users as $each_user) {
			if(!in_array($each_user['email'], $emails) && strlen($each_user['email'])>0) {
				$emails[] = $each_user['email'];
			}
		}
		
		$owner_users = $this->get_users_by_rule($rule, $condition);
		foreach($owner_users as $each_user) {
			if(!in_array($each_user['email'], $emails) && strlen($each_user['email'])>0) {
				$emails[] = $each_user['email'];
			}
		}
		if(strlen($notifications_config['to_override'])>0 && !in_array($notifications_config['to_override'], $emails)) {
			$emails[] = $notifications_config['to_override'];
		}
		//echo "<br />".$this->db->last_query()."<br /><pre>".print_r($emails, true)."</pre><br />";
		
		if(count($emails)>0 && $notifications_config['enabled']==true) {
			$this->load->library('email');
			
			if($notifications_config['protocol']=="smtp") {
				$config['protocol'] = "smtp";
				$config['smtp_host'] = $notifications_config['host'];
				$config['smtp_user'] = $notifications_config['user'];
				$config['smtp_pass'] = $notifications_config['password']; 
			} else {
				$config['protocol'] = $notifications_config['protocol'];
			}

			$config['mailtype'] = "html";
			$config['wordwrap'] = true;
			$this->email->initialize($config);
			$this->email->from($notifications_config['from'], $notifications_config['from_name']);

			$message = '<html>
	<body >
		<table>
			<tr>
				<td>
					'.$message.'
				</td>
			</tr>
		</table>
	</body>
</html>';
					   
			$this->email->message($message); 
			foreach($emails as $each_email) {
				$this->email->subject($subject);
				$this->email->to($each_email); 
				$this->email->send();
			}
			if($_GET['debug']==1) {
				echo "<pre>".print_r($emails, true)."</pre>"; exit;
			}
		}
	}
	
	
	public function get_user_level_name($userlevel) {
		$query = $this->db->select('name')
		                  ->where('id', $userlevel)
		                  ->get('user_levels');
		if ($query->num_rows()>=1) {
			foreach($query->result_array() as $row) {
				return $row['name'];
			}
		} else {
			return false;
		}
	}
	
	public function user_level_check($check_user_level, $id=false) {
		$logged_in = $this->session->userdata('logged_in');print_r($logged_in);exit;
		if($logged_in['userlevel']==$check_user_level || $logged_in['userlevel_name']==$check_user_level) {
			return true;
		} else {
			return false;
		}
	}
	
	public function do_header($data, $userlevel=false) {
		if($userlevel==false) {
			$data['logged_in'] = $this->session->userdata('logged_in');
			$userlevel = $data['logged_in']['userlevel_name'];
		} elseif($userlevel>0) {
			$userlevel = $this->common->get_user_level_name($userlevel);
		} elseif($userlevel!=false) {
		}
		$data['permissions'] = $this->common->get_clean_permissions();
		$data['data'] = $data;
		if($userlevel=="Owner" || $userlevel=="Admin") {
			$this->load->view('admin_header', $data);
		} else {
			$this->load->view('header', $data);
		}
	}
	
	public function obj_to_array($obj) {
		if(is_object($obj)) {
			$array = array();
			foreach($obj as $key => $value) {
				$array[$key] = $value;
			}
			return $array;
		} else {
			echo "object conversion error"; exit;
		}
	}
	
	public function get_post($fields) {
		$field_values = array();
		if(is_array($fields)) {
			foreach($fields as $field_name => $field_details) {
				$field_values[$field_name] = $this->input->post($field_name);
			}
			return $field_values;
		} else {
			echo "form post error"; exit;
		}
	}
	
	public function setup_fields($fields, $values=false, $force_values=false) {
		if(is_array($fields)) {
			foreach($fields as $field_name => $field_details) {
				if($field_details['type']!="html") {
					if(!$field_details['title']) {
						$field_details['title'] = ucwords(strtolower(str_replace("_", " ", $field_name)));
						$fields[$field_name]['title'] = $field_details['title'];
					}
					if(!$field_details['id']) {
						$fields[$field_name]['id'] = $field_name;
					}
					if(!$field_details['placeholder']) {
						$fields[$field_name]['placeholder'] = $field_details['title'];
					}
					if(!$field_details['type']) {
						$field_details['type'] = 'text';
						$fields[$field_name]['type'] = $field_details['type'];
					}
					$fields[$field_name]['name'] = $field_name;
					if($field_details['validation']!=false && strlen($field_details['validation'])>0) {
						if($field_details['view_only']==true) {
							$field_details['validation'] = str_replace("|required", "", $field_details['validation']);
							$field_details['validation'] = str_replace("required|", "", $field_details['validation']);
							$field_details['validation'] = str_replace("required", "", $field_details['validation']);
						}
						if($field_details['type']=="multiselect") {
							$this->form_validation->set_rules($field_name."[]", $field_details['title'], $field_details['validation']);
						} else {
							$this->form_validation->set_rules($field_name, $field_details['title'], $field_details['validation']);
							if($field_details['confirm']==true) {
								$this->form_validation->set_rules("confirm_".$field_name, "Confirm ".$field_details['title'], str_replace("matches[confirm_".$field_name."]", "", $field_details['validation']));
							}
						}
					}
					if(($values!=false && is_array($values)) || $force_values==true) {
						if($values[$field_name] || $force_values==true) {
							$fields[$field_name]['value'] = $values[$field_name];
						}
					}
				}
			}
			return $fields;
		} else {
			echo "form configuration error"; exit;
		}
	}
	 
	public function do_input($field) {
		if(strpos($field['validation'], 'required')) {
			$required = "*";
		}
		if($field['type']=="select") {
			if($field['view_only']==true) {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<label class="form-control <?=$field['class'];?>">
							<?
                            foreach($field['options'] as $value => $display) {
                                if($field['value']==$value) {
                                    echo $display;
                        			?>
                                    <input type="hidden" name="<?=$field['name'];?>" id="<?=$field['id'];?>" value="<?=$value;?>" />
									<?
                                }
                            }
							if(strlen($field['after'])>0) {
								echo $field['after'];
							}
							?>
                        </label>
					</div>
				</div>
				<?
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			} else {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<select class="form-control <?=$field['class'];?>" name="<?=$field['name'];?>" id="<?=$field['id'];?>" <?=$field['html'];?>>
							<?
							if($field['please_select']==true || ($field['please_select']=="dynamic" && count($field['options'])>1)) {
								?>
								<option value="" <? if(!$field['value']) { echo "selected"; } ?>><? if($field['please_select_value']) { echo $field['please_select_value']; } else { echo "Please Select"; } ?></option>
								<?
							}
							foreach($field['options'] as $value => $display) {
								?>
								<option value="<?=$value;?>" <? if($field['value']==$value || ($field['default']==$value && !$field['value'])) { echo "selected"; } ?>><?=$display;?></option>
								<?
							}
							?>
						</select>
						<?
						if(strlen($field['after'])>0) {
							echo $field['after'];
						}
						?>
					</div>
				</div>
				<?
            }
        } elseif($field['type']=="multiselect") {
			if($field['view_only']==true) {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<label class="form-control <?=$field['class'];?>">
							<?
                            $count = 0;
                            foreach($field['options'] as $value => $display) {
                                if(is_array($field['value'])) {
                                    if(in_array($value, $field['value'])) {
                                        if($count>0) {
                                            echo "<br />";
                                        }
                                        echo $display;
										?>
										<input type="hidden" name="<?=$field['name'];?>[]" id="<?=$field['id'];?>" value="<?=$value;?>" />
										<?
                                        $count += 1;
                                    }
                                }
                            }
							if(strlen($field['after'])>0) {
								echo $field['after'];
							}
							?>
                        </label>
					</div>
				</div>
				<?
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			} else {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div>
							<table>
								<tr>
									<td align="left" valign="bottom" style="white-space:nowrap;">
										List
									</td>
									<td>
									</td>
									<td align="left" valign="bottom" style="white-space:nowrap;">
										Selected
									</td>
								</tr>
								<tr>
									<td align="right" valign="middle">
										<select class="form-control <?=$field['class'];?>" name="add_<?=$field['name'];?>[]" id="<?=$field['id'];?>_list" multiple="multiple" style="width:200px; height:300px;">
											<?
											foreach($field['options'] as $value => $display) {
												if(is_array($field['value'])) {
													if(!in_array($value, $field['value'])) {
														?>
														<option id="list_opt_<?=$field['id'].'_'.$value;?>" value="<?=$value;?>"><?=$display;?></option>
														<?
													}
												} else {
													?>
													<option id="list_opt_<?=$field['id'].'_'.$value;?>" value="<?=$value;?>"><?=$display;?></option>
													<?
												}
											}
											?>
										</select>
									</td>
									<td align="center" valign="middle">
										<input type="button" class="form-control <?=$field['class'];?>" id="add_<?=$field['id'];?>" value="> >" style="font-weight:bold;" />
										<br />
										<br />
										<input type="button" class="form-control <?=$field['class'];?>" id="remove_<?=$field['id'];?>" value="< <" style="font-weight:bold;" />
									</td>
									<td align="left" valign="middle">
										<select class="form-control <?=$field['class'];?>" name="<?=$field['name'];?>_sel[]" id="<?=$field['id'];?>_sel" multiple="multiple" style="width:200px; height:300px;">
											<?
											$vals = "";
											foreach($field['options'] as $value => $display) {
												if(is_array($field['value'])) {
													if(in_array($value, $field['value'])) {
														?>
														<option id="sel_opt_<?=$field['id'].'_'.$value;?>" value="<?=$value;?>"><?=$display;?></option>
														<?
														$vals .= '<input id="sel_val_'.$field['id'].'_'.$value.'" type="hidden" name="'.$field['name'].'[]" value="'.$value.'" style="display:none;" />';
													}
												}
											}
											$val = substr($val, 0, strlen($val)-1);
											?>
										</select>
										<div id="<?=$field['id'];?>_vals">
											<?=$vals;?>
										</div>
									</td>
								</tr>
							</table>
							<script type="text/javascript">
								$(document).ready(function(e) {
									$('#add_<?=$field['id'];?>').click(function(e) {
										var sel_add = $('#<?=$field['id'];?>_list').val();
										var new_option = "";
										var new_val = "";
										if(sel_add) {
											if(sel_add.length>0) {
												for(i=0;i<sel_add.length;i++) {
													new_option = "<option value='" + sel_add[i] + "' id='sel_opt_<?=$field['id'];?>_" + sel_add[i] + "'>" + $('#list_opt_<?=$field['id'];?>_' + sel_add[i]).html() + "</option>";
													$('#<?=$field['id'];?>_sel').append(new_option);
													$('#list_opt_<?=$field['id'];?>_' + sel_add[i]).remove();
													new_val = "<input id='sel_val_<?=$field['id'];?>_" + sel_add[i] + "' type='checkbox' name='<?=$field['name'];?>[]' value='" + sel_add[i] + "' checked='checked' style='display:none;' />";
													$('#<?=$field['id'];?>_vals').append(new_val);
												}
											}
										}
									});
									
									$('#remove_<?=$field['id'];?>').click(function(e) {
										var sel_add = $('#<?=$field['id'];?>_sel').val();
										var new_option = "";
										if(sel_add) {
											if(sel_add.length>0) {
												for(i=0;i<sel_add.length;i++) {
													new_option = "<option value='" + sel_add[i] + "' id='list_opt_<?=$field['id'];?>_" + sel_add[i] + "'>" + $('#sel_opt_<?=$field['id'];?>_' + sel_add[i]).html() + "</option>";
													$('#<?=$field['id'];?>_list').append(new_option);
													$('#sel_opt_<?=$field['id'];?>_' + sel_add[i]).remove();
													$('#sel_val_<?=$field['id'];?>_' + sel_add[i]).remove();
												}
											}
										}
									});
								});
							</script>
							<?
							if(strlen($field['after'])>0) {
								echo $field['after'];
							}
							?>
						</div>
					</div>
				</div>
				<?
            }
			if(strlen($field['append'])>0) {
				echo $field['append'];
			}
        } elseif($field['type']=="list") {
			if($field['view_only']==true) {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<label class="form-control <?=$field['class'];?>">
							<?
                            $count = 0;
                            if(is_array($field['value'])) {
                                foreach($field['value'] as $value) {
                                    if($count>0) {
                                        echo "<br />";
                                    }
                                    echo $value;
                                    $count += 1;
									?>
									<input type="hidden" name="<?=$field['name'];?>[]" id="<?=$field['id'];?>" value="<?=$value;?>" />
									<?
                                }
                            }
                            if(strlen($field['after'])>0) {
                                echo $field['after'];
                            }
                            ?>
                        </label>
					</div>
				</div>
				<?
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			} else {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div>
							<table>
								<tr>
									<td align="left" valign="bottom" style="white-space:nowrap;">
										<input type="text" name="new_<?=$field['name'];?>" id="new_<?=$field['id'];?>" class="form-control <?=$field['class'];?>" style="width:150px;" placeholder="Enter New Field" />
									</td>
									<td align="left" valign="bottom" style="white-space:nowrap;" width="40">
										<input type="button" name="add_<?=$field['name'];?>" id="add_<?=$field['id'];?>" value="+" title="Add" style="width:34px; height:34px;" />
									</td>
									<td align="left" valign="bottom" style="white-space:nowrap;" width="40">
										<input type="button" name="remove_<?=$field['name'];?>" id="remove_<?=$field['id'];?>" value="X" title="Remove" style="width:34px; height:34px;" />
									</td>
								</tr>
								<tr>
									<td align="left" valign="middle" colspan="3">
										<select class="form-control <?=$field['class'];?>" name="<?=$field['name'];?>_sel[]" id="<?=$field['id'];?>_sel" multiple="multiple" style="width:225px; height:300px;">
											<?
											$vals = "";
											if(is_array($field['value'])) {
												foreach($field['value'] as $value) {
													?>
													<option id="sel_opt_<?=$field['id'].'_'.$value;?>" value="<?=$value;?>"><?=$value;?></option>
													<?
													$vals .= '<input id="sel_val_'.$field['id'].'_'.$value.'" type="hidden" name="'.$field['name'].'[]" value="'.$value.'" style="display:none;" />';
												}
											}
											$val = substr($val, 0, strlen($val)-1);
											?>
										</select>
										<div id="<?=$field['id'];?>_vals">
											<?=$vals;?>
										</div>
									</td>
								</tr>
							</table>
							<script type="text/javascript">
								$(document).ready(function(e) {
									$('#add_<?=$field['id'];?>').click(function(e) {
										var sel_add = $('#new_<?=$field['id'];?>').val();
										if(sel_add.length>0) {
											var new_option = "";
											var new_val = "";
											new_option = "<option value='" + sel_add + "' id='sel_opt_<?=$field['id'];?>_" + sel_add + "'>" + sel_add + "</option>";
											$('#<?=$field['id'];?>_sel').append(new_option);
											new_val = "<input id='sel_val_<?=$field['id'];?>_" + sel_add + "' type='checkbox' name='<?=$field['name'];?>[]' value='" + sel_add + "' checked='checked' style='display:none;' />";
											$('#<?=$field['id'];?>_vals').append(new_val);
										}
										$('#new_<?=$field['id'];?>').val('').focus();
									});
									
									$('#remove_<?=$field['id'];?>').click(function(e) {
										var sel_add = $('#<?=$field['id'];?>_sel').val();
										if(sel_add) {
											if(sel_add.length>0) {
												for(i=0;i<sel_add.length;i++) {
													$('#sel_opt_<?=$field['id'];?>_' + sel_add[i]).remove();
													$('#sel_val_<?=$field['id'];?>_' + sel_add[i]).remove();
												}
											}
										}
									});
								});
							</script>
							<?
							if(strlen($field['after'])>0) {
								echo $field['after'];
							}
							?>
						</div>
					</div>
				</div>
				<?
			}
			if(strlen($field['append'])>0) {
				echo $field['append'];
			}
        } elseif($field['type']=="html") {
			echo $field['html'];
        } elseif($field['type']=="none") {
        } elseif($field['type']=="textarea") {
			if($field['view_only']==true) {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<label class="form-control <?=$field['class'];?>"><?=$field['value'];?></label>
						<?
						if(strlen($field['after'])>0) {
							echo $field['after'];
						}
						?>
						<input type="hidden" name="<?=$field['name'];?>" id="<?=$field['id'];?>" value="<?=$value;?>" />
					</div>
				</div>
				<?
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			} else {
				if($field['cols']) {
					$cols = $field['cols'];
				} else {
					$cols = 10;
				}
				if($field['rows']) {
					$rows = $field['rows'];
				} else {
					$rows = 5;
				}
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<textarea rows="<?=$rows;?>" class="form-control <?=$field['class'];?>" name="<?=$field['name'];?>" id="<?=$field['id'];?>"  placeholder="<?=$field['placeholder'];?>" <?=$field['html'];?>><?=$field['value'];?></textarea>
						<?
						if(strlen($field['after'])>0) {
							echo $field['after'];
						}
						?>
					</div>
				</div>
				<?
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			}
        } elseif($field['type']=="radio" || $field['type']=="checkbox") {
            ?>
            <div class="form-group" id="<?=$field['id'];?>_div" <? if($field['unhide']==true) { } else { if($field['hidden']==true && $field['value']!=$field['base_value']) { ?>style="display:none;"<? } } ?>>
                <label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <input class="form-control noicheck <?=$field['class'];?>" name="<?=$field['name'];?>" id="<?=$field['id'];?>" type="<?=$field['type'];?>" placeholder="<?=$field['placeholder'];?>" value="<?=$field['base_value'];?>" <?=$field['html']; if($field['value']==$field['base_value']) { echo "checked"; } ?> <? if($field['view_only']==true) { echo 'disabled'; } ?>  />
                    <?
					if($field['view_only']==true) {
						?>
						<input type="hidden" name="<?=$field['name'];?>" id="<?=$field['id'];?>" value="<?=$field['value'];?>" />
						<?
					}
					if(strlen($field['after'])>0) {
						echo $field['after'];
					}
					?>
                </div>
            </div>
			<?
            if(strlen($field['append'])>0) {
                echo $field['append'];
            }
		} elseif($field['type']=="hidden") {
            ?>
            <input name="<?=$field['name'];?>" id="<?=$field['id'];?>" type="<?=$field['type'];?>" value="<?=$field['value'];?>" <?=$field['html'];?> />
            <?
            if(strlen($field['after'])>0) {
                echo $field['after'];
            }
			if(strlen($field['append'])>0) {
				echo $field['append'];
			}
		} else {
			if($field['view_only']==true) {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<label class="form-control <?=$field['class'];?>"><?=$field['value'];?></label>
						<?
						if(strlen($field['after'])>0) {
							echo $field['after'];
						}
						?>
						<input type="hidden" name="<?=$field['name'];?>" id="<?=$field['id'];?>" value="<?=$field['value'];?>" />
					</div>
				</div>
				<?
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			} else {
				?>
				<div class="form-group">
					<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
					<div class="col-lg-6 col-md-6 col-sm-6">
                    	<? if($field['type']=="date" && 1==2) { ?>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <? } ?>
						<input class="form-control <?=$field['class'];?>" name="<?=$field['name'];?>" id="<?=$field['id'];?>" type="<?=$field['type'];?>" placeholder="<?=$field['placeholder'];?>" value="<?=$field['value'];?>" <?=$field['html'];?> />
						<?
						if(strlen($field['after'])>0) {
							echo $field['after'];
						}
						?>
					</div>
				</div>
				<?
				if($field['confirm']==true) {
					?>
					<div class="form-group">
						<label class="col-sm-4 control-label"><?=$required.$field['title'];?></label>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<input class="form-control <?=$field['class'];?>" name="confirm_<?=$field['name'];?>" id="confirm_<?=$field['id'];?>" type="<?=$field['type'];?>" placeholder="Confirm <?=$field['title'];?>" value="<?=$field['value'];?>" <?=$field['html'];?> />
						</div>
					</div>
					<?
				}
                if(strlen($field['append'])>0) {
                    echo $field['append'];
                }
			}
        }
	}
	
	public function validate_form($fields, $values) {
		return true;
	}
	
	public function get_users() {
		$users = array();
        $query = $this->db->query('SELECT * FROM users WHERE status="1"');
		foreach($query->result_array() as $row) {
			$users[$row['id']] = $row['username'];
		}
        return $users;
	}
	
	public function get_user_levels_ar()  {
		$user_levels = array();
        $query = $this->db->query('SELECT * FROM user_levels');
		foreach($query->result_array() as $row) {
			$user_levels[$row['id']] = $row['name'];
		}
        return $user_levels;
	}

	
	public function get_reports() {
		$reports = array();
        $query = $this->db->query('SELECT * FROM reports WHERE status="1"');
		foreach($query->result_array() as $row) {
			$reports[$row['id']] = $row['name'];
		}
        return $reports;
	}
		
	
	function get_fault_by_reference($ref)
	{
		$query = $this->db->query('SELECT * FROM faults WHERE reference="'.$ref.'"'); 
        return $query->result(); 
	}

	function get_discounts() {
		$discounts = array();
        $query = $this->db->query('SELECT * FROM discounts ORDER BY value ASC');
		foreach($query->result_array() as $row) {
			$discounts[$row['id']] = $row['value'];
		}
		return $discounts;
	}
	
	function get_debit_order_days() {
		$days = array();
        $query = $this->db->query('SELECT * FROM debit_order_days ORDER BY id');
		foreach($query->result_array() as $row) {
			$days[$row['id']] = $row['description'];
		}
        return $days;
	}
	
	
	public function get_provinces() {
		$provinces = array();
        $query = $this->db->query('SELECT * FROM provinces ORDER BY name');
		foreach($query->result_array() as $row) {
			$provinces[$row['id']] = $row['name'];
		}
        return $provinces;
	}
	
	public function get_countries() {
		$provinces = array();
        $query = $this->db->query('SELECT * FROM countries ORDER BY name');
		foreach($query->result_array() as $row) {
			$provinces[$row['id']] = $row['name'];
		}
        return $provinces;
	}
	
	
	public function get_province($id) { 
        $query = $this->db->query('SELECT name FROM provinces WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$result = $row['name'];
		}
        return $result[0];
	}
	
	public function get_country($id) {
        $query = $this->db->query('SELECT name FROM countries WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$result = $row['name'];
		}
        return $result[0];
	}
	
	public function get_name_from_user($id) {
		$tenant = array();
        $query = $this->db->query('SELECT name FROM users WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$name = $row['name'];
		}
        return $name;
	}
	
	public function get_type_from_user($id) {
		$tenant = array();
        $query = $this->db->query('SELECT user_type FROM users WHERE id='.$id);
		foreach($query->result_array() as $row) {
			$name = $row['user_type'];
		}
        return $name;
	}
	
	
	public function get_status_by_id($id) {
        $query = $this->db->query('SELECT name FROM fault_status WHERE id='.$id);
		foreach($query->result_array() as $row) { 
			$fault_types = $row['name'];
		}
        return $fault_types;
	}
	
	
	
	function get_user_reports($user_id=false) {
		if(!$user_id) {
			$logged_in = $this->session->userdata('logged_in');
			$user_id = $logged_in['user_id'];
		}
		$query = $this->db->select('reports.id, reports.name')
						  ->join('report_contractors', 'contractor_users.contractor_id=report_contractors.contractor_id')
						  ->join('reports', 'reports.id=report_contractors.report_id')
						  ->where('contractor_users.user_id', $user_id)
						  ->where('reports.status', 1)
						  ->group_by('reports.id');
		$results = $this->db->get('contractor_users')->result_array();
		$reports = array();
		foreach($results as $row) {
			$reports[$row['id']] = $row['name'];
		}
		
		return $reports;
	}
	
	function get_report_code($report_id) {
		$query = $this->db->select('code')
				 ->where('id', $report_id)
				 ->get('reports');
				 
		$row = $query->row();
		
		return $row->code;
	}
	
	function check_record_exists($table, $column, $value) {
		$query_str = "SELECT * FROM ".$table." WHERE ".$column." = ?";

		$result = $this->db->query($query_str, $value);

		if($result->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function format_number($input){
		$input =  number_format($input,2,'.','');
		$number = explode('.',$input);
		$number[1] = (isset($number[1]))?$number[1]:'';
		$decimal = str_pad($number[1], 2, 0);
			return (float) $number[0].'.'.$decimal;
	}
	
	function format_column_name($column) {
		$column_display_names = array(
			"bank_account_name" => "Account Holder Name"
		);
		if(strlen($column_display_names[$column])>0) {
			$field = $column_display_names[$column];
		} else {
			$field = ucwords(strtolower(str_replace("_", " ", $column)));
		}
		
		return $field;
	}
	
	function format_date_time($datetime, $divider="/") {
		$ret = "";
		if(strlen($datetime)==10) {
			$expl_datetime = explode("-", $datetime);
			$ret = $expl_datetime[2].$divider.$expl_datetime[1].$divider.$expl_datetime[0];
		} else {
			$expl_datetime = explode("-", substr($datetime, 0, 10));
			$ret = $expl_datetime[2].$divider.$expl_datetime[1].$divider.$expl_datetime[0]." ".substr($datetime, 11, strlen($datetime)-11);
		}
		
		return $ret;
	}
	
	function log_change_comment($primary_field, $primary_id, $compare_table, $reference, $comment) {
		$change_data = array(
			'primary_field' => $primary_field,
			'primary_id' => $primary_id,
			'compare_table' => $compare_table,
			'comment' => $comment,
			'user_id' => $this->common->get_logged_in_id(),
			'create_date' => date('Y-m-d H:i:s')
		);
		$this->db->insert('change_log', $change_data);
	}
	
	function log_changes($primary_field, $primary_id, $compare_table, $compare_id_column, $compare_id, $data) {
		if(is_array($data)) {
			$columns = "";
			foreach($data as $column => $value) {
				$columns .= $column.",";
			}
			$columns = substr($columns, 0, strlen($columns)-1);
			$query = "SELECT ".$columns." FROM ".$compare_table." WHERE ".$compare_id_column." = ?";
			$result = $this->db->query($query, $compare_id)->result_array();
			$existing_data = $result[0];
			
			if($compare_table=="tenants") {
				$reference = $this->common->get_tenant_name($compare_id);
				$comment_prefix = "tenant (".$reference.") - ";
			} elseif($compare_table=="members") {
				$reference = $this->common->get_member_name($compare_id);
				$comment_prefix = "Member (".$reference.") - ";
			} elseif($compare_table=="policies") {
				$reference = $this->common->get_policy_number($compare_id);
				$comment_prefix = "Policy (".$reference.") - ";
			}
			
			foreach($data as $column => $value) {
				if($value!=$existing_data[$column]) {
					$display_column = $this->common->format_column_name($column);
					$comment = $comment_prefix.$display_column." changed from [".$existing_data[$column]."] to [".$value."]";
					
					$change_data = array(
						'primary_field' => $primary_field,
						'primary_id' => $primary_id,
						'compare_table' => $compare_table,
						'compare_field' => $compare_id_column,
						'compare_id' => $compare_id,
						'field' => $column,
						'previous_value' => $existing_data[$column],
						'new_value' => $value,
						'reference' => $reference,
						'comment' => $comment,
						'user_id' => $this->common->get_logged_in_id(),
						'create_date' => date('Y-m-d H:i:s')
					);
					$this->db->insert('change_log', $change_data);
				}
			}
		}
	}
	

	
	function addRollover($timestamp, $hoursToAdd, $skipWeekends = true) {
    // Set constants
    $dayStart = 8;
    $dayEnd = 16;

    // For every hour to add
    for($i = 0; $i < $hoursToAdd; $i++)
    {
        // Add the hour
        $timestamp += 3600;

        // If the time is between 1800 and 0800
        if ((date('G', $timestamp) >= $dayEnd && date('i', $timestamp) >= 0 && date('s', $timestamp) > 0) || (date('G', $timestamp) < $dayStart))
        {
            // If on an evening
            if (date('G', $timestamp) >= $dayEnd)
            {
                // Skip to following morning at 08XX
                $timestamp += 3600 * ((24 - date('G', $timestamp)) + $dayStart);
            }
            // If on a morning
            else
            {
                // Skip forward to 08XX
                $timestamp += 3600 * ($dayStart - date('G', $timestamp));
            }
        }

        // If the time is on a weekend
        if ($skipWeekends && (date('N', $timestamp) == 6 || date('N', $timestamp) == 7))
        {
            // Skip to Monday
            $timestamp += 3600 * (24 * (8 - date('N', $timestamp)));
        }
    }

    // Return
    return $timestamp;
	}
	
	function get_ip_address() {  
		  // check for shared internet/ISP IP
		  if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP']))
		   return $_SERVER['HTTP_CLIENT_IP'];
		
		  // check for IPs passing through proxies
		  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		   // check if multiple ips exist in var
			$iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			foreach ($iplist as $ip) {
			 if ($this->validate_ip($ip))
			  return $ip;
			}
		   }
		
		  if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
		   return $_SERVER['HTTP_X_FORWARDED'];
		  if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
		   return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
		  if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
		   return $_SERVER['HTTP_FORWARDED_FOR'];
		  if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
		   return $_SERVER['HTTP_FORWARDED'];
		
		  // return unreliable ip since all else failed
		  return $_SERVER['REMOTE_ADDR'];
		 }
		
		function validate_ip($ip) {
			 if (filter_var($ip, FILTER_VALIDATE_IP, 
								 FILTER_FLAG_IPV4 | 
								 FILTER_FLAG_IPV6 |
								 FILTER_FLAG_NO_PRIV_RANGE | 
								 FILTER_FLAG_NO_RES_RANGE) === false)
				 return false;
			 self::$ip = $ip;
			 return true;
		 }
		 
		 
	  function getcountry()
     {
        $this -> db -> select('*');
        $query = $this -> db -> get('countries');
        return $query->result();
     }

      function getprovince($country_id='')
     {
        $this -> db -> select('provinces.*');
        $this -> db -> where('country_id', $country_id);
		$this -> db -> order_by('name');
        $query = $this -> db -> get('provinces');
        return $query->result();
     }
    
      function getcity($state_id='')
     {
        $this -> db -> select('cities.*');
        $this -> db -> where('province_id', $state_id);
		$this -> db -> order_by('name');
        $query = $this -> db -> get('cities');
        return $query->result();
     }
	 
	 function getgeo($city_id='')
     {
        $this -> db -> select('lat,lon');
        $this -> db -> where('id', $city_id);
        $query = $this -> db -> get('cities');
        $result = $query->result();
		if(!empty($result[0]->lat))
			return $result;
		else {
			$this -> db -> select('lat,lon');
			$this -> db -> where('city', $city_id);
			$query = $this -> db -> get('locations');
			$result = $query->result();
			return $result;
		}
     }
	 
	 		/**
		* Get Latitude/Longitude/Altitude based on an address
		* @param string $address The address for converting into coordinates
		* @return array An array containing Latitude/Longitude/Altitude data
		*/
		public function getCoordinates($address){
			$address = str_replace(' ','+',$address);
		 	$url = 'http://maps.google.com/maps/geo?q=' . $address . '&output=xml&key=AIzaSyDJncu12KqbKmYT2Q7mXtGckMwGtc1T7Ag';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			$data = curl_exec($ch);
			curl_close($ch);
			if ($data){
				$xml = new SimpleXMLElement($data);
				$requestCode = $xml->Response->Status->code;
				if ($requestCode == 200){
				 	//all is ok
				 	$coords = $xml->Response->Placemark->Point->coordinates;
				 	$coords = explode(',',$coords);
				 	if (count($coords) > 1){
				 		if (count($coords) == 3){
						 	return array('lat' => $coords[1], 'long' => $coords[0], 'alt' => $coords[2]);
						} else {
						 	return array('lat' => $coords[1], 'long' => $coords[0], 'alt' => 0);
						}
					}
				}
			}
			//return default data
			return array('lat' => 0, 'long' => 0, 'alt' => 0);
		}
		
		
		
		function stat_clicked_cron() {
    
$CI = &get_instance();
			
$this->db2 = $CI->load->database('db2', TRUE);
echo date('H:i');
if(date('H:i')=='08:44'){
//insert stats clicked classified
$query = $this->db->query('SELECT * FROM website_company Limit 10 ');
		

		foreach($query->result_array() as $row) {
			
			$company_id = $row['company_id'];
			$web_id = $row['website_id'];
			
			//for adverts stats clicked
			for ($x = 0; $x <= 5; $x++) {
				
				echo $company_id."-".$web_id."<br> advert";
				
				$data = array(
			 'company_ad_visited'=>$company_id,
			 'ad_type'=>'advert',
			 'ip'=>'192.168.16.141',
			 'website_id'=>$web_id
		);
	 $res = $this->db2->insert('stats_ad_clicked', $data);
			
			} 
			
			/*
			//for classified adverts stats clicked
			for ($x = 0; $x <= 1; $x++) {
				echo $company_id."-".$web_id."<br> classified";
				
				/*$data = array(
			 //'company_ad_visited=>$company_id,
			 'ad_type'=>'classified',
			 'ip'=>'192.168.16.120',
			 'website_id'=>$web_id
		);
	 $res = $this->db2->insert('stats_ad_clicked', $data);
		*/	
				
				
			//} 
			
			
			//for adverts shown
			//for ($x = 0; $x <= 1; $x++) {
				//echo $company_id."-".$web_id."<br> Shown";
				
			/*$data = array(
			 //'company_ad_shown=>$company_id,
			 'ip'=>'192.168.16.120',
			 'website_id'=>$web_id
			 );
	 $res = $this->db2->insert('stats_ad_shown', $data);
		*/	
				
				
			//} 
	
		}
}



	}	

}
?>
