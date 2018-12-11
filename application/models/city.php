<?php
Class City extends CI_Model
{
	private $city = 'cities';

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
			'province_id'=>$this->input->post('province'),
			'lat'=>$lat,
			'lon'=>$lon
		);
		
	 	$res = $this->db->insert($this->city, $data);
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
			'province_id'=>$this->input->post('province'),
			'lat'=>$lat,
			'lon'=>$lon
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->city, $data);

		return $id;
	 }
	 
	 function getCoordinates($address){
		$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
		$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate array object from the response from the web
		return ($json['results'][0]['geometry']['city']['lat'].",".$json['results'][0]['geometry']['city']['lng']);
	}
	 
	function disable($id)
	{
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->city, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->city, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->city);
	}

	function get_city($id)
	{
		$query = $this->db->query('SELECT * FROM cities WHERE id='.$id);
        return $query->result();
	}
	
	
	function get_cities($city_id)
	{
		$query = $this->db->query('SELECT id FROM cities WHERE id='.$city_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM cities WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//cities does exist
			return false;
		}
		else
		{
			//cities doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->city);
		
		return;
	}
	
	function count_cities()
	{
		return $this->db->count_all('cities');
	}

	function get_all_cities(){
        $query = $this->db->query('SELECT * FROM cities');
        return $query->result();
    }
	
	function get_cities_name($id){
        $query = $this->db->query('SELECT name FROM cities WHERE id='.$id);
        return $query->result();
    }
	
}
