<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$id=$_GET["id"];

if($id==100)
 {
 	$base=new base();	
    $base->get_ads_shown();	
 }

if($id==101)
 {
 	$base=new base();
	$website_id=$_GET["website_id"];
    $base->get_profile_views_company($website_id);	
 }

if($id==102)
 {
 	$base=new base();
	$website_id=$_GET["website_id"];
    $base->get_advert_views_company($website_id);	
 }

if($id==103)
 {
 	$base=new base();
	$website_id=$_GET["website_id"];
    $base->visits($website_id);	
 }

if($id==104)
 {
 	$base=new base();
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
    $base->get_new_visits($website_id,$month,$year);	
 }

if($id==105)
 {
 	$base=new base();
	$country_id=$_GET["country_id"];
    $base->get_listing_count($country_id);	
 }

if($id==106)
 {
 	$base=new base();
    $base->get_subscribers_count();	
 }

if($id==107)
 {
 	$base=new base();
	$website_id=$_GET["website_id"];
    $base->get_profile_views_company ($website_id);
 }

if($id==108)
 {
 	$base=new base();
	$website_id=$_GET["website_id"];
    $base->browser_ajax_stats($website_id);
 }

if($id==109)
{
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->profile_views3($website_id,$month,$year);
}

if($id==110)
{
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->advert_views2($website_id,$month,$year);
}

if($id==113)
{
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->profile_views4($website_id,$month,$year);
}

if($id==114)
{
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->people_reached1($website_id,$month,$year);
}












if ($id==0) {
  $userid=$_GET["userid"];
  $base=new base();	
  $base->companies($userid);
}


if($id==111)
{
  $company=$_GET["company"];	
  $base=new base();	
  $base->advert_shown($company);

}

if($id==1)
{
  $website_id=$_GET["website_id"];
  $company=$_GET["company"];	
  $base=new base();	
  $base->profile_views($website_id,$company);

}

if($id==2)
{
  $website_id=$_GET["website_id"];
  $company=$_GET["company"];	
  $base=new base();	
  $base->advert_views($website_id,$company);

}

if($id==3)
{
	$website_id=$_GET["website_id"];
	$base=new base();	
    $base->visits($website_id );
}

if($id==4)
{
	$website_id=$_GET["website_id"];
    $month=$_GET["month"]; 
    $year=$_GET["year"];
	$base=new base();	
    $base->new_visits($website_id,$month,$year);
}

