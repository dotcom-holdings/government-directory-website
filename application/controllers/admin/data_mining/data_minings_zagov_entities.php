<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_minings_zagov_entities extends CI_Controller {
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
        $arr['page'] = 'data_mining_zagov_entities';
		//$arr['data_minings_zagov_entities'] = $this->data_mining->get_all_data_minings_zagov_entities();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/data_mining/data_minings_list_zagov_entities',$arr); 
    }
	
	public function spreadsheet_view(){
		$gov_types = $this->data_mining->get_all_gov_types('za');
			foreach($gov_types as $gov_type){
			$data['type']= 'zagov_entities';
			$data['title'] = 'ZA Government Parastatals - '.$gov_type->name;
			$data['company'] = $this->data_mining->get_all_mined_companies('zagov_entities',0,$gov_type->id);
			$this->load->view('admin/mined_companies_spreadsheet_view_no_contacts',$data);
		}
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
		$sql.=" FROM mined_companies_zagov_entities";
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_zagov_entities/get_ajax_data: get mined_companies");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		
		
		$sql = "SELECT id,name,address,telephone,email,category_id,updated_by ";
		$sql.=" FROM mined_companies_zagov_entities WHERE 1=1";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    
				$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";
			
				$sql.=" OR email LIKE '".$requestData['search']['value']."%' )";    
		}
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_zagov_entities/get_ajax_data: get mined_companies");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_zagov_entities/get_ajax_data: get mined_companies");
		
		$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = utf8_encode("<a href='".base_url()."admin/data_mining/data_minings_zagov_entities/manage_data_mining/".$row["id"]."'>".$row["name"]."</a>");
			$nestedData[] = utf8_encode($row["address"]);
			$nestedData[] = utf8_encode($row["telephone"]);
			$nestedData[] = utf8_encode($row["email"]);
			$nestedData[] = utf8_encode($this->common->get_category_name($row["category_id"]));
			$nestedData[] = utf8_encode($this->user->get_user_name($row["updated_by"]));
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
			
			$proxy_url = $this->input->post('proxy_url');
			$proxy_port = $this->input->post('proxy_port');
			$proxy_user = $this->input->post('proxy_user');
			$proxy_pass = $this->input->post('proxy_password');
			//store company urls
			//national
			/*$url = "http://www.govpage.co.za/national-entities.html";
			$url = $this->data_mining->getProxyUrl($url,$proxy_url,$proxy_port,$proxy_user,$proxy_pass);
			$gov_type = 1;	
			$this->trawl_pages($category,$url,$gov_type);
			//provincial
			$url = "http://www.govpage.co.za/provincial-entities.html";
			$url = $this->data_mining->getProxyUrl($url,$proxy_url,$proxy_port,$proxy_user,$proxy_pass);
			$gov_type = 2;	
			$this->trawl_pages($category,$url,$gov_type);
			//local
			$url = "http://www.govpage.co.za/municipal-entities.html";
			$url = $this->data_mining->getProxyUrl($url,$proxy_url,$proxy_port,$proxy_user,$proxy_pass);
			$gov_type = 3;	
			$this->trawl_pages($category,$url,$gov_type);*/

			
			//now get from all company pages mined - second links
			$urlArr = $this->data_mining->get_all_companies('zagov_entities');
			for($x=0;$x<sizeof($urlArr);$x++){
				$url = 'http://www.govpage.co.za'.$urlArr[$x]->url;
				$url = $this->data_mining->getProxyUrl($url,$proxy_url,$proxy_port,$proxy_user,$proxy_pass);
				$co_page = $this->trawl_company_page($url,$category_id,$urlArr[$x]->name,$urlArr[$x]->gov_type_id);
				//echo '<br>';
			}
			
			//$this->data_mining->url_link_truncate('zagov_entities');
			
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
        
		
		$this->load->view('admin/data_mining/new_data_mining_zagov_entities',$data);
	}
     
	function trawl_pages($category,$url,$gov_type){

				$html = new simple_html_dom();

				$html->load($url);

				foreach($html->find('div[id=wsite-content]') as $result2)
				{
					//foreach($result2->find('div[class=wsite-button]') as $result3)
					//{
						foreach ($result2->find('a[href]') as $node)
						{
							$this->data_mining->url_link_build($node->href,$category,'zagov_entities',str_replace('&nbsp;',' ',ltrim(strip_tags($node->innertext))),0,$gov_type);
						}
					//}
				}
				
				$html->clear(); 
				unset($html);
				flush();
				return 0;
		}
		
		
		function trawl_company_page($url,$category_id,$name,$gov_type_id){
		
			$html = new simple_html_dom();
			//$url = 'http://www.govpage.co.za'.$url;
			$html->load($url);

						foreach($html->find('div[id=banner-content]') as $result)
						{
							foreach($result->find('span[class=wsite-headline]') as $node)
							{
								$name = ltrim(strip_tags($node->innertext));
							}
							foreach($result->find('span[class=wsite-headline-paragraph]') as $result2)
							{
								$data = array();
								$data = $result2->parent();
								$data = preg_split('/<br[^>]*>/i', $data);
								$data = str_replace('&nbsp;',' ',$data);								
								
								if(sizeof($data)>5) $loop = 5;
								else $loop = sizeof($data);
								for($x=0;$x<$loop;$x++)
								{
									if ((strpos($data[$x], 'Contact:') !== false)) {
											$telephone = explode(':',ltrim(strip_tags($data[$x])));
											$telephone = ltrim(strip_tags($telephone[1]));
									} 
									elseif ((strpos($data[$x], 'Address:') !== false)||(strpos($data[$x], 'Physical:') !== false)) {
											$address = explode(':',ltrim(strip_tags($data[$x])));
											$address = ltrim(strip_tags($address[1]));
									} 
									elseif ((strpos($data[$x], 'P/Bag:') !== false)||(strpos($data[$x], 'Postal:') !== false)) {
											$paddress = explode(':',ltrim(strip_tags($data[$x])));
											if($paddress[0]=='P/Bag')
												$paddress = $paddress[0].' '.$paddress[1];
											else
												$paddress = $paddress[1];
									}
									elseif (strpos($data[$x], 'Private Bag') !== false) {
											$paddress = ltrim(strip_tags($data[$x]));
									}
									elseif ((strpos($data[$x], 'Tel:') !== false)||(strpos($data[$x], 'Telephone:') !== false)||(strpos($data[$x], 'Phone:') !== false)) {
											$tel = explode(':',ltrim(strip_tags($data[$x])));
											if(sizeof($tel)>2){
												$telephone = str_replace(' - Fax','',$tel[1]);
												$fax = $tel[2];
											}
											else
											 $telephone = $tel[1];
									} 
									elseif (strpos($data[$x], 'Fax:') !== false||strpos($data[$x], 'Fax ') !== false) {
											$fax = explode(':',ltrim(strip_tags($data[$x])));
											$fax = $fax[1];
									}
									elseif (strpos($data[$x], 'Email:') !== false) {
											$email = explode(':',ltrim(strip_tags($data[$x])));
											$email = $email[1];
									}
									elseif (strpos($data[$x], 'Switchboard:') !== false) {
										//do nothing
									} 
									else {
										$address = ltrim(strip_tags($data[$x]));
									}
								}
							}
							//foreach($result->find('dir[class=button-wrap]') as $result2)
							{
								foreach($result->find('a[href]') as $node)
								{
									$website = str_replace('javascript:;','',ltrim(strip_tags($node->href)));
								}
							}
						}
						$data = array(
							'name'=>$name,
							'address'=>$address,
							'paddress'=>$paddress,
							'telephone'=>$telephone,
							'fax'=>$fax,
							'email'=>'',
							'url'=>$website,
							'gov_type_id'=>$gov_type_id,
							'province_id'=>$prov_id,
							'category_id'=>$category_id,
							'updated_by'=>$this->user_id
						);

						$company_id = $this->data_mining->store_company($name,$data,'zagov_entities',0,$gov_type_id);


				$html->clear(); 
				unset($html);
				flush();
				return $company_id;
		}
		
		function ajax_check_progress1(){
			$no = $this->data_mining->url_link_check('zagov_entities');
			echo $no;
		}
		
		function ajax_check_progress2(){
			$no = $this->data_mining->mined_companies_check('zagov_entities');
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
				if($this->data_mining->update($id,'zagov_entities'))
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
			$data_mining = $this->data_mining->get_data_mining($id,'zagov_entities');
			$data['mined_company'] = $data_mining[0];
			$data['contacts'] = $this->data_mining->get_contacts($id,'zagov_entities');
			
			$data['categories'] = $this->data_mining->get_categories($id,'zagov_entities');

		}
		else
		{
			$data['data_mining'] = array();
		}
		$data['province_dd_data'] = $this->common->dropdown('provinces');
        
        $this->load->view('admin/data_mining/manage_data_mining_zagov_entities',$data);
    }
    
     public function contact_delete($id,$type_id) {
        $this->db->where('id', $type_id);
		$this->db->delete('contact');
		
		redirect('admin/data_mining/data_minings_zagov_entities/manage_data_mining/'.$id, 'refresh');
    }
    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('data_mining');
		$this->db->where('data_mining_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/data_mining/data_minings_zagov_entities', 'refresh');
    }
	
}

