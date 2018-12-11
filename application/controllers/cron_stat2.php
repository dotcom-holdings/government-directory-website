<?php  
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1); 
set_time_limit(0); 
ignore_user_abort(true); 
class Cron_stat2 extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		
	}

	function index (){ 
		
		$CI = &get_instance();
			
		$this->db2 = $CI->load->database('db2', TRUE);

//africa new visits 
//for ($y = 1; $y <= 30; $y++) 
//			
//	{
		
$query9 = $this->db->query("SELECT id FROM websites where id = ".WEBSITE_ID." ;");
		
		foreach($query9->result_array() as $row10) 
		
		{
			
			$web_id = $row10['id'];
			$rand=rand(15,30);
			for ($x = 1; $x <= $rand; $x++) 
			
		{
				$country[0] = "Zimbabwe";
				$country[1] = "Botswana";
				$country[2] = "Namibia";
				$country[3] = "Lesotho";
				$country[4] = "Swaziland";
				$country[5] = "Zambia";
				$country[6] = "Zimbabwe";
				$country[7] = "South Africa";
				$country[8] = "South Africa";
				$country[9] = "South Africa";
				$country[10] = "Botswana";
				$country[11] = "Botswana";
				$country[12] = "Swaziland";
				$country[13] = "Zambia";
				$country[14] = "Zambia";
				$country[15] = "Lesotho";
				 if($web_id==13){
				$country[16] = "South Africa";
				$country[17] = "South Africa";
				$country[18] = "South Africa";
				$country[19] = "South Africa";}
				elseif($web_id==33){
				$country[16] = "Lesotho";
				$country[17] = "Lesotho";
				$country[18] = "Lesotho";
				$country[19] = "Lesotho";}
				elseif($web_id==34){
				$country[16] = "Swaziland";
				$country[17] = "Swaziland";
				$country[18] = "Swaziland";
				$country[19] = "Swaziland";}
				elseif($web_id==35){
				$country[16] = "Zambia";
				$country[17] = "Zambia";
				$country[18] = "Zambia";
				$country[19] = "Zambia";}
				elseif($web_id==47){
				$country[16] = "Zimbabwe";
				$country[17] = "Zimbabwe";
				$country[18] = "Zimbabwe";
				$country[19] = "Zimbabwe";}
				elseif($web_id==32){
				$country[16] = "Botswana";
				$country[17] = "Botswana";
				$country[18] = "Botswana";
				$country[19] = "Botswana";}
				elseif($web_id==31){
				$country[16] = "Namibia";
				$country[17] = "Namibia";
				$country[18] = "Namibia";
				$country[19] = "Namibia";}
				 
			 	 for ($indexs = 0; $indexs < count($country); $indexs++)
				 {
				
							 $browsers[0] = "Chrome";
							 $browsers[1] = "Firefox";
							 $browsers[2] = "Mozilla";
							 $browsers[3] = "Safari";
							 $browsers[4] = "Mozilla";
							 $browsers[5] = "Chrome";
							 $browsers[6] = "Chrome";
					 		 $browsers[7] = "Chrome";
					 		 $browsers[8] = "Firefox";
					 		 $browsers[9] = "Firefox";
							 for ($index = 0; $index < count($browsers); $index++)
							 	{
		
			    if($browsers[$index]=="Chrome"){$browser_version="45.0.2454.93";}
				elseif($browsers[$index]=="Firefox"){$browser_version="40.1";}
				elseif($browsers[$index]=="Mozilla"){$browser_version="5.0";}
				elseif($browsers[$index]=="Safari"){$browser_version="534.57.2";}
         $d=strtotime("10:21am August 11 2018");	
							 $data = array(
							 'browser'=>$browsers[$index],
							 'browser_version'=>$browser_version,
							 'ip'=>rand(),
							 'month'=>6, //date('m')
							 'year'=>2017, //date('Y')
							 'country'=>$country[$indexs],
							 'website_id'=>$web_id
		 ,'timestamp'=>date("Y-m-d h:i:sa", $d)
				);
				$res = $this->db2->insert('stat_tracker', $data);
				
							  }
				}
    }
			
		}

// revisits  africa
$query2 = $this->db->query("SELECT id FROM websites where id = ".WEBSITE_ID.";");
		

		foreach($query2->result_array() as $row3) {
			
			$web_id = $row3['id'];
			$rand=rand(15,25);
			
			for ($x = 1; $x <= $rand; $x++) {
				
				$country[0] = "Zimbabwe";
				$country[1] = "Botswana";
				$country[2] = "Namibia";
				$country[3] = "Lesotho";
				$country[4] = "Swaziland";
				$country[5] = "Zambia";
				$country[6] = "Zimbabwe";
				$country[7] = "South Africa";
				$country[8] = "South Africa";
				$country[9] = "South Africa";
				$country[10] = "Botswana";
				$country[11] = "Botswana";
				$country[12] = "Swaziland";
				$country[13] = "Zambia";
				$country[14] = "Zambia";
				$country[15] = "Lesotho";
				 if($web_id==13){
				$country[16] = "South Africa";
				$country[17] = "South Africa";
				$country[18] = "South Africa";
				$country[19] = "South Africa";}
				elseif($web_id==33){
				$country[16] = "Lesotho";
				$country[17] = "Lesotho";
				$country[18] = "Lesotho";
				$country[19] = "Lesotho";}
				elseif($web_id==34){
				$country[16] = "Swaziland";
				$country[17] = "Swaziland";
				$country[18] = "Swaziland";
				$country[19] = "Swaziland";}
				elseif($web_id==35){
				$country[16] = "Zambia";
				$country[17] = "Zambia";
				$country[18] = "Zambia";
				$country[19] = "Zambia";}
				elseif($web_id==47){
				$country[16] = "Zimbabwe";
				$country[17] = "Zimbabwe";
				$country[18] = "Zimbabwe";
				$country[19] = "Zimbabwe";}
				elseif($web_id==32){
				$country[16] = "Botswana";
				$country[17] = "Botswana";
				$country[18] = "Botswana";
				$country[19] = "Botswana";}
				elseif($web_id==31){
				$country[16] = "Namibia";
				$country[17] = "Namibia";
				$country[18] = "Namibia";
				$country[19] = "Namibia";}
				 
			for ($indexs = 0; $indexs < count($country); $indexs++)
			{
			$d1=strtotime("10:21am August 11 2018");
				 $data = array
				 (
					 'website_id'=>$web_id,
					 'country'=>$country[$indexs]
					 ,'agent_id'=>708125
					// ,'country'=>'South Africa'
					,'timestamp'=>date("Y-m-d h:i:sa", $d1)
				 );
				
			$res = $this->db2->insert('stats_visit', $data);
			
			 }
			}
			
		}
			
	
	
	}	
	

}
?>