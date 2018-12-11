<?php
Class Featured_video extends CI_Model
{
	private $featured_video = 'featured_videos';

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
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db->insert($this->featured_video, $data);
		$id = $this->db->insert_id();

		return $id;
	 }

	 function update($id) {
	 	$data = array(
			'website_id'=>$this->input->post('website_id'),
			'company_id'=>$this->input->post('company_id'),
			'status_id'=>$this->input->post('status_id'),
			'rank_id'=>$this->input->post('rank_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->featured_video, $data);

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
		$this->db->update($this->featured_video, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->featured_video, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->featured_video);
	}

	function get_featured_video($id)
	{
		$query = $this->db->query('SELECT * FROM featured_videos WHERE id='.$id);
        return $query->result();
	}
	
	function get_featured_videos($featured_video_id)
	{
		$query = $this->db->query('SELECT featured_video_id FROM featured_video_featured_video WHERE featured_video_id='.$featured_video_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM featured_videos WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//featured_videos does exist
			return false;
		}
		else
		{
			//featured_videos doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->featured_video);
		
		return;
	}
	
	function count_featured_videos()
	{
		return $this->db->count_all('featured_videos');
	}

	function get_all_featured_videos(){
        $query = $this->db->query('SELECT * FROM featured_videos');
        return $query->result();
    }
	
	function get_featured_videos_name($id){
        $query = $this->db->query('SELECT complex FROM featured_videos WHERE id='.$id);
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
		$query = $this->db->query('SELECT rank_id FROM featured_videos WHERE website_id='.$id);
        $result = $query->result();
		foreach($result as $rnk){
			$rnkArr[] = $rnk->rank_id;
		}
		$rnkA = join(",", $rnkArr);
		$query = $this->db->query('SELECT id,name FROM rank WHERE id NOT IN('.$rnkA.')');
        return $query->result();
	}
}
