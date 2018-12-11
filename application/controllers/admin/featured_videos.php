<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Featured_videos extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->model('featured_video');
    }

    public function index() {
        $arr['page'] = 'featured_video';
		$arr['featured_videos'] = $this->featured_video->get_all_featured_videos();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/featured_videos_list',$arr);
    }
	
	public function getCompany()
    {
		if ( !isset($_GET['term']) )
			exit;
			$term = $_REQUEST['term'];
				$data = array();
				$rows = $this->featured_video->getCompany($term);
					foreach( $rows as $row )
					{
						$data[] = array(
							'label' => $row->name.' '.$row->address,
							'value' => $row->id);   
					}
				echo json_encode($data);
				flush();
	}
	
	public function getCompanyName($id)
    {
				$name = $this->featured_video->get_company_name($id);
				echo $name;
	}

   public function manage_featured_video($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		
		$data['website_dd_data'] = $this->common->dropdown('websites',0,1);
		//$data['company_dd_data'] = $this->common->dropdown('companies',0,1);
		$data['rank_dd_data'] = $this->common->dropdown('rank',0,1,0);
		$data['status_dd_data'] = $this->common->dropdown('status',0,0);

		if($type=="Add")
			$this->form_validation->set_rules('company_id', 'Company', 'required|is_unique[featured_videos.company_id]');
		$this->form_validation->set_rules('rank_id', 'Rank', 'required');
		 
		if($this->input->post('Update'))
		{

			if ($this->form_validation->run() == TRUE)
			{
				if($this->featured_video->update($id))
				{
					$data['message'] = "You have successfully updated the featured_video";
					$data['success'] = "yes";
				}				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		else
		if($this->input->post('Add'))
		{
			//print_r($_POST);exit;
			if ($this->form_validation->run() == TRUE)
			{
				if($this->featured_video->create())
				{
					$data['message'] = "You have successfully added the featured_video";
					$data['success'] = "yes";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'featured_video';
		if($type=="Update")
		{
			$featured_video = $this->featured_video->get_featured_video($id);
			$data['featured_video'] = $featured_video[0];			
		}
		else
		{
			$data['featured_video'] = array();
		}
        
        $this->load->view('admin/manage_featured_video',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('featured_video');
		$this->db->where('featured_video_id', $id);
		$this->db->delete('contact');
		
		redirect('admin/featured_videos', 'refresh');
    } 
	
	public function ajax_check_rankings($website_id,$selected='')
    {
        $data['rankings'] = $this->featured_video->get_available_rankings($website_id);
		$data['selected'] = $selected;
        $this->load->view('admin/ajax_get_rankings',$data);
    }  

}

