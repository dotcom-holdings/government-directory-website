<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_minings_mzgov extends CI_Controller {
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
        $arr['page'] = 'data_mining_mzgov';
		//$arr['data_minings_mzgov'] = $this->data_mining->get_all_data_minings_mzgov();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/data_mining/data_minings_list_mzgov',$arr); 
    }
	
	public function spreadsheet_view(){
		$gov_types = $this->data_mining->get_all_gov_types('mz');
			foreach($gov_types as $gov_type){
			$data['type']= 'mzgov';
			$data['title'] = 'Mozambique Government - '.$gov_type->name;
			$data['company'] = $this->data_mining->get_all_mined_companies('mzgov',0,$gov_type->id);
			$this->load->view('admin/mined_companies_spreadsheet_view',$data);
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
		$sql.=" FROM mined_companies_mzgov";
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_mzgov/get_ajax_data: get mined_companies");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		
		
		$sql = "SELECT id,name,address,telephone,email,category_id,updated_by ";
		$sql.=" FROM mined_companies_mzgov WHERE 1=1";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    
				$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";
			
				$sql.=" OR email LIKE '".$requestData['search']['value']."%' )";    
		}
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_mzgov/get_ajax_data: get mined_companies");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		$query=mysqli_query($conn, $sql) or die("admin/data_mining_mzgov/get_ajax_data: get mined_companies");
		
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
			$url = "http://www.portaldogoverno.gov.mz/por/Governo/Ministerios";
			$url = $this->data_mining->getProxyUrl($url,$proxy_url,$proxy_port,$proxy_user,$proxy_pass);
			$gov_type = 1;	
			$this->trawl_pages($category_id,$url,$gov_type);
			//provincial
			$url = "http://www.portaldogoverno.gov.mz/por/Governo/Governos-Provinciais";
			$url = $this->data_mining->getProxyUrl($url,$proxy_url,$proxy_port,$proxy_user,$proxy_pass);
			$gov_type = 2;	
			$this->trawl_pages_prov($category_id,$url,$gov_type);
			
			
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
        
		
		$this->load->view('admin/data_mining/new_data_mining_mzgov',$data);
	}
     
	function trawl_pages($category,$url,$gov_type){

				$html = new simple_html_dom();
				
				$html->load($url);
				
				foreach($html->find('div[class=attribute-long]') as $result2)
				{
					foreach($result2->find('tr[class=bglight]') as $result3)
					{
						foreach ($result3->find('h3[class=text-left]') as $node)
						{
							$name[] = ltrim(strip_tags($node->innertext));
						}
					}
					
					foreach($result2->find('tr[class=bgdark]') as $result3)
					{		
							
							foreach ($result3->find('td') as $node)
							{
								$detailstxt = $node->innertext;
								$detailstxt = str_replace('&nbsp;',' ',$detailstxt);
								$detailstxt = str_replace('<b>','',$detailstxt);
								$detailstxt = str_replace('</b>','',$detailstxt);
								$detailstxt = str_replace('"','',$detailstxt);
								$detailstxt = str_replace('</p><p>','<br>',$detailstxt);
								$detailstxt = str_replace('<p>','',$detailstxt);
								$detailstxt = str_replace('</p>','',$detailstxt);
								$details = preg_split('/<br[^>]*>/i', $detailstxt);
								
								$minister_done = 0;
								$vminister_done = 0;
								$address_done = 0;
								$paddress_done = 0;
								$telephone_done = 0;
								$fax_done = 0;
								$website_done = 0;
								$email_done = 0;
								
									for($x=0;$x<sizeof($details);$x++)
									{
										if(sizeof($details)==1){
											if ((strpos($details[$x], 'Ministro:') !== false)||(strpos($details[$x], 'Ministra:') !== false)) {
													$min = explode(':',ltrim(strip_tags($details[$x])));
													$minister[] = $min[1];
													$minister_done = 1;
											}
											$vice_minister[] = '';
										}
										elseif(sizeof($details)==2){
											if ((strpos($details[$x], 'Vice-Ministra:') !== false)||(strpos($details[$x], 'Vice-Ministro:') !== false)) {
													$v_min = explode(':',ltrim(strip_tags($details[$x])));
													$vice_minister[] = $v_min[1];
													$vminister_done = 1;
											}
											elseif ((strpos($details[$x], 'Ministro:') !== false)||(strpos($details[$x], 'Ministra:') !== false)) {
													$min = explode(':',ltrim(strip_tags($details[$x])));
													$minister[] = $min[1];
													$minister_done = 1;
											} 
											elseif ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$website_done == 1) {
												$paddress[] = '';
											}
											if ($telephone_done !== 1&&$address_done == 1&&$website_done == 1) {
												$telephone[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$website_done == 1) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$website_done == 1) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==3){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&($website_done == 1||$fax_done == 1)) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&($website_done == 1||$paddress_done == 1)) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&($website_done == 1||$fax_done == 1||$paddress_done == 1)) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==4){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Caixa postal:') !== false)) {
													$padd = explode(':',ltrim(strip_tags($details[$x])));
													$paddress[] = $padd[1];
													$paddress_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&(($fax_done == 1&&$website_done == 1)||$website_done == 1)) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&(($paddress_done == 1&&$website_done == 1)||$website_done == 1)) {
												$fax[] = '';
											}
											if (($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&((($fax_done == 1||$paddress_done == 1)&&$website_done == 1)||$website_done == 1))||($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&$fax_done == 1&&($website_done == 1||$paddress_done == 1))) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==5){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Caixa postal:') !== false)) {
													$padd = explode(':',ltrim(strip_tags($details[$x])));
													$paddress[] = $padd[1];
													$paddress_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&$fax_done == 1&&$website_done == 1) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&$paddress_done == 1&&$website_done == 1) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&($paddress_done == 1||$fax_done == 1)&&$website_done == 1) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==6){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Caixa postal:') !== false)) {
													$padd = explode(':',ltrim(strip_tags($details[$x])));
													$paddress[] = $padd[1];
													$paddress_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											elseif ((strpos($details[$x], 'Email:') !== false)||(strpos($details[$x], 'E-mail:') !== false)) {
													$mail = explode(':',ltrim(strip_tags($details[$x])));
													$email[] = $mail[1];
													$email_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&$fax_done == 1&&$website_done == 1&&$email_done == 1) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&$paddress_done == 1&&$website_done == 1&&$email_done == 1) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&($paddress_done == 1||$fax_done == 1)&&$website_done == 1&&$email_done == 1) {
												$email[] = '';
											}
											
										}
									}
											
							}
						}

						for($x=0;$x<sizeof($name);$x++)
						{
							$data = array(
								'name'=>$name[$x],
								'address'=>$address[$x],
								'paddress'=>$paddress[$x],
								'telephone'=>$telephone[$x],
								'fax'=>$fax[$x],
								'email'=>$email[$x],
								'url'=>$website[$x],
								'gov_type_id'=>$gov_type,
								'category_id'=>$category,
								'updated_by'=>$this->user_id
							);
							$company_id = $this->data_mining->store_company($name[$x],$data,'mzgov',0,$gov_type);
							
							//save contact
							if($minister){
								$data = array(
									'name'=>$minister[$x],
									'address'=>$address[$x],
									'paddress'=>$paddress[$x],
									'telephone'=>$telephone[$x],
									'fax'=>$fax[$x],
									'email'=>$email[$x],
									'position'=>'Minister',
									'company_id'=>$company_id,
									'updated_by'=>$this->user_id
								);
								$contact_id = $this->data_mining->store_contact($company_id,$data,'mzgov',$name[$x],'Minister');
							}
							if($vice_minister){
								$data = array(
									'name'=>$vice_minister[$x],
									'address'=>$address[$x],
									'paddress'=>$paddress[$x],
									'telephone'=>$telephone[$x],
									'fax'=>$fax[$x],
									'email'=>$email[$x],
									'position'=>'Vice Minister',
									'company_id'=>$company_id,
									'updated_by'=>$this->user_id
								);
								$contact_id = $this->data_mining->store_contact($company_id,$data,'mzgov',$name[$x],'Vice Minister');
							}
						}
					
				}
				
				$html->clear(); 
				unset($html);
				flush();
				return 0;
		}
	
	function trawl_pages_prov($category,$url,$gov_type){

				$html = new simple_html_dom();
				
				$html->load($url);
				
				foreach($html->find('div[class=attribute-long]') as $result2)
				{
					foreach($result2->find('tr[class=bglight]') as $result3)
					{
						foreach ($result3->find('h3[class=text-left]') as $node)
						{
							$name[] = ltrim(strip_tags($node->innertext));
						}
					}
					
					foreach($result2->find('tr[class=bgdark]') as $result3)
					{		
							
							foreach ($result3->find('td') as $node)
							{
								$detailstxt = $node->innertext;
								$detailstxt = str_replace('&nbsp;',' ',$detailstxt);
								$detailstxt = str_replace('<b>','',$detailstxt);
								$detailstxt = str_replace('</b>','',$detailstxt);
								$detailstxt = str_replace('"','',$detailstxt);
								$detailstxt = str_replace('</p><p>','<br>',$detailstxt);
								$detailstxt = str_replace('<p>','',$detailstxt);
								$detailstxt = str_replace('</p>','',$detailstxt);
								$details = preg_split('/<br[^>]*>/i', $detailstxt);
								
								$minister_done = 0;
								$vminister_done = 0;
								$address_done = 0;
								$paddress_done = 0;
								$telephone_done = 0;
								$fax_done = 0;
								$website_done = 0;
								$email_done = 0;
								
									for($x=0;$x<sizeof($details);$x++)
									{
										if(sizeof($details)==1){
											if ((strpos($details[$x], 'Ministro:') !== false)||(strpos($details[$x], 'Ministra:') !== false)) {
													$min = explode(':',ltrim(strip_tags($details[$x])));
													$minister[] = $min[1];
													$minister_done = 1;
											}
											$vice_minister[] = '';
										}
										elseif(sizeof($details)==2){
											if ((strpos($details[$x], 'Vice-Ministra:') !== false)||(strpos($details[$x], 'Vice-Ministro:') !== false)) {
													$v_min = explode(':',ltrim(strip_tags($details[$x])));
													$vice_minister[] = $v_min[1];
													$vminister_done = 1;
											}
											elseif ((strpos($details[$x], 'Ministro:') !== false)||(strpos($details[$x], 'Ministra:') !== false)) {
													$min = explode(':',ltrim(strip_tags($details[$x])));
													$minister[] = $min[1];
													$minister_done = 1;
											} 
											elseif ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$website_done == 1) {
												$paddress[] = '';
											}
											if ($telephone_done !== 1&&$address_done == 1&&$website_done == 1) {
												$telephone[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$website_done == 1) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$website_done == 1) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==3){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}

											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&($website_done == 1||$fax_done == 1)) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&($website_done == 1||$paddress_done == 1)) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&($website_done == 1||$fax_done == 1||$paddress_done == 1)) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==4){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Caixa postal:') !== false)) {
													$padd = explode(':',ltrim(strip_tags($details[$x])));
													$paddress[] = $padd[1];
													$paddress_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&(($fax_done == 1&&$website_done == 1)||$website_done == 1)) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&(($paddress_done == 1&&$website_done == 1)||$website_done == 1)) {
												$fax[] = '';
											}
											if (($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&((($fax_done == 1||$paddress_done == 1)&&$website_done == 1)||$website_done == 1))||($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&$fax_done == 1&&($website_done == 1||$paddress_done == 1))) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==5){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Caixa postal:') !== false)) {
													$padd = explode(':',ltrim(strip_tags($details[$x])));
													$paddress[] = $padd[1];
													$paddress_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&$fax_done == 1&&$website_done == 1) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&$paddress_done == 1&&$website_done == 1) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&($paddress_done == 1||$fax_done == 1)&&$website_done == 1) {
												$email[] = '';
											}
											
										}
										elseif(sizeof($details)==6){
											if ((strpos($details[$x], 'Endereço:') !== false)) {
													$add = explode(':',ltrim(strip_tags($details[$x])));
													$address[] = $add[1];
													$address_done = 1;
											}
											elseif ((strpos($details[$x], 'Caixa postal:') !== false)) {
													$padd = explode(':',ltrim(strip_tags($details[$x])));
													$paddress[] = $padd[1];
													$paddress_done = 1;
											}
											elseif ((strpos($details[$x], 'Telefone:') !== false)||(strpos($details[$x], 'Tel:') !== false)) {
													$tel = explode(':',ltrim(strip_tags($details[$x])));
													$telephone[] = $tel[1];
													$telephone_done = 1;
											}
											elseif (strpos($details[$x], 'Fax:') !== false) {
													$fx = explode(':',ltrim(strip_tags($details[$x])));
													$fax[] = $fx[1];
													$fax_done = 1;
											}
											elseif ((strpos($details[$x], 'website:') !== false)||(strpos($details[$x], 'URL:') !== false)) {
													$site = explode(':',ltrim(strip_tags($details[$x])));
													$website[] = $site[1];
													$website_done = 1;
											}
											elseif ((strpos($details[$x], 'Email:') !== false)||(strpos($details[$x], 'E-mail:') !== false)) {
													$mail = explode(':',ltrim(strip_tags($details[$x])));
													$email[] = $mail[1];
													$email_done = 1;
											}
											if ($paddress_done !== 1&&$address_done == 1&&$telephone_done == 1&&$fax_done == 1&&$website_done == 1&&$email_done == 1) {
												$paddress[] = '';
											}
											if ($fax_done !== 1&&$address_done == 1&&$telephone_done == 1&&$paddress_done == 1&&$website_done == 1&&$email_done == 1) {
												$fax[] = '';
											}
											if ($email_done !== 1&&$address_done == 1&&$telephone_done == 1&&($paddress_done == 1||$fax_done == 1)&&$website_done == 1&&$email_done == 1) {
												$email[] = '';
											}
											
										}
									}
											
							}
						}

						for($x=0;$x<sizeof($name);$x++)
						{
							$data = array(
								'name'=>$name[$x],
								'address'=>$address[$x],
								'paddress'=>$paddress[$x],
								'telephone'=>$telephone[$x],
								'fax'=>$fax[$x],
								'email'=>$email[$x],
								'url'=>$website[$x],
								'gov_type_id'=>$gov_type,
								'category_id'=>$category,
								'updated_by'=>$this->user_id
							);
							$company_id = $this->data_mining->store_company($name[$x],$data,'mzgov',0,$gov_type);
							
							//save contact
							if($minister){
								$data = array(
									'name'=>$minister[$x],
									'address'=>$address[$x],
									'paddress'=>$paddress[$x],
									'telephone'=>$telephone[$x],
									'fax'=>$fax[$x],
									'email'=>$email[$x],
									'position'=>'Minister',
									'company_id'=>$company_id,
									'updated_by'=>$this->user_id
								);
								$contact_id = $this->data_mining->store_contact($company_id,$data,'mzgov',$name[$x],'Minister');
							}
							if($vice_minister){
								$data = array(
									'name'=>$vice_minister[$x],
									'address'=>$address[$x],
									'paddress'=>$paddress[$x],
									'telephone'=>$telephone[$x],
									'fax'=>$fax[$x],
									'email'=>$email[$x],
									'position'=>'Vice Minister',
									'company_id'=>$company_id,
									'updated_by'=>$this->user_id
								);
								$contact_id = $this->data_mining->store_contact($company_id,$data,'mzgov',$name[$x],'Vice Minister');
							}
						}
					
				}
				
				$html->clear(); 
				unset($html);
				flush();
				return 0;
		}
	


		
		function ajax_check_progress1(){
			$no = $this->data_mining->url_link_check('mzgov');
			echo $no;
		}
		
		function ajax_check_progress2(){
			$no = $this->data_mining->mined_companies_check('mzgov');
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
				if($this->data_mining->update($id,'mzgov'))
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
			$data_mining = $this->data_mining->get_data_mining($id,'mzgov');
			$data['mined_company'] = $data_mining[0];
			$data['contacts'] = $this->data_mining->get_contacts($id,'mzgov');
			
			$data['categories'] = $this->data_mining->get_categories($id,'mzgov');

		}
		else
		{
			$data['data_mining'] = array();
		}
		$data['province_dd_data'] = $this->common->dropdown('provinces');
        
        $this->load->view('admin/data_mining/manage_data_mining_mzgov',$data);
    }
    
     public function contact_delete($id,$type_id) {
        $this->db->where('id', $type_id);
		$this->db->delete('contact');
		
		redirect('admin/data_mining/data_minings_mzgov/manage_data_mining/'.$id, 'refresh');
    }
    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('data_mining');
		$this->db->where('data_mining_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/data_mining/data_minings_mzgov', 'refresh');
    }
	
}

