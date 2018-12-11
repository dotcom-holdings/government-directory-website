<?php
Class Featured_listing extends CI_Model
{
	private $featured_listing = 'featured_listings';

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}
	 
	 function create() {
	 	$data = array(
			'website_id'=>$this->input->post('website_id'),
			'company_id'=>$this->input->post('company_id'),
			'status_id'=>$this->input->post('status_id'),
			'rank_id'=>$this->input->post('rank_id'),
			'type_id'=>$this->input->post('type_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db->insert($this->featured_listing, $data);
		$id = $this->db->insert_id();

		return $id;
	 }

	 function update($id) {
	 	$data = array(
			'website_id'=>$this->input->post('website_id'),
			'company_id'=>$this->input->post('company_id'),
			'status_id'=>$this->input->post('status_id'),
			'rank_id'=>$this->input->post('rank_id'),
			'type_id'=>$this->input->post('type_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->featured_listing, $data);

		return $id;
	 }
	 
	function getCompany($term)
	{ 
		$sql = $this->db->query('select id,name,address from companies where name like "'. $this->db->escape_str($term) .'%" order by name asc limit 0,250');
	
		return $sql ->result();
	}	 
	 
	function disable($id)
	{
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->featured_listing, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->featured_listing, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->featured_listing);
	}

	function get_featured_listing($id)
	{
		$query = $this->db->query('SELECT * FROM featured_listings WHERE id='.$id);
        return $query->result();
	}
	
	function get_featured_listings($featured_listing_id)
	{
		$query = $this->db->query('SELECT featured_listing_id FROM featured_listing_featured_listing WHERE featured_listing_id='.$featured_listing_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM featured_listings WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//featured_listings does exist
			return false;
		}
		else
		{
			//featured_listings doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->featured_listing);
		
		return;
	}
	
	function count_featured_listings()
	{
		return $this->db->count_all('featured_listings');
	}

	function get_all_featured_listings(){
        $query = $this->db->query('SELECT * FROM featured_listings');
        return $query->result();
    }
	
	function get_featured_listings_name($id){
        $query = $this->db->query('SELECT complex FROM featured_listings WHERE id='.$id);
        return $query->result();
    }
	
	function get_website_name($id) {
			$res = $this->db->select('name')->where('id', $id)->get('websites')->result_array();
			return $res[0]['name'];
	}
	
	function get_company_name($id) {
			$res = $this->db->select('name')->where('id', $id)->get('companies')->result_array();
			return $res[0]['name'];
	}
	
	function get_rank_name($id) {
			$res = $this->db->select('name')->where('id', $id)->get('rank')->result_array();
			return $res[0]['name'];
	}
	
	function get_available_rankings($id) {
		$query = $this->db->query('SELECT rank_id FROM featured_listings WHERE website_id='.$id);
        $result = $query->result();
		foreach($result as $rnk){
			$rnkArr[] = $rnk->rank_id;
		}
		$rnkA = join(",", $rnkArr);
		$query = $this->db->query('SELECT id,name FROM rank WHERE id NOT IN('.$rnkA.')');
        return $query->result();
	}
}
