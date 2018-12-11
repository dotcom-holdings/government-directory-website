<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companies extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com 
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->model('company');
		// to read all the data to the old/new cdn databases //
		//****************************************************//
		$CI = &get_instance();
		$this->db2 = $CI->load->database('new', TRUE);//cdn
		$this->db3 = $CI->load->database('old', TRUE);//old
		//****************************************************//
    }

    public function index() {
        $arr['page'] = 'company';
		//$arr['companies'] = $this->company->get_all_companies();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/companies_list',$arr);
    }
	
	public function fix_all_duplicates($db,$type) {
		$this->company->fix_all_duplicates($db,$type);
		echo "Done!";
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
			5 => 'updated_at',
			6 => 'updated_by'
		);
		
		// getting total number records without any search
		$sql = "SELECT id,name,address,telephone,email,updated_at,updated_by ";
		$sql.=" FROM companies";
		$query=mysqli_query($conn, $sql) or die("admin/company/get_ajax_data: get companies");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		
		
		$sql = "SELECT id,name,address,telephone,email,updated_at,updated_by ";
		$sql.=" FROM companies WHERE 1=1";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    
				$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";
				$sql.=" OR updated_at LIKE '".$requestData['search']['value']."%' )";   
		}
		$query=mysqli_query($conn, $sql) or die("admin/company/get_ajax_data: get companies");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		$query=mysqli_query($conn, $sql) or die("admin/company/get_ajax_data: get companies");
		
		$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = "<a href='".base_url()."admin/companies/manage_company/".$row["id"]."'>".$row["name"]."</a>";
			$nestedData[] = $row["address"];
			$nestedData[] = $row["telephone"];
			$nestedData[] = $row["email"];
			$nestedData[] = $row["updated_at"];
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

   public function manage_company($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		$data['website_dd_data'] = $this->common->dropdown('websites',0,0,1);
		$data['category_dd_data'] = $this->common->dropdown('categories',0,1,1);
		$data['medical_category_dd_data'] = $this->common->dropdown('categories_medical',0,1,1);
		$data['government_category_dd_data'] = $this->common->dropdown('categories_government',0,1,1);
		$data['locations_dd_data'] = $this->common->dropdown('locations',0,1,1);
		$data['status_dd_data'] = $this->common->dropdown('status',0,0,0);
		$data['search_rank_dd_data'] = $this->common->dropdown('search_rank',0,0,0,1); 
		if($type=="Add")
			$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_filter|is_unique[companies.name]');
		$this->form_validation->set_rules('address', 'Address', 'required|trim|xss_filter');
		$this->form_validation->set_rules('paddress', 'Postal Address', 'trim|xss_filter');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|xss_filter');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|xss_filter');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|xss_filter');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_filter');
		$this->form_validation->set_rules('website', 'Company Website', 'trim|xss_filter');
		$this->form_validation->set_rules('facebook', 'Facebook Address', 'trim|xss_filter');
		$this->form_validation->set_rules('twitter', 'Twitter Address', 'trim|xss_filter');
		$this->form_validation->set_rules('youtube', 'Youtube Address', 'trim|xss_filter');
		$this->form_validation->set_rules('about', 'About Us', 'trim|xss_filter');
		$this->form_validation->set_rules('hours', 'Hours', 'trim|xss_filter');
		$this->form_validation->set_rules('website_id[]', 'Directory Website', 'required|trim|xss_filter');
		$this->form_validation->set_rules('category_id', 'Category', 'required|trim|xss_filter');
		$this->form_validation->set_rules('tags', 'Tags', 'trim|xss_filter');
		$this->form_validation->set_rules('status', 'Status', 'trim|xss_filter');
		$this->form_validation->set_rules('search_rank_id', 'Search Ranking', 'trim|xss_filter');
		$this->form_validation->set_rules('gov_bus', 'Government Department', 'trim|xss_filter');
		$this->form_validation->set_rules('logo[]', 'Logo', 'trim|xss_filter');
		$this->form_validation->set_rules('viewpage_banner[]', 'Viewpage Banner', 'trim|xss_filter');
		$this->form_validation->set_rules('classified_banner[]', 'Classified Banner', 'trim|xss_filter');
		$this->form_validation->set_rules('advert[]', 'Advert', 'trim|xss_filter');
		$this->form_validation->set_rules('large_advert[]', 'Advert', 'trim|xss_filter');
		$this->form_validation->set_rules('profile[]', 'Profile', 'trim|xss_filter');
		$this->form_validation->set_rules('video[]', 'Video', 'trim|xss_filter');
		$this->form_validation->set_rules('promotion[]', 'Promotons', 'trim|xss_filter');
		$this->form_validation->set_rules('gallery[]', 'Gallery', 'trim|xss_filter');
		 
		if($this->input->post('Update'))
		{

			if ($this->form_validation->run() == TRUE)
			{
				if($this->company->update($id))
				{
					$data['message'] = "You have successfully updated the company";
					$data['success'] = "yes";
				}				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		else
		if($this->input->post('Add'))
		{
			//print_r($_POST);exit;
			if ($this->form_validation->run() == TRUE)
			{
				if($this->company->create())
				{
					$data['message'] = "You have successfully added the company";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'company';
		if($type=="Update")
		{
			$company = $this->company->get_company($id);
			$data['company'] = $company[0];
			
			$websites = $this->company->get_websites($id);
			for($x=0;$x<sizeof($websites);$x++)
			{
				$websitesArr[] = $websites[$x]->website_id;
			}
			$data['websites'] = $websitesArr;
			
			$data['categories'] = $this->company->get_categories($id);
			$data['medical_categories'] = $this->company->get_medical_categories($id); 
			$data['government_categories'] = $this->company->get_government_categories($id); 
			
			$tags = $this->company->get_tags($data['categories'][0]->category_id,$id);
			for($x=0;$x<sizeof($tags);$x++)
			{
				$tagsArr[] = $tags[$x]->name;
			}
			$data['tags'] = $tagsArr[0];
			
			
			if($company[0]->gov_bus==1){
				$contacts = $this->company->get_contacts($id);
				$data['contacts'] = $contacts;
			}
			
			$data['logos'] = $this->common->get_logos($id);
			$data['viewpage_banners'] = $this->common->get_viewpage_banners($id);
			$data['classified_banners'] = $this->common->get_classified_banners($id);
			$data['adverts'] = $this->common->get_company_adverts($id);
			$data['adverts_large'] = $this->common->get_adverts($id,'large');
			$data['adverts_thin'] = $this->common->get_adverts($id,'thin');
			$data['adverts_wide'] = $this->common->get_adverts($id,'wide'); 
			$data['profiles'] = $this->common->get_profiles($id);
			$data['videos'] = $this->common->get_videos($id);
			$data['promotions'] = $this->common->get_promotions($id);
			$data['galleries'] = $this->common->get_gallery($id);
		}
		else
		{
			$data['company'] = array();
		}
		$data['province_dd_data'] = $this->common->dropdown('provinces');
        
        $this->load->view('admin/manage_company',$data);
    }
    
     public function contact_delete($id,$type_id) {
        $this->db->where('id', $type_id);
		$this->db->delete('contact');
		
		redirect('admin/companies/manage_company/'.$id, 'refresh');
    }
    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('companies');
		$this->db->where('company_id', $id);
		$this->db->delete('contacts');
		$old_idArr = $this->common->get_id_relations_to_old($id);
		$cdn_id = $old_idArr[0]->cdn_id;
		$old_id = $old_idArr[0]->old_id;
		$this->db2->where('id', $cdn_id);
		$this->db2->delete('companies');
		$this->db3->where('id', $old_id);
		$this->db3->delete('entries');
		
		redirect('admin/companies', 'refresh');
    }   

}

