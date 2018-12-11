<?php
Class Category extends CI_Model
{
	private $category = 'categories';

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}
	 
	 function create() {
	 	$data = array(
			'name'=>$this->input->post('name'),
			'status_id'=>$this->input->post('status_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
	 	$res = $this->db->insert($this->category, $data);
		$id = $this->db->insert_id();

		return $id;
	 }

	 function update($id) {
	 	$data = array(
			'name'=>$this->input->post('name'),
			'status_id'=>$this->input->post('status_id'),
			'created_at'=>date('Y-m-d H:i:s'),
			'created_by'=>$this->input->post('user_id'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>$this->input->post('user_id')
		);
		
		$this->db->where('id', $id);
	 	$res = $this->db->update($this->category, $data);

		return $id;
	 }
	 
	 
	function disable($id)
	{
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->category, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'status'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->category, $data);
		
		return;
	}

	function get_paged_list() {
		return $this->db->get($this->category);
	}

	function get_category($id)
	{
		$query = $this->db->query('SELECT * FROM categories WHERE id='.$id);
        return $query->result();
	}
	
	function get_categories($category_id)
	{
		$query = $this->db->query('SELECT category_id FROM category_category WHERE category_id='.$category_id);
        return $query->result();
	}

	function check_record_exists($name)
	{
		$query_str = "SELECT * FROM categories WHERE name = ?";

		$result = $this->db->query($query_str, $name);

		if($result->num_rows() > 0)
		{
			//categories does exist
			return false;
		}
		else
		{
			//categories doesn't exist
			return true;
		}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->category);
		
		return;
	}
	
	function count_categories()
	{
		return $this->db->count_all('categories');
	}

	function get_all_categories(){
        $query = $this->db->query('SELECT * FROM categories');
        return $query->result();
    }
	
}
