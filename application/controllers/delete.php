<?php  
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1); 
set_time_limit(0); 
ignore_user_abort(true); 
class delete extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		
	}

	 function index ()
	 {
	$CI = &get_instance();
			
     $this->db2 = $CI->load->database('db2', TRUE);
     $date=date('Y')-2;
		 
		    $company_id =706894  ;
			$web_id = WEBSITE_ID;
			$rand=5;   //rand(8, 12);
			
			for ($x = 1; $x <= $rand; $x++) {
		$d1=strtotime("10:21am October 11 2018");			
			$data = array(
			 'company_ad_visited'=>$company_id,
			 'ad_type'=>'classified',
			 'website_id'=>$web_id,
			 'timestamp'=>date("Y-m-d h:i:sa", $d1)
		);
	 $res = $this->db2->delete('stats_ad_clicked', $data);
	 echo $res."<br/>";	
			} 	 
		
 
	}	 
		 
	 
}
?>