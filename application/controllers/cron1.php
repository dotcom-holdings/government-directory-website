<?php  
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1); 
set_time_limit(0); 
ignore_user_abort(true); 
class Cron_stat1 extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		
	}

	 function index ()
	 {
			$CI = &get_instance();
			$this->db2 = $CI->load->database('db2', TRUE);

			$company_id =706177  ;//$row['company_id'];
			$web_id = WEBSITE_ID;
			
			$rand=rand(8, 12);
			//for adverts stats clicked
			for ($x = 1; $x <= $rand; $x++) {
		$d1=strtotime("10:21am May 11 2018");			
			$data = array(
			 'company_ad_visited'=>$company_id,
			 'ad_type'=>'advert',
			 'ip'=>'192.168.'.rand(),
			 'website_id'=>$web_id
			,'timestamp'=>date("Y-m-d h:i:sa", $d1)
		);
	 $res = $this->db2->insert('stats_ad_clicked', $data);
		
			} 
			$random=rand(10, 15);
			//for classified adverts stats clicked
			for ($x = 1; $x <= $random; $x++) {
		$d=strtotime("10:21am May 11 2018");		
				$data = array(
			 'company_ad_visited'=>$company_id,
			 'ad_type'=>'classified',
			 'ip'=>'192.168'.rand(),
			 'website_id'=>$web_id
		,'timestamp'=>date("Y-m-d h:i:sa", $d)
		);
	 $res = $this->db2->insert('stats_ad_clicked', $data);
		
			} 
			
			$randm=rand(10, 15);
			//for adverts shown
			for ($x = 1; $x <= $randm; $x++) { 
		$d2=strtotime("10:21am May 11 2018");		
			$data = array(
			 'company_ad_shown'=>$company_id,
			 'ip'=>'192.168.'.rand(),
			 'website_id'=>$web_id
		,'timestamp'=>date("Y-m-d h:i:sa", $d2)
			 );
				
	 $this->db2->insert('stats_ads_shown', $data);
			
			} 
		
			 
		 
	 }
}
?>