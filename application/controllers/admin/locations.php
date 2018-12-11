<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Locations extends CI_Controller {
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
		$this->load->model('location');
    }

    public function index() {
        $arr['page'] = 'location';
		$arr['locations'] = $this->location->get_all_locations();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/locations_list',$arr);
    }
	
	public function get_ajax_data() {
		/* Database connection start */
		$servername = "localhost";
		$username = "root";
		$password = "sqladmin";
		$dbname = "deptcapture";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
		
		/* Database connection end */
		// storing  request (ie, get/post) global array to a variable  
		$requestData= $_REQUEST;
		
		
		$columns = array( 
		// datatable column index  => database column name
		    0 => 'id',
			1 =>'name', 
			2 => 'status',
			3 => 'updated_at',
			4 => 'updated_by'
		);
		
		// getting total number records without any search
		$sql = "SELECT id,name,status,updated_at,updated_by ";
		$sql.=" FROM locations ";
		$query=mysqli_query($conn, $sql) or die("admin/locations/get_ajax_data: get locations");
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.		 
		
		$sql = "SELECT id,name,status,updated_at,updated_by ";
		$sql.=" FROM locations WHERE 1=1 ";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    
				$sql.=" OR updated_at LIKE '".$requestData['search']['value']."%' )";   
		}
		$query=mysqli_query($conn, $sql) or die("admin/locations/get_ajax_data: get locations");
		$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']." ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		$query=mysqli_query($conn, $sql) or die("admin/locations/get_ajax_data: get locations");
		
		$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = "<a href='".base_url()."admin/locations/manage_location/".$row["id"]."'>".$row["name"]."</a>";
			$nestedData[] = $row->status==1?'Enabled':'Disabled';
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


   public function manage_location($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		$data['country'] = $this->common->getcountry();
		$data['status_dd_data'] = $this->common->dropdown('status',1,0);

		if($type=="Add")
			$this->form_validation->set_rules('name', 'Name', 'required|is_unique[locations.name]');
		else
			$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('province', 'Province', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		 
		if($this->input->post('Update'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->location->update($id))
				{
					$data['message'] = "You have successfully updated the location";
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
				if($this->location->create())
				{
					$data['message'] = "You have successfully added the location";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'location';
		if($type=="Update")
		{
			$location = $this->location->get_location($id);
			$data['location'] = $location[0];			
		}
		else
		{
			$data['location'] = array();
		}
        
        $this->load->view('admin/manage_location',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('locations');
		
		redirect('admin/locations', 'refresh');
    }
	

	public function ajax_province_list($country_id,$selected='')
    {
        $data['province'] = $this->common->getprovince($country_id);
		$data['selected'] = $selected;
        $this->load->view('admin/ajax_get_province',$data);
    }
    
    public function ajax_city_list($province_id,$selected='')
    {
        $data['city'] = $this->common->getcity($province_id);
		$data['selected'] = $selected;
        $this->load->view('admin/ajax_get_city',$data); 
    }  
	
	public function ajax_lat_list($city_id)
    {
        $data['latgeo'] = $this->common->getgeo($city_id);
        $this->load->view('admin/ajax_get_lat',$data);
    } 
	
	public function ajax_lon_list($city_id)
    {
        $data['longeo'] = $this->common->getgeo($city_id);
        $this->load->view('admin/ajax_get_lon',$data);
    } 

}

