<?php
Class Website extends CI_Model
{
	private $website = 'websites';

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}
	 
	 function create() {
	 	$data = array(
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'status_id'=>$this->input->post('status_id'),
			'design_id'=>$this->input->post('design_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db->insert($this->website, $data);
		$id = $this->db->insert_id();

		return $id;
	 }

	 function update($id) {
	 	$data = array(
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'status_id'=>$this->input->post('status_id'),
			'design_id'=>$this->input->post('design_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->website, $data);

		return $id;
	 }
	 
	 
	function disable($id)
	{
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->website, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->website, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->website);
	}

	function get_website($id)
	{
		$query = $this->db->query('SELECT * FROM websites WHERE id='.$id);
        return $query->result();
	}
	
	function get_websites($website_id)
	{
		$query = $this->db->query('SELECT website_id FROM website_website WHERE website_id='.$website_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM websites WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//websites does exist
			return false;
		}
		else
		{
			//websites doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->website);
		
		return;
	}
	
	function count_websites()
	{
		return $this->db->count_all('websites');
	}

	function get_all_websites(){
        $query = $this->db->query('SELECT * FROM websites');
        return $query->result();
    }
	
	function get_websites_name($id){
        $query = $this->db->query('SELECT complex FROM websites WHERE id='.$id);
        return $query->result();
    }
}
