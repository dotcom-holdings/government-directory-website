<?php
Class location extends CI_Model
{
	private $location = 'locations';

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}
	 
	 function create() {
		 if(!$this->input->post('lat')||$this->input->post('lat')==''||$this->input->post('lon')==''){
		 	$co_ords = $this->getCoordinates($this->input->post('city').' '.$this->input->post('province').' '.$this->input->post('country'));
			$co_ords = explode(",",$co_ords);
			$lat = $co_ords[0];
			$lon = $co_ords[1];
		 }
		 else
		 {
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon'); 
		 }
		 
	 	$data = array(
			'name'=>$this->input->post('name'),
			'suburb'=>$this->input->post('suburb'),
			'city'=>$this->input->post('city'),
			'province'=>$this->input->post('province'),
			'country'=>$this->input->post('country'),
			'lat'=>$lat,
			'lon'=>$lon,
			'status'=>$this->input->post('status'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db->insert($this->location, $data);
		$id = $this->db->insert_id();

		return $id;
	 }

	 function update($id) {
	 	if(!$this->input->post('lat')||$this->input->post('lat')==''||$this->input->post('lon')==''){
		 	$co_ords = $this->getCoordinates($this->input->post('city').' '.$this->input->post('province').' '.$this->input->post('country'));
			$co_ords = explode(",",$co_ords);
			$lat = $co_ords[0];
			$lon = $co_ords[1];
		 }
		 else
		 {
			$lat = $this->input->post('lat');
			$lon = $this->input->post('lon'); 
		 }
		 
	 	$data = array(
			'name'=>$this->input->post('name'),
			'suburb'=>$this->input->post('suburb'),
			'city'=>$this->input->post('city'),
			'province'=>$this->input->post('province'),
			'country'=>$this->input->post('country'),
			'lat'=>$lat,
			'lon'=>$lon,
			'status'=>$this->input->post('status'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->location, $data);

		return $id;
	 }
	 
	 function getCoordinates($address){
		$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
		$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate array object from the response from the web
		return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
	}
	 
	function disable($id)
	{
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->location, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->location, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->location);
	}

	function get_location($id)
	{
		$query = $this->db->query('SELECT * FROM locations WHERE id='.$id);
        return $query->result();
	}
	
	
	function get_locations($location_id)
	{
		$query = $this->db->query('SELECT location_id FROM location_location WHERE location_id='.$location_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM locations WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//locations does exist
			return false;
		}
		else
		{
			//locations doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->location);
		
		return;
	}
	
	function count_locations()
	{
		return $this->db->count_all('locations');
	}

	function get_all_locations(){
        $query = $this->db->query('SELECT * FROM locations');
        return $query->result();
    }
	
	function get_locations_name($id){
        $query = $this->db->query('SELECT name FROM locations WHERE id='.$id);
        return $query->result();
    }
	
}
