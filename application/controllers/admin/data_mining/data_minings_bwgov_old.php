<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_minings_bwgov extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->library('http');
		$this->load->library('simple_html_dom');
		$this->load->library('web_browser');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->model('data_mining');
		$this->user_id = $this->session->userdata('id');
    }

    public function index() {
        $arr['page'] = 'data_mining_bwgov';
		//$arr['data_minings_bwgov'] = $this->data_mining->get_all_data_minings_bwgov();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/data_mining/data_minings_list_bwgov',$arr); 
    }
	
	public function get_ajax_data() {
		/* Database connection start */
		$servername = $this->db->hostname;
		$username = $this->db->username;
		$password = $this->db->password;
		$dbname = $this->db->database; 
		
		$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
		
		/* Database connection end */
		// storing  request (ie, get/post) global array to a variable  
		$requestData= $_REQUEST;
		
		
		$columns = array( 
		// datatable column index  => database column name
		    0 => 'id',
			1 =>'name', 
			2 => 'address',
			3 => 'telephone',
			4 => 'email',
			5 => 'updated_by'
			
		);
		
		// getting total number records without any search
		$sql = "SELECT id,name,address,telephone,email,category_id,updated_by ";
		$sql.=" FROM mined_companies_bwgov";
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_bwgov/get_ajax_data: get mined_companies");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		
		
		$sql = "SELECT id,name,address,telephone,email,category_id,updated_by ";
		$sql.=" FROM mined_companies_bwgov WHERE 1=1";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    
				$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";
			
				$sql.=" OR email LIKE '".$requestData['search']['value']."%' )";    
		}
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_bwgov/get_ajax_data: get mined_companies");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_bwgov/get_ajax_data: get mined_companies");
		
		$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = "<a href='".base_url()."admin/data_mining/data_minings_bwgov/manage_data_mining/".$row["id"]."'>".$row["name"]."</a>";
			$nestedData[] = $row["address"];
			$nestedData[] = $row["telephone"];
			$nestedData[] = $row["email"];
			$nestedData[] = $this->common->get_category_name($row["category_id"]);
			$nestedData[] = $this->user->get_user_name($row["updated_by"]);
			$nestedData[] = '<a style="color:red;" href="javascript:void(0);" data-toggle="tooltip" onclick="del('.$row["id"].');" title="Delete"><i class="fa fa-trash-o"></i></a>';
			
			$data[] = $nestedData;
		}
		
		
		
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		
		echo json_encode($json_data);  // send data as json format
    }
	
	public function new_data_mining($next=1) {
		
		$data['category_dd_data'] = $this->common->dropdown('categories',0,0);
		$data['message'] = "";
		$data['success'] = "";
		 
		if($this->input->post('proceed'))
		{
			$category_id = 37;
			$category = $this->common->get_category_name($category_id);
			//store company urls	
			$this->trawl_pages($category);

			//now get from all company pages mined - second links
			$urlArr = $this->data_mining->get_all_companies('bwgov');
			for($x=0;$x<sizeof($urlArr);$x++){
				$co_page = $this->trawl_company_page($urlArr[$x]->url,$category_id,$urlArr[$x]->name,$urlArr[$x]->url_link_id,$urlArr[$x]->gov_type_id);
				//echo '<br>';
			}
			$this->data_mining->url_link_truncate('bwgov');
			
				if($co_page)
				{
					$data['message'] = "You have successfully scraped the data!";
					$data['success'] = "yes";
				}
				else				
				{
					$data['message'] = validation_errors();
					$data['success'] = "no";
				}
		}
		else
		{
        	$data['page'] = 'company';

			$data['category'] = $this->input->post('name');

		}
        
		
		$this->load->view('admin/data_mining/new_data_mining_bwgov',$data);
	}
     
	function trawl_pages($category){
	// Simple HTML DOM tends to leak RAM like
				// a sieve.  Declare what you will need here.
				// Objects are reusable.
				$html = new simple_html_dom();
			
				$url = "http://www.gov.bw/en/Ministries--Authorities";
				$web = new Web_Browser();
				$result = $web->Process($url);
			
				if (!$result["success"])  echo "Error retrieving URL.  " . $result["error"] . "\n";
				else if ($result["response"]["code"] != 200)  echo "Error retrieving URL.  Server returned:  " . $result["response"]["code"] . " " . $result["response"]["meaning"] . "\n";
				else
				{
				//echo "All the URLs:\n";
				$html->load($result["body"]);
				foreach($html->find('div[id=ctl00_MainBodyRegion_divGovLinks]') as $result2)
				{
					foreach ($result2->find('div[class=SubAudienceContainer]') as $result3)
					{
						foreach ($result3->find('a[href]') as $node)
						{
							$this->data_mining->url_link_build($node->href,$category,'bwgov',$node->innertext,0,1);
						}
					}
				}
				foreach($html->find('div[id=ctl00_MainBodyRegion_div1]') as $result2)
				{
					foreach ($result2->find('div[class=SubAudienceContainer]') as $result3)
					{
						foreach ($result3->find('a[href]') as $node)
						{
							$this->data_mining->url_link_build($node->href,$category,'bwgov',$node->innertext,0,2);
						}
					}
				}
				foreach($html->find('div[id=ctl00_MainBodyRegion_div2]') as $result2)
				{
					foreach ($result2->find('div[class=SubAudienceContainer]') as $result3)
					{
						foreach ($result3->find('a[href]') as $node)
						{
							$this->data_mining->url_link_build($node->href,$category,'bwgov',$node->innertext,0,3);
						}
					}
				}
				

				$html->clear(); 
				unset($html);
				flush();

				}
				return 0;
		}
		
		
		function trawl_company_page($url,$category_id,$name,$url_link_id,$gov_type_id){
		
			if($gov_type_id==3)
				$url = ''.$url;
			else
				$url = 'http://www.gov.bw'.$url;
			$html = new simple_html_dom();
		
			$web = new Web_Browser();
			$result = $web->Process($url);

				//organisation
				$html->load($result["body"]);
				switch($gov_type_id){
					case 1:
						$telephone = '';
						$fax = '';
						foreach($html->find('div[class=ExternLobbyServicesArea]') as $result2)
						{
							if (strpos($result2, 'Tel:') !== false) {
								$tel = explode('Tel:',$result2);
								$telephone = substr($tel[1],0,14);
								$telephone = preg_replace('/[^0-9]/', '', ltrim(strip_tags($telephone)));
								$fax1 = explode('Fax:',$tel[1]);
								$fax = preg_replace('/[^0-9]/', '', ltrim(strip_tags($fax1[1])));
							}
						}
						$data = array(
							'name'=>$name,
							'address'=>'',
							'paddress'=>'',
							'telephone'=>$telephone,
							'fax'=>$fax,
							'email'=>'',
							'url'=>$url,
							'gov_type_id'=>$gov_type_id,
							'category_id'=>$category_id,
							'updated_by'=>$this->user_id
						);
	
						$company_id = $this->data_mining->store_company($name,$data,'bwgov',0,$gov_type_id);
					break;
					case 2:
					foreach($html->find('div[class=LobbyRightPreviewText]') as $result2)
					{
						foreach ($result2->find('p') as $node)
						{
							$telephone = str_replace('Toll Free Number ','',ltrim(strip_tags($node->innertext)));
							$telephone = str_replace('TOLL FREE NUMBER- ','',$telephone);
							$telephone = preg_replace('/[^0-9]/', '', ltrim(strip_tags($telephone)));
						}
						$data = array(
							'name'=>$name,
							'address'=>'',
							'paddress'=>'',
							'telephone'=>$telephone,
							'fax'=>'',
							'email'=>'',
							'url'=>$url,
							'gov_type_id'=>$gov_type_id,
							'category_id'=>$category_id,
							'updated_by'=>$this->user_id
						);
	
						$company_id = $this->data_mining->store_company($name,$data,'bwgov',0,$gov_type_id);
					}
					break;
					case 3:
						$data = array(
							'name'=>$name,
							'address'=>'',
							'paddress'=>'',
							'telephone'=>'',
							'fax'=>'',
							'email'=>'',
							'url'=>$url,
							'gov_type_id'=>$gov_type_id,
							'category_id'=>$category_id,
							'updated_by'=>$this->user_id
						);
	
						$company_id = $this->data_mining->store_company($name,$data,'bwgov',0,$gov_type_id);
					
					break;
				}
								
				$html->clear(); 
				unset($html);
				flush();
				return $company_id;
		}
		
		function ajax_check_progress1(){
			$no = $this->data_mining->url_link_check('bwgov');
			echo $no;
		}
		
		function ajax_check_progress2(){
			$no = $this->data_mining->mined_companies_check('bwgov');
			echo $no; 
		}
		
		function getArray($node) { 
			$array = false; 
		
			if ($node->hasAttributes()) { 
				foreach ($node->attributes as $attr) { 
					$array[$attr->nodeName] = $attr->nodeValue; 
				} 
			} 
		
			if ($node->hasChildNodes()) { 
				if ($node->childNodes->length == 1) { 
					$array[$node->firstChild->nodeName] = $node->firstChild->nodeValue; 
				} else { 
					foreach ($node->childNodes as $childNode) { 
						if ($childNode->nodeType != XML_TEXT_NODE) { 
							$array[$childNode->nodeName][] = getArray($childNode); 
						} 
					} 
				} 
			} 
			return $array; 
		} 
		
		function IsNullOrEmptyString($question){
		 
			return (!isset($question) || trim($question)==='');
		 
		}
		 
		function getAddress($latitude,$longitude){
		 
			$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&sensor=false&token=AIzaSyDJncu12KqbKmYT2Q7mXtGckMwGtc1T7Ag";
			 
			$response = file_get_contents($url);
			 
			$json = json_decode($response,TRUE); //set json response to array based
			 
			$address_arr = $json['results'][0]['address_components'];
			 
			$address = "";
			 
			foreach ($address_arr as $arr1){
			 
			if(strcmp($arr1['types'][0],"street_number") == 0){
			 
			$address .= $arr1['long_name']." ";
			 
			continue;
			 
			}
			 
			if(strcmp($arr1['types'][0],"route") == 0){
			 
			$address .= $arr1['long_name'];
			 
			continue;
			 
			}
			 
			if(strcmp($arr1['types'][0],"locality") == 0){
			 
			$city = $arr1['long_name'];
			 
			continue;
			 
			}
			 
			if(strcmp($arr1['types'][0],"administrative_area_level_1") == 0){
			 
			$state = $arr1['long_name'];
			 
			continue;
			 
			}
			 
			if(strcmp($arr1['types'][0],"administrative_area_level_2") == 0){
			 
			$state2 = $arr1['long_name'];
			 
			continue;
			 
			}
			 
			if(strcmp($arr1['types'][0],"postal_code") == 0){
			 
			$zip_code = $arr1['long_name'];
			 
			continue;
			 
			}
			 
			if(strcmp($arr1['types'][0],"country") == 0){
			 
			$country = $arr1['long_name'];
			 
			continue;
			 
			}
			 
			}
			 
			if(!$this->IsNullOrEmptyString($state)){
			 
			$response = array("address"=>$address, "city"=>$city, "state"=>$state, "zipcode"=>$zip_code, "country"=>$country); //level_1 administrative data exist
			 
			}else{
			 
			$response = array("address"=>$address, "city"=>$city, "state"=>$state2, "zipcode"=>$zip_code, "country"=>$country); //level_1 administrative data not exist
			 
			}
			 
			return $response;
		 
		}


   public function manage_data_mining($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		$data['category_dd_data'] = $this->common->dropdown('categories',0,0);
		$this->form_validation->set_rules('name', 'Name', 'trim|xss_filter');
		$this->form_validation->set_rules('address', 'Address', 'trim|xss_filter');
		 
		if($this->input->post('Update'))
		{

			if ($this->form_validation->run() == TRUE)
			{
				if($this->data_mining->update($id,'bwgov'))
				{
					$data['message'] = "You have successfully updated the data_mining";
					$data['success'] = "yes";
				}				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'data_mining';
		if($type=="Update")
		{
			$data_mining = $this->data_mining->get_data_mining($id,'bwgov');
			$data['mined_company'] = $data_mining[0];
			$data['contacts'] = $this->data_mining->get_contacts($id,'bwgov');
			
			$data['categories'] = $this->data_mining->get_categories($id,'bwgov');

		}
		else
		{
			$data['data_mining'] = array();
		}
		$data['province_dd_data'] = $this->common->dropdown('provinces');
        
        $this->load->view('admin/data_mining/manage_data_mining_bwgov',$data);
    }
    
     public function contact_delete($id,$type_id) {
        $this->db->where('id', $type_id);
		$this->db->delete('contact');
		
		redirect('admin/data_mining/data_minings_bwgov/manage_data_mining/'.$id, 'refresh');
    }
    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('data_mining');
		$this->db->where('data_mining_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/data_mining/data_minings_bwgov', 'refresh');
    }   

}

