<?php
Class alert extends CI_Model
{
	private $alert = 'alerts';

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}
	 
	 function create($values) {
	 	$data = array(
			'user_id'=>$values['user_id'],
			'message'=>$values['message'],
			'datetime'=>$values['datetime']
		);
		
	 	$res = $this->db->insert($this->alert, $data);

		return $res;
	 }


	 function read($id) {
	 	$data = array(
			'mread'=>1
		);
		
	 	$this->db->where('id', $id);
	 	$this->db->update($this->alert, $data);

	 	return;
	 }


	function get_alert($id)
	{
		$query = $this->db->query('SELECT * FROM alerts WHERE id='.$id);
        return $query->result();
	}


	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->alert);
		
		return;
	}
	
	function count_alerts($id)
	{
		$this->db->like('user_id', $id);
		$this->db->from('alerts');
		$this->db->where('mread',0);
		return $this->db->count_all_results();
	}

	function get_all_alerts($id){
        $query = $this->db->query('SELECT * FROM alerts WHERE user_id='.$id);
        return $query->result();
    }
	
	function get_all_new_alerts($id){
        $query = $this->db->query("SELECT * FROM alerts WHERE user_id='".$id."' AND mread='0'");
        return $query->result();
    }

}
