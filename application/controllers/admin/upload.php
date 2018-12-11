<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
 
	public function __construct()
	{
	   parent::__construct();
	   $this->load->helper(array('url', 'form'));
	   $this->load->model('common');
	}

	public function index()
	{
		$this->load->view('upload_form');
	}

	public function uploadify($role,$id=0)
	{
		$up_path = substr(BASEPATH,0,-7);
		$up_role = $role;
		$config['upload_path'] = $up_path.'uploads/'.$up_role.'/';
				
				if (!is_dir($up_path.'uploads/'.$role.'/'))
					mkdir($up_path.'uploads/'.$role.'/', 0755);
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['overwrite']	= TRUE;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("userfile"))
		{
			$response = $this->upload->display_errors();
		}
		else
		{
			$response = $this->upload->data();
			$data = array('upload_data' => $this->upload->data());
			$filename = 'uploads/'.$role.'/'.$data['upload_data']['file_name'];			
			$this->common->write_image_to_file($filename,$role,$id);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function delete_image($id,$role,$filename="")
	{
			//$id = $this->input->post('id');
			//$role = $this->input->post('role');
		 	$this->common->delete_image($id,$role,$filename);
	}
}

/* End of file uploadify.php */
/* Location: ./application/controllers/uploadify.php */