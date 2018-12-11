<?php
Class Classified_ad extends CI_Model
{
	private $classified_ad = 'classified_ads';

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
			'position_id'=>$this->input->post('position_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db->insert($this->classified_ad, $data);
		$id = $this->db->insert_id();

		return $id;
	 }

	 function update($id) {
	 	$data = array(
			'website_id'=>$this->input->post('website_id'),
			'company_id'=>$this->input->post('company_id'),
			'status_id'=>$this->input->post('status_id'),
			'rank_id'=>$this->input->post('rank_id'),
			'position_id'=>$this->input->post('position_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->classified_ad, $data);

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
		$this->db->update($this->classified_ad, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->classified_ad, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->classified_ad);
	}

	function get_classified_ad($id)
	{
		$query = $this->db->query('SELECT * FROM classified_ads WHERE id='.$id);
        return $query->result();
	}
	
	function get_classified_ads($classified_ad_id)
	{
		$query = $this->db->query('SELECT classified_ad_id FROM classified_ad_classified_ad WHERE classified_ad_id='.$classified_ad_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM classified_ads WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//classified_ads does exist
			return false;
		}
		else
		{
			//classified_ads doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->classified_ad);
		
		return;
	}
	
	function count_classified_ads()
	{
		return $this->db->count_all('classified_ads');
	}

	function get_all_classified_ads(){
        $query = $this->db->query('SELECT * FROM classified_ads');
        return $query->result();
    }
	
	function get_classified_ads_name($id){
        $query = $this->db->query('SELECT complex FROM classified_ads WHERE id='.$id);
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
	
	function get_position_name($id) {
			$res = $this->db->select('name')->where('id', $id)->get('position')->result_array();
			return $res[0]['name'];
	}
	
	function get_rank_name($id) {
			$res = $this->db->select('name')->where('id', $id)->get('rank')->result_array();
			return $res[0]['name'];
	}
	
	function get_available_rankings($id,$position) {
		$sql = 'SELECT rank_id FROM classified_ads WHERE website_id='.$id;
		if($position!=0){
			$sql .= ' AND position_id='.$position;
		}
		$query = $this->db->query($sql);
        $result = $query->result();
		if($result){
			foreach($result as $rnk){
				$rnkArr[] = $rnk->rank_id;
			}
			$rnkA = join(",", $rnkArr);
			$query = $this->db->query('SELECT id,name FROM rank WHERE id NOT IN('.$rnkA.')');
        	return $query->result();
		}
		else {
			$query = $this->db->query('SELECT id,name FROM rank');
        	return $query->result();
		}
	}
}