if($id==5)
{
	$website_id=$_GET["website_id"];
	$company=$_GET["company"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->advert_views1($website_id,$company,$month,$year);
}

if($id==6)
{
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->visits1($website_id,$month,$year);
}

if($id==7)
{
	$website_id=$_GET["website_id"];
	$company=$_GET["company"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->profile_views1($website_id,$company,$month,$year);
}

if($id==8)
{
	$website_id=$_GET["website_id"];
	$company=$_GET["company"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->people_reached($website_id,$company,$month,$year);
}

if($id==9)
{
	$website_id=$_GET["website_id"];
	$month=$_GET["month"];
	$year=$_GET["year"];
	$base=new base();	
    $base->stat_tracker($website_id,$month,$year);
}

if($id==10)
{
	$website_id=$_GET["website_id"];
	$br=$_GET["br"];
	$base=new base();	
    $base->new_visits1($website_id,$br);
}

if($id==11)
{
	$company=$_GET["company"];
	$base=new base();	
    $base->image($company);
}

if($id==12)
{
	$website_id=$_GET["website_id"];
	$company=$_GET["company"];
	$year=$_GET["year"];
	$base=new base();	
    $base->profile_views2($website_id,$company,$year);
}

if($id==13)
{
	$website_id=$_GET["website_id"];
	$ip=$_GET["ip"];
	$company_ad_visited=$_GET["company_ad_visited"];
	$ad_type=$_GET["ad_type"];
	$timestamp=$_GET["timestamp"];
	$months=$_GET["months"];
	
	$base=new base();	
    $base->add($website_id,$ip,$company_ad_visited,$ad_type,$timestamp,$months);
}

if($id==14)
{
	$website_id=$_GET["website_id"];
	$ip=$_GET["ip"];
	$company_ad_visited=$_GET["company_ad_visited"];
	$ad_type=$_GET["ad_type"];
	$timestamp=$_GET["timestamp"];
	$months=$_GET["months"];
	
	$base=new base();	
    $base->add2($website_id,$ip,$company_ad_visited,$ad_type,$timestamp,$months);
}

if($id==15)
{
	$website_id=$_GET["website_id"];
	$ip=$_GET["ip"];
	$company_ad_visited=$_GET["company_ad_visited"];
	$timestamp=$_GET["timestamp"];
	$months=$_GET["months"];
	
	$base=new base();	
    $base->add3($website_id,$ip,$company_ad_visited,$timestamp,$months);
}






class base
{

	public function db3()
	{
		$conn = new mysqli("dedi11.cpt2.host-h.net", "cdnaddmckm_3", "bBEby9zqsa8", "cdnaddmckm_db3");
		return $conn;
	}
	public function db4()
	{
		$conn = new mysqli("dedi11.cpt2.host-h.net", "cdnaddmckm_4", "rVRsw6jT7G8", "cdnaddmckm_db4");
		return $conn;
	}
	
	
	public function get_ads_shown()
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as advert_shown  FROM stats_ads_shown ");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"advert_shown":"'.$rs["advert_shown"].'",';
			$outp2 .= '"advert_shown":"'  . $rs["advert_shown"] . '",';
			$outp2 .= '"advert_shown":"'. $rs["advert_shown"]     . '"}';
		}
		$outp2 ='{"records2":['.$outp2.']}';

		echo($outp2);
	}
	
	
	
  public function get_profile_views_company($website_id)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE ad_type <> 'advert' and 
		website_id = ".$website_id."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"profile_views":"'.$rs["profile_views"].'",';
			$outp2 .= '"profile_views":"'  . $rs["profile_views"] . '",';
			$outp2 .= '"profile_views":"'. $rs["profile_views"]     . '"}';
		}
		$outp2 ='{"records2":['.$outp2.']}';

		echo($outp2);
	}  
	
 public function get_advert_views_company($website_id)
	{
		$base=new base();	
        $conn2=$base->db4();

	$result2 = $conn2->query("SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id = ".$website_id." AND ad_type = 'advert' ");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"advert_views":"'.$rs["advert_views"].'",';
			$outp2 .= '"advert_views":"'  . $rs["advert_views"] . '",';
			$outp2 .= '"advert_views":"'. $rs["advert_views"]     . '"}';
		}
		$outp2 ='{"records2":['.$outp2.']}';

		echo($outp2);
	}
	
	
	 public function get_new_visits($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

	$result2 = $conn2->query("SELECT COUNT(id) as new_visits FROM stat_tracker WHERE month=".$month." and  year=".$year." and website_id = ".$website_id."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"new_visits":"'.$rs["new_visits"].'",';
			$outp2 .= '"new_visits":"'  . $rs["new_visits"] . '",';
			$outp2 .= '"new_visits":"'. $rs["new_visits"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}
	
	
	
    public function get_listing_count($country_id)
	{
		$base=new base();	
        $conn2=$base->db3();

	$result2 = $conn2->query("SELECT COUNT(id) as counts FROM companies WHERE  country_id = '".$country_id."' ");

		$outp2 = ""; $count1=""; $count="";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			
		$result1 = $conn2->query("SELECT COUNT(id) as counts1 FROM free_listings WHERE  country_id = '".$country_id."' ");	
		while($rs1 = $result1->fetch_array(MYSQLI_ASSOC)) {
			$count1=$rs1["counts1"];
		}
		
	    $count=$count+$rs["counts"];
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"counts":"'.$count.'",';
			$outp2 .= '"counts":"'  .$count. '",';
			$outp2 .= '"counts":"'. $count . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}
	
	
	
	
	 public function get_subscribers_count()
	{
		$base=new base();	
        $conn2=$base->db3();

	$result2 = $conn2->query("SELECT COUNT(id) as counts FROM email_subscribers");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"counts":"'.$rs["counts"].'",';
			$outp2 .= '"counts":"'  . $rs["counts"] . '",';
			$outp2 .= '"counts":"'. $rs["counts"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}	
	
		
   public function browser_ajax_stats($website_id)
	{
		$base=new base();	
        $conn2=$base->db4();

$result2 = $conn2->query("select  DISTINCT browser,count(times_visited) as times_visited,browser_version from stat_tracker where website_id='".$website_id."' GROUP BY browser");
	
		//
		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			
		  $browser=$rs["browser"];
		  if($rs["browser"]=="")
		  {
			$browser="Other";
		  }
			$outp2 .= '{"browser":"'.$browser.'",';
			$outp2 .= '"visits":"'  . $rs["times_visited"] . '",';
			$outp2 .= '"browser_version":"'. $rs["browser_version"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}	
	
	
	
	
	
	
    public function add($website_id,$ip,$company_ad_visited,$ad_type,$timestamp,$months)
	{
	$base=new base();	
    $conn=$base->db4();	

    if($months==1)
	{
	$d=strtotime("10:21am ".$timestamp."");
	$timestamp=date("Y-m-d h:i:sa", $d);
	
	for($i=1;$i<=$ip;$i++)
	{
	$rand=rand(10,20);	
	$ip1="192.65.35.".$rand;	
		
    $result = $conn->query("
INSERT INTO stats_ad_clicked (id, website_id, ip, company_ad_visited, ad_type, timestamp)
VALUES (NULL, '".$website_id."', '".$ip1."', '".$company_ad_visited."', '".$ad_type."', '".$timestamp."');");
		
	}
	

	echo($result);
	}
		
	else if($months==2)
	{
	for($m=1;$m<=12;$m++)
	{
		
	$months=['','January','February','March','April','May','June','July','August','September','October','November','December'];	
		
		
	$d=strtotime("10:21am 1 ".$months[$m]." ".date("Y")."");
	$timestamp=date("Y-m-d h:i:sa", $d);
	
	for($i=1;$i<=$ip;$i++)
	{
	$rand=rand(10,20);	
	$ip1="192.65.35.".$rand;	
		
    $result = $conn->query("
INSERT INTO stats_ad_clicked (id, website_id, ip, company_ad_visited, ad_type, timestamp)
VALUES (NULL, '".$website_id."', '".$ip1."', '".$company_ad_visited."', '".$ad_type."', '".$timestamp."');");
	
	}
		
	 }
	}	
		
	}
	
	
	
	public function add2($website_id,$ip,$company_ad_visited,$ad_type,$timestamp,$months)
	{
	$base=new base();	
    $conn=$base->db4();	

	//ip count
	//months 1=one month  and 2=12 months
		
		
    if($months==1)
	{
	$d=strtotime("10:21am ".$timestamp."");
	$timestamp=date("Y-m-d h:i:sa", $d);	
		
	//$d=strtotime("10:21am ".$timestamp."");
	//$timestamp=date("Y-m-d h:i:sa", $d);
	$day=$timestamp=date("d", $d);
	$month=$timestamp=date("m", $d);
	$year=$timestamp=date("Y", $d);
	
	$date=$year."/".$month."/".$day;	
		
	for($i=1;$i<=$ip;$i++)
	{
	$rand=rand(10,20);	
	$ip1="192.65.35.".$rand;	
			
	$browser=['Chrome','Safari','Firefox','Mozilla'];
	$rand1=rand(0,3);			
	$browser=$browser[$rand1];		
		
	$os=['Linux','Windows XP','Mac OS X','Windows OS'];	
	$rand2=rand(0,3);
	$os=$os[$rand2];
		
	$country=["Angola","Botswana","Congo","Lesotho","Malawi","Mozambique","Namibia","South Africa","Swaziland","Tanzania","Zambia","Zimbabwe"]; 
	$no=rand(0,11);	
	$country=$country[$no];
		
$result = $conn->query("INSERT INTO `cdnaddmckm_db4`.`stat_tracker` (`browser`, `browser_version`, `os`, `device`, `ip`, `date_visited`, `month`, `year`, `page`, `from_page`, `website_id`, `timestamp`, `country`, `company_ad_shown`) VALUES ('".$browser."', '70.0.3538.102', '".$os."', 'PC', '".$ip1."', '0000-00-00', '".$month."', '".date("Y")."', 'page', '/index.php', '".$website_id."', '".$date."', '".$country."', '".$company_ad_visited."');");
		
	}
	

	echo($result);
	}
		
	else if($months==2)
	{
	for($m=1;$m<=12;$m++)
	{
		
	$months=['','January','February','March','April','May','June','July','August','September','October','November','December'];	
	$m1=rand(1,12);	
		
	$d=strtotime("10:21am 1 ".$months[$m1]." ".date("Y")."");
	$timestamp=date("Y-m-d h:i:sa", $d);
	
	//for($i=1;$i<=$ip;$i++)
	//{
//	$d=strtotime("10:21am ".$timestamp."");
//	$timestamp=date("Y-m-d h:i:sa", $d);
	//$day=$timestamp=date("m", $d);
	$day=$timestamp=date("d", $d);
	$month=$m;
	$year=$timestamp=date("Y", $d);
	$date=$year."/".$month."/".$day;	
		
	for($i=1;$i<=$ip;$i++)
	{
	$rand=rand(10,20);	
	$ip1="192.65.35.".$rand;	
			
	$browser=['Chrome','Safari','Firefox','Mozilla'];
	$rand1=rand(0,3);			
	$browser=$browser[$rand1];		
		
	$os=['Linux','Windows XP','Mac OS X','Windows OS'];	
	$rand2=rand(0,3);
	$os=$os[$rand2];
		
		
		
		
	$country=["Angola","Botswana","Congo","Lesotho","Malawi","Mozambique","Namibia","South Africa","Swaziland","Tanzania","Zambia","Zimbabwe"]; 
	$no=rand(0,11);	
	$country=$country[$no];
		
	$result = $conn->query("INSERT INTO `cdnaddmckm_db4`.`stat_tracker` (`browser`, `browser_version`, `os`, `device`, `ip`, `date_visited`, `month`, `year`, `page`, `from_page`, `website_id`, `timestamp`, `country`, `company_ad_shown`) VALUES ('".$browser."', '70.0.3538.102', '".$os."', 'PC', '".$ip1."', '".$timestamp."', '".$month."', '".date("Y")."', 'page', '/index.php', '".$website_id."', '".$date."', '".$country."', '".$company_ad_visited."');");

	//}
		
	 }
	}	
		
	}
		
		
	}
	
	public function add3($website_id,$ip,$company_ad_visited,$timestamp,$months)
	{
	$base=new base();	
    $conn=$base->db4();	

    if($months==1)
	{
	$d=strtotime("10:21am ".$timestamp."");
	$timestamp=date("Y-m-d h:i:sa", $d);	
		
	for($i=1;$i<=$ip;$i++)
	{
	$rand=rand(10,20);	
	$ip1="192.65.35.".$rand;	
			
	$result = $conn->query("INSERT INTO `cdnaddmckm_db4`.`stats_ads_shown` (`company_ad_shown`, `website_id`, `ip`, `timestamp`) VALUES ('".$company_ad_visited."', '".$website_id."', '".$ip1."','".$timestamp."');");

		
	}
	echo($result);
	}
		
	else if($months==2)
	{
	for($m=1;$m<=12;$m++)
	{
		
	$months=['','January','February','March','April','May','June','July','August','September','October','November','December'];	
		
		
	$d=strtotime("10:21am 1 ".$months[$m]." ".date("Y")."");
	$timestamp=date("Y-m-d h:i:sa", $d);
	
	    //  for($i=1;$i<=$ip;$i++)
	    //  {
	//$d=strtotime("10:21am ".$timestamp."");
	//$timestamp=date("Y-m-d h:i:sa", $d);
		
	for($i=1;$i<=$ip;$i++)
	{
	$rand=rand(10,20);	
	$ip1="192.65.35.".$rand;	
			
	$result = $conn->query("INSERT INTO `cdnaddmckm_db4`.`stats_ads_shown` (`company_ad_shown`, `website_id`, `ip`, `timestamp`) VALUES ('".$company_ad_visited."', '".$website_id."', '".$ip1."','".$timestamp."');");

		
	}
		
	     // } 
	}	
		
	}
	}
	
	
	public function names()
	{
		
		$myArr = array("John", "Mary", "Peter", "Sally");

		$myJSON = json_encode($myArr);

		echo $myJSON;
	}
	
	public function people()
	{
		     
       $myObj=(object) array('name'=>'John','age'=>30,'city'=>'New York');
		

		$myJSON = json_encode($myObj);

        echo $myJSON;   
    }	
	
	
	public function companies($userid)
	{
	$base=new base();	
    $conn=$base->db3();	

    $result = $conn->query("SELECT * from companies left join logos on companies.id=logos.company_id where companies.id=".$userid." limit 1");

			$outp = "";
			while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    			if ($outp != "") {$outp .= ",";}
    			$outp .= '{"id":"'  . $rs["id"] . '",';
    			$outp .= '"name":"'  . $rs["name"] . '",';
    			$outp .= '"address":"'  . $rs["address"] . '",';
    			$outp .= '"telephone":"'  . $rs["telephone"] . '",';
    			$outp .= '"url":"'  . $rs["url"] . '",';
    			$outp .= '"status":"'. $rs["status"]     . '"}';
			}
			$outp ='{"records":['.$outp.']}';


			echo($outp);
	}
	
	public function advert_shown($company)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as advert_shown  FROM stats_ads_shown WHERE company_ad_shown =".$company."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
			if ($outp2 != "") {$outp2 .= ",";}
			$outp2 .= '{"advert_shown":"'.$rs["advert_shown"].'",';
			$outp2 .= '"advert_shown":"'  . $rs["advert_shown"] . '",';
			$outp2 .= '"advert_shown":"'. $rs["advert_shown"]     . '"}';
		}
		$outp2 ='{"records2":['.$outp2.']}';

		echo($outp2);
	}
	
//	public function get_ads_shown()
//	{
//		$base=new base();	
//        $conn2=$base->db4();
//
//		$result2 = $conn2->query("SELECT COUNT(id) as advert_shown  FROM stats_ads_shown ");
//
//		$outp2 = "";
//		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
//			if ($outp2 != "") {$outp2 .= ",";}
//			$outp2 .= '{"advert_shown":"'.$rs["advert_shown"].'",';
//			$outp2 .= '"advert_shown":"'  . $rs["advert_shown"] . '",';
//			$outp2 .= '"advert_shown":"'. $rs["advert_shown"]     . '"}';
//		}
//		$outp2 ='{"records2":['.$outp2.']}';
//
//		echo($outp2);
//	}
	
	public function profile_views($website_id,$company)
	{
		$base=new base();	
        $conn2=$base->db4();

			$result2 = $conn2->query("SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id =".$website_id." and company_ad_visited=".$company." and  ad_type <> 'advert'");

			$outp2 = "";
			while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    			if ($outp2 != "") {$outp2 .= ",";}
    			$outp2 .= '{"profile_views":"'.$rs["profile_views"].'",';
    			$outp2 .= '"profile_views":"'  . $rs["profile_views"] . '",';
    			$outp2 .= '"profile_views":"'. $rs["profile_views"]     . '"}';
			}
			$outp2 ='{"records":['.$outp2.']}';

			echo($outp2);
	}
	
	public function advert_views($website_id,$company)
	{
		$base=new base();	
        $conn2=$base->db4();

		$conn2 = new mysqli("dedi11.cpt2.host-h.net", "cdnaddmckm_4", "rVRsw6jT7G8", "cdnaddmckm_db4");

			$result2 = $conn2->query("SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id =".$website_id." and company_ad_visited=".$company." and  ad_type = 'advert'");

			$outp2 = "";
			while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
				if ($outp2 != "") {$outp2 .= ",";}
				$outp2 .= '{"advert_views":"'.$rs["advert_views"].'",';
				$outp2 .= '"advert_views":"'  . $rs["advert_views"] . '",';
				$outp2 .= '"advert_views":"'. $rs["advert_views"]     . '"}';
			}
			$outp2 ='{"records":['.$outp2.']}';

			echo($outp2);
	}
	
	public function visits($website_id)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as visits FROM stat_tracker WHERE website_id =".$website_id."");
		
		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"visits":"'.$rs["visits"].'",';
    		$outp2 .= '"visits":"'  . $rs["visits"] . '",';
    		$outp2 .= '"visits":"'. $rs["visits"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}	
	
	public function new_visits($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as new_visits FROM stat_tracker WHERE website_id =".$website_id." and month=".$month." and  year=".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"new_visits":"'.$rs["new_visits"].'",';
    		$outp2 .= '"new_visits":"'  . $rs["new_visits"] . '",';
    		$outp2 .= '"new_visits":"'. $rs["new_visits"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}	
	
	public function advert_views1($website_id,$company,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id =".$website_id." and company_ad_visited=".$company." and  ad_type = 'advert' and MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"advert_views":"'.$rs["advert_views"].'",';
    		$outp2 .= '"advert_views":"'  . $rs["advert_views"] . '",';
    		$outp2 .= '"advert_views":"'. $rs["advert_views"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';
		echo($outp2);
	}	
	
  	public function advert_views2($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(ip) as advert_views  FROM stats_ad_clicked WHERE website_id =".$website_id." and  ad_type = 'advert' and MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"advert_views":"'.$rs["advert_views"].'",';
    		$outp2 .= '"advert_views":"'  . $rs["advert_views"] . '",';
    		$outp2 .= '"advert_views":"'. $rs["advert_views"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';
		echo($outp2);
	}
	
	public function visits1($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as visits FROM stats_visit WHERE website_id =".$website_id." AND MONTH(timestamp) =".$month." AND YEAR(timestamp) = ".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"visits":"'.$rs["visits"].'",';
    		$outp2 .= '"visits":"'  . $rs["visits"] . '",';
    		$outp2 .= '"visits":"'. $rs["visits"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}	
	
	public function profile_views1($website_id,$company,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id =".$website_id." and company_ad_visited=".$company." and  ad_type <> 'advert' AND MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"profile_views":"'.$rs["profile_views"].'",';
    		$outp2 .= '"profile_views":"'  . $rs["profile_views"] . '",';
    		$outp2 .= '"profile_views":"'. $rs["profile_views"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}	
	
 public function profile_views4($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id =".$website_id."  and  ad_type <> 'advert' AND MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"profile_views":"'.$rs["profile_views"].'",';
    		$outp2 .= '"profile_views":"'  . $rs["profile_views"] . '",';
    		$outp2 .= '"profile_views":"'. $rs["profile_views"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}
	
	public function profile_views3($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$outp2 = "";

		for($i=1;$i<=12;$i++)
		{
			$result2 = $conn2->query("SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id =".$website_id."  and  ad_type <> 'advert' AND MONTH(timestamp) =".$i." AND YEAR(timestamp) = ".$year."");
	
			while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
		
			if($i==1){		
    		$outp2 .= '{"jan":"'.$rs["profile_views"].'" ';
			}
			if($i==2){	
    		$outp2 .= '"feb":"'  . $rs["profile_views"] . '" ';
			}
			if($i==3){	
    		$outp2 .= '"mar":"'  . $rs["profile_views"] . '" ';
			}
    		if($i==4){	
    		$outp2 .= '"apr":"'  . $rs["profile_views"] . '" ';
			}
			if($i==5){	
    		$outp2 .= '"may":"'  . $rs["profile_views"] . '" ';
			}
    		if($i==6){	
    		$outp2 .= '"jun":"'  . $rs["profile_views"] . '" ';
			}
    		if($i==7){	
    		$outp2 .= '"jul":"'  . $rs["profile_views"] . '" ';
			}    
			if($i==8){	
    		$outp2 .= '"aug":"'  . $rs["profile_views"] . '" ';
			}
			if($i==9){	
    		$outp2 .= '"sep":"'  . $rs["profile_views"] . '" ';
			}
			if($i==10){	
    		$outp2 .= '"oct":"'  . $rs["profile_views"] . '" ';
			}
			if($i==11){	
    		$outp2 .= '"nov":"'  . $rs["profile_views"] . '" ';
			}
			if($i==12){
    		$outp2 .= '"dec":"'. $rs["profile_views"]     . '"}';
			}
		}
	
		}
		
		$outp2 ='{"records":['.$outp2.']}';
		echo($outp2);
		}
	
	public function people_reached($website_id,$company,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(ip) as people_reached FROM stats_ads_shown WHERE website_id =".$website_id." and company_ad_shown =".$company." AND MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year."");
        $reach="";
		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
			//$reach=floor($rs["people_reached"]/2);
			$reach=floor($rs["people_reached"]/5);
    		$outp2 .= '{"people_reached":"'.$reach.'",';
    		$outp2 .= '"people_reached":"'  .$reach . '",';
    		$outp2 .= '"people_reached":"'. $reach . '"}';
		}
		
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}
	
	public function people_reached1($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(DISTINCT ip) as people_reached FROM stats_ads_shown WHERE website_id =".$website_id."  AND MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"people_reached":"'.$rs["people_reached"].'",';
    		$outp2 .= '"people_reached":"'  . $rs["people_reached"] . '",';
    		$outp2 .= '"people_reached":"'. $rs["people_reached"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}
	
	public function stat_tracker($website_id,$month,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT country,COUNT(DISTINCT id) as total,COUNT(DISTINCT ip) as total2 from stat_tracker where website_id=".$website_id." and MONTH(timestamp) = ".$month." AND YEAR(timestamp) = ".$year." group by country ");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    	if ($outp2 != "") {$outp2 .= ",";}

		 $c=$rs["country"];	
		 if($c==""){ $c="Other"; } else { $c=$rs["country"]; }
	
		  if($c=="Angola" || $c=="Botswana" || $c=="Congo" || $c=="Lesotho" || $c=="Madagascar" || $c=="Malawi" || $c=="Mauritius" || $c=="Mozambique"
		|| $c=="Namibia" || $c=="Seychelles" || $c=="South Africa" 	|| $c=="Swaziland" 	|| $c=="Tanzania"  || $c=="Zambia"|| $c=="Zimbabwe" )
			{
				$img="flags/".$c.".png";
			}
			else{
				$img="flags/Placeholder_Flag.svg";
			}
			
			$return=$rs["total"]-$rs["total2"];

    		$outp2 .= '{"img":"'.$img.'",';
    		$outp2 .= '"country":"'  . $c . '",';
    		$outp2 .= '"total":"'  . $rs["total"] . '",';
    		$outp2 .= '"total2":"'.$return.'"}';
		}

		$outp2 ='{"records":['.$outp2.']}';
		echo($outp2);
	}
	
	public function new_visits1($website_id,$br)
	{
		$base=new base();	
        $conn2=$base->db4();

		$result2 = $conn2->query("SELECT COUNT(id) as new_visits FROM stat_tracker WHERE browser like '".$br."%' and website_id =".$website_id."");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"new_visits":"'.$rs["new_visits"].'",';
    		$outp2 .= '"new_visits":"'  . $rs["new_visits"] . '",';
    		$outp2 .= '"new_visits":"'. $rs["new_visits"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}
	
	public function image($company)
	{
		$base=new base();	
        $conn2=$base->db3();

		$result2 = $conn2->query("SELECT viewpage_banners.url as image FROM companies LEFT JOIN viewpage_banners on viewpage_banners.company_id=companies.id WHERE companies.id=".$company." limit 1");

		$outp2 = "";
		while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
    		$outp2 .= '{"image":"'.$rs["image"].'",';
    		$outp2 .= '"image":"'  . $rs["image"] . '",';
    		$outp2 .= '"image":"'. $rs["image"]     . '"}';
		}
		$outp2 ='{"records":['.$outp2.']}';

		echo($outp2);
	}

	public function profile_views2($website_id,$company,$year)
	{
		$base=new base();	
        $conn2=$base->db4();

		$outp2 = "";

		for($i=1;$i<=12;$i++)
		{
			$result2 = $conn2->query("SELECT COUNT(id) as profile_views FROM stats_ad_clicked WHERE website_id =".$website_id." and company_ad_visited=".$company." and  ad_type <> 'advert' AND MONTH(timestamp) =".$i." AND YEAR(timestamp) = ".$year."");
	
			while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
    		if ($outp2 != "") {$outp2 .= ",";}
		
			if($i==1){		
    		$outp2 .= '{"jan":"'.$rs["profile_views"].'" ';
			}
			if($i==2){	
    		$outp2 .= '"feb":"'  . $rs["profile_views"] . '" ';
			}
			if($i==3){	
    		$outp2 .= '"mar":"'  . $rs["profile_views"] . '" ';
			}
    		if($i==4){	
    		$outp2 .= '"apr":"'  . $rs["profile_views"] . '" ';
			}
			if($i==5){	
    		$outp2 .= '"may":"'  . $rs["profile_views"] . '" ';
			}
    		if($i==6){	
    		$outp2 .= '"jun":"'  . $rs["profile_views"] . '" ';
			}
    		if($i==7){	
    		$outp2 .= '"jul":"'  . $rs["profile_views"] . '" ';
			}    
			if($i==8){	
    		$outp2 .= '"aug":"'  . $rs["profile_views"] . '" ';
			}
			if($i==9){	
    		$outp2 .= '"sep":"'  . $rs["profile_views"] . '" ';
			}
			if($i==10){	
    		$outp2 .= '"oct":"'  . $rs["profile_views"] . '" ';
			}
			if($i==11){	
    		$outp2 .= '"nov":"'  . $rs["profile_views"] . '" ';
			}
			if($i==12){
    		$outp2 .= '"dec":"'. $rs["profile_views"]     . '"}';
			}
		}
	
		}
		
		$outp2 ='{"records":['.$outp2.']}';
		echo($outp2);
		}
	

}

//$conn->close();
//$conn2->close();

?>
