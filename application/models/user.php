<?php
Class User extends CI_Model {
	private $users = 'users';
	
	public function __construct() {
		$this->load->database();
		$this->load->helper('url');
	}
	 
	function create() {
		$data = array(
			'username'=>$this->input->post('username'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'cell'=>$this->input->post('cell'),
			'level'=>'U',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'signup_date'=>date('Y-m-d H:i:s')
		);
		if($this->input->post('password')) {
			$data['password'] = MD5($this->input->post('password'));
		}
		//print_r($data);exit;
		$this->db->insert('users', $data);
		$res = $this->db->insert_id();

	 	return $res;
	}

	#apin functions start
	//a json object will passed into this method
	function api_create_user(array $user_data){
		
		//encrypt user  password here
		$data = array(
			'username' => $user_data['username'],
			'name' => $user_data['name'],
			'email' => $user_data['email'],
			'cell' => $user_data['phonenumber'],
			'level' => 'U',
			'status' => 1,
			'password' => md5($user_data['password']),
			'created_at'=>date('Y-m-d H:i:s'),
			'signup_date'=>date('Y-m-d H:i:s')
		);

		$this->db->insert('users', $data);
		$result = $this->db->insert_id();

		return $result;
	}

	function api_log_in(array $user_data){
		$this -> db -> select('id, name, username, level, status', 'email', 'cell');
		//$this -> db -> select('id, firstname, surname, username, password, userlevel, status');
		$this -> db -> from('users');
		$this -> db -> where('username',$user_data['username']);
		$this -> db -> where('password', md5($user_data['password']));
		//$this -> db -> where('(username="'.$username.'" OR email="'.$username.'") AND password="'.MD5($password).'"');
		$this -> db -> where('status', 1);
		$this -> db -> limit(1);
	  
		$query = $this -> db -> get();
	  
		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}

	function field_exists($field_name, $field_value){
		$query = $this->db->get_where('users', array($field_name => $field_value));
		if(empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}

	#api functions end

	function update($id) {
		$data = array(
			'username'=>$this->input->post('username'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'cell'=>$this->input->post('cell'),
			'level'=>$this->input->post('level'),
			'status'=>$this->input->post('status'),
		);
		if($this->input->post('password')) {
			$data['password'] = MD5($this->input->post('password'));
		}
		
		$this->db->where('id', $id);
		$res = $this->db->update($this->users, $data);

	 	return $res;
	}



	 
	function disable($id)
	{
		$data = array(
				'block'=>'1'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->users, $data);
		
		return;
	}
	
	function enable($id)
	{
		$data = array(
				'block'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->users, $data);
		
		return;
	}
	
	function set_logged_in($id,$type)
	{
		$data = array(
				'logged_in'=>$type
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->users, $data);
		
		return;
	}

	function login($username, $password='')
	{
		$this -> db -> select('id, firstname, surname, username, userlevel, status');
		//$this -> db -> select('id, firstname, surname, username, password, userlevel, status');
		$this -> db -> from('users');
		$this -> db -> where('username',$username);
		//$this -> db -> where('(username="'.$username.'" OR email="'.$username.'") AND password="'.MD5($password).'"');
		$this -> db -> where('status', 1);
		$this -> db -> limit(1);
	  
		$query = $this -> db -> get();
	  
		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}

	function change_password($id)
	{
		$data = array(
	 			'password'=>MD5($this->input->post('password')),
	 		);

	 	$this->db->where('id', $id);
	 	$this->db->update($this->users, $data);

	 	return;
	}

	function get_paged_list()
	{
		$this->db->order_by('userlevel','ASC');
		return $this->db->get($this->users);
	}

	function get_user($id)
	{
		$query = $this->db->query('SELECT * from users WHERE id='.$id);
        return $query->result();
	}
	
	function get_user_level($id) {
			$res = $this->db->select('name')->where('id', $id)->get('user_levels')->result_array();
			return $res[0]['name'];
	}
	
	function get_user_name($id) {
			$res = $this->db->select('name')->where('id', $id)->get('users')->result_array();
			if(!empty($res))
				return $res[0]['name'];
			else
				return;
	}

	function check_record_exists($username)
	{
		$query_str = "SELECT * FROM users WHERE username = ?";

		$result = $this->db->query($query_str, $username);

		if($result->num_rows() > 0)
		{
			//username does exists
			return false;
		}
		else
		{
			//username doesn't exists
			return true;
		}
	}

	function correct_password()
	{
		$this -> db -> select('id, username, password');
		$this -> db -> from('users');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1);
	 
		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $true;
		}
		else
		{
			return false;
		}
	}

	function delete($id)
	{
		//$this->db->where('id', $id);
		//$this->db->delete($this->users);
		$data = array(
				'status'=>'0'
			);
		
		$this->db->where('id', $id);
		$this->db->update($this->users, $data);
		
		return;
	}
	
	function get_all_users(){
        $query = $this->db->query('SELECT * from users');
        return $query->result();
    }
	
	function get_admin_users(){
        $query = $this->db->query('SELECT * from users where user_type="SA" or user_type="A"');
        return $query->result();
    }
	
	function get_escalation_managers(){
        $query = $this->db->query('SELECT * from escalations');
        return $query->result();
    }
	
	function get_developer()
	{
		$this->db->where('title_id','1');
		return $this->db->get($this->users)->result();
	}
	
	function count_users()
	{
		return $this->db->count_all('users');
	}
}
